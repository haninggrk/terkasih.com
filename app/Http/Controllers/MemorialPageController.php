<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRsvpRequest;
use App\Http\Requests\StoreSupportContributionRequest;
use App\Http\Requests\StoreTributeRequest;
use App\Models\MemorialPage;
use App\Models\Rsvp;
use App\Models\SupportContribution;
use App\Models\Tribute;
use App\Support\ImageCompressor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MemorialPageController extends Controller
{
    public function show(string $slug): View
    {
        $memorialPage = MemorialPage::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $tributes = Tribute::query()
            ->whereBelongsTo($memorialPage)
            ->where('is_hidden', false)
            ->orderByDesc('is_highlighted')
            ->orderBy('sort_order')
            ->latest()
            ->paginate(50, ['*'], 'tributes_page')
            ->fragment('memories');

        $rsvps = Rsvp::query()
            ->whereBelongsTo($memorialPage)
            ->latest()
            ->limit(8)
            ->get();

        $viewMap = [
            'dini-carolina' => 'memorial.dini-carolina',
        ];

        $view = $viewMap[$slug] ?? 'memorial.show';

        return view($view, [
            'memorialPage' => $memorialPage,
            'tributes' => $tributes,
            'rsvps' => $rsvps,
        ]);
    }

    public function showSupport(string $slug): View
    {
        $memorialPage = MemorialPage::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $supportContributions = SupportContribution::query()
            ->whereBelongsTo($memorialPage)
            ->latest()
            ->paginate(8, ['*'], 'supports_page')
            ->fragment('support-list');

        $supportViewMap = [
            'dini-carolina' => 'memorial.dini-carolina-support',
        ];
        $supportView = $supportViewMap[$slug] ?? 'memorial.support';

        return view($supportView, [
            'memorialPage' => $memorialPage,
            'supportContributions' => $supportContributions,
        ]);
    }

    public function storeTribute(
        StoreTributeRequest $request,
        ImageCompressor $imageCompressor,
        string $slug
    ): RedirectResponse {
        $memorialPage = MemorialPage::query()->where('slug', $slug)->firstOrFail();
        $payload = $request->validated();

        $relations = $payload['relations'];
        if (in_array('Lainnya', $relations) && ! empty($payload['relation_other'])) {
            $custom = trim($payload['relation_other']);
            $relations = array_map(fn ($r) => $r === 'Lainnya' ? $custom : $r, $relations);
        }

        $photos = [];
        foreach ($request->file('photos', []) as $photo) {
            $photos[] = $imageCompressor->compressAndStore($photo, 'memorial/tributes');
        }

        Tribute::query()->create([
            'memorial_page_id' => $memorialPage->id,
            'name' => $payload['name'],
            'phone' => $payload['phone'] ?? null,
            'relations' => $relations,
            'message' => $payload['message'],
            'photos' => $photos,
            'is_highlighted' => false,
            'sort_order' => 9999,
        ]);

        return redirect()
            ->route('memorial.show', ['slug' => $slug])
            ->withFragment('memories')
            ->with('status', 'Kenangan Anda sudah kami simpan. Terima kasih.');
    }

    public function storeSupport(
        StoreSupportContributionRequest $request,
        ImageCompressor $imageCompressor,
        string $slug
    ): RedirectResponse {
        $memorialPage = MemorialPage::query()->where('slug', $slug)->firstOrFail();
        $payload = $request->validated();

        $proofImagePath = null;
        if ($request->hasFile('proof_image')) {
            $proofImagePath = $imageCompressor->compressAndStore(
                $request->file('proof_image'),
                'memorial/supports'
            );
        }

        SupportContribution::query()->create([
            'memorial_page_id' => $memorialPage->id,
            'name' => $payload['name'],
            'phone' => $payload['phone'],
            'nominal' => (int) $payload['nominal'],
            'proof_image_path' => $proofImagePath,
        ]);

        return redirect()
            ->route('memorial.support.page', ['slug' => $slug])
            ->withFragment('support-form')
            ->with('status', 'Terima kasih. Dukungan dan perhatian Anda akan kami sampaikan kepada pihak keluarga.');
    }

    public function storeRsvp(StoreRsvpRequest $request, string $slug): RedirectResponse
    {
        $memorialPage = MemorialPage::query()->where('slug', $slug)->firstOrFail();
        $payload = $request->validated();

        Rsvp::query()->create([
            'memorial_page_id' => $memorialPage->id,
            'name' => $payload['name'],
            'attendance' => $payload['attendance'],
            'guest_count' => (int) $payload['guest_count'],
            'note' => $payload['note'] ?? null,
        ]);

        return redirect()
            ->route('memorial.show', ['slug' => $slug])
            ->withFragment('rsvp')
            ->with('status', 'RSVP tersimpan. Terima kasih atas perhatian Anda.');
    }

    public function showTandaKasihLogin(string $slug): View|RedirectResponse
    {
        if (session('_family_auth_'.$slug) === true) {
            return redirect()->route('memorial.tanda-kasih', ['slug' => $slug]);
        }

        return view('memorial.tanda-kasih-login', ['slug' => $slug]);
    }

    public function loginTandaKasih(Request $request, string $slug): RedirectResponse
    {
        $password = config('app.family_password', 'Pramono2026');

        if ($request->input('password') === $password) {
            $request->session()->put('_family_auth_'.$slug, true);

            return redirect()->route('memorial.tanda-kasih', ['slug' => $slug]);
        }

        return back()->withErrors(['password' => 'Kata sandi tidak tepat.']);
    }

    public function showTandaKasih(string $slug): View|RedirectResponse
    {
        if (session('_family_auth_'.$slug) !== true) {
            return redirect()->route('memorial.tanda-kasih.login', ['slug' => $slug]);
        }

        $memorialPage = MemorialPage::query()
            ->where('slug', $slug)
            ->firstOrFail();

        $contributions = SupportContribution::query()
            ->whereBelongsTo($memorialPage)
            ->latest()
            ->get();

        $total = $contributions->sum('nominal');

        return view('memorial.tanda-kasih', [
            'memorialPage' => $memorialPage,
            'contributions' => $contributions,
            'total' => $total,
        ]);
    }
}

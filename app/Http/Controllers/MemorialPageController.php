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
            ->paginate(10, ['*'], 'tributes_page')
            ->fragment('memories');

        $rsvps = Rsvp::query()
            ->whereBelongsTo($memorialPage)
            ->latest()
            ->limit(8)
            ->get();

        return view('memorial.show', [
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

        return view('memorial.support', [
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
            'relations' => $relations,
            'message' => $payload['message'],
            'photos' => $photos,
            'is_highlighted' => false,
            'sort_order' => 0,
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
}

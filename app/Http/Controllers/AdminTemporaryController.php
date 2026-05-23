<?php

namespace App\Http\Controllers;

use App\Models\MemorialPage;
use App\Models\SupportContribution;
use App\Models\Tribute;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTemporaryController extends Controller
{
    private const USERNAME = 'admin';

    private const PASSWORD = 'HappyMonday+11';

    private function authenticated(): bool
    {
        return session('_atmp_auth') === true;
    }

    private function guard(): RedirectResponse|false
    {
        if (! $this->authenticated()) {
            return redirect()->route('admin-tmp.login');
        }

        return false;
    }

    public function loginForm(): View|RedirectResponse
    {
        if ($this->authenticated()) {
            return redirect()->route('admin-tmp.dashboard');
        }

        return view('admin-tmp.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $username = $request->input('username', '');
        $password = $request->input('password', '');

        if (hash_equals(self::USERNAME, $username) && hash_equals(self::PASSWORD, $password)) {
            session(['_atmp_auth' => true]);

            return redirect()->route('admin-tmp.dashboard');
        }

        return back()->withErrors(['auth' => 'Username atau password salah.']);
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('_atmp_auth');

        return redirect()->route('admin-tmp.login');
    }

    public function dashboard(): View|RedirectResponse
    {
        if ($redirect = $this->guard()) {
            return $redirect;
        }

        $page = MemorialPage::first();
        $tributes = Tribute::query()
            ->whereBelongsTo($page)
            ->orderBy('sort_order')
            ->orderBy('created_at')
            ->paginate(15);
        $contributions = SupportContribution::query()
            ->whereBelongsTo($page)
            ->latest()
            ->get();

        return view('admin-tmp.dashboard', compact('page', 'tributes', 'contributions'));
    }

    public function toggleTribute(int $id): RedirectResponse
    {
        if ($redirect = $this->guard()) {
            return $redirect;
        }

        $tribute = Tribute::findOrFail($id);
        $tribute->update(['is_hidden' => ! $tribute->is_hidden]);

        return back()->with('success', 'Pesan diperbarui.');
    }

    public function updateSortOrders(Request $request): RedirectResponse
    {
        if ($redirect = $this->guard()) {
            return $redirect;
        }

        foreach ((array) $request->input('orders', []) as $id => $order) {
            Tribute::where('id', (int) $id)->update(['sort_order' => (int) $order]);
        }

        return back()->with('success', 'Urutan disimpan.');
    }

    public function toggleSupport(): RedirectResponse
    {
        if ($redirect = $this->guard()) {
            return $redirect;
        }

        $page = MemorialPage::first();
        $page->update(['support_hidden' => ! $page->support_hidden]);

        return back()->with('success', 'Pengaturan disimpan.');
    }
}

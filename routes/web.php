<?php

use App\Http\Controllers\MemorialPageController;
use App\Models\MemorialPage;
use App\Models\Rsvp;
use App\Models\Tribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/search', function (Request $request) {
    $q = trim((string) $request->query('q', ''));
    $page = MemorialPage::query()
        ->where('is_active', true)
        ->where(function ($query) use ($q) {
            $query->whereRaw('LOWER(person_name) LIKE ?', ['%'.strtolower($q).'%'])
                ->orWhereRaw('LOWER(slug) LIKE ?', ['%'.strtolower($q).'%']);
        })
        ->first();

    if ($page) {
        return redirect()->route('memorial.show', ['slug' => $page->slug]);
    }

    return redirect()->route('home')->with('search_not_found', true);
})->name('memorial.search');

Route::get('/ericpramono-preview', function () {
    $memorialPage = MemorialPage::query()
        ->where('slug', 'ericpramono')
        ->firstOrFail();

    $tributes = Tribute::query()
        ->whereBelongsTo($memorialPage)
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

    return view('memorial.copilot', [
        'memorialPage' => $memorialPage,
        'tributes' => $tributes,
        'rsvps' => $rsvps,
    ]);
})->name('memorial.copilot');

Route::get('/eric-pramono', function () {
    return redirect()->route('memorial.show', ['slug' => 'ericpramono'], 301);
});

Route::prefix('{slug}')
    ->whereIn('slug', ['ericpramono'])
    ->controller(MemorialPageController::class)
    ->group(function (): void {
        Route::get('/', 'show')->name('memorial.show');
        Route::get('/dukungan', 'showSupport')->name('memorial.support.page');
        Route::post('/tributes', 'storeTribute')->name('memorial.tributes.store');
        Route::post('/support-contributions', 'storeSupport')->name('memorial.support.store');
        Route::post('/rsvps', 'storeRsvp')->name('memorial.rsvps.store');
    });

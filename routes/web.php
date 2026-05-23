<?php

use App\Http\Controllers\MemorialPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/ericpramono-preview', function () {
    $memorialPage = \App\Models\MemorialPage::query()
        ->where('slug', 'ericpramono')
        ->firstOrFail();

    $tributes = \App\Models\Tribute::query()
        ->whereBelongsTo($memorialPage)
        ->orderByDesc('is_highlighted')
        ->orderBy('sort_order')
        ->latest()
        ->paginate(6, ['*'], 'tributes_page')
        ->fragment('memories');

    $rsvps = \App\Models\Rsvp::query()
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

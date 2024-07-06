<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Home')->name('home');
Route::inertia('/about-us', 'AboutUs')->name('about-us');
Route::inertia('/statement-of-faith', 'StatementOfFaith')->name('statement-of-faith');
Route::inertia('/seed', 'Seed')->name('seed');
Route::inertia('/gallery', 'Gallery')->name('gallery');
Route::inertia('/gema', 'Gema')->name('gema');
Route::inertia('/contact-us', 'ContactUs')->name('contact-us');

Route::get('translations/{locale}', function (Request $request,$locale) {
    if (!in_array($locale, ['en', 'id'])) {
        abort(400, 'Invalid locale');
    }
     $request->session()->put('locale',$locale);
     return redirect()->back();
})->name('locale');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';

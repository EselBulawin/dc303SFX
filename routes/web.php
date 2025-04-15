<?php

use App\Http\Controllers\InvestorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // return Inertia::render('Welcome', [
    //     'canLogin' => Route::has('login'),
    //     'canRegister' => Route::has('register'),
    //     'laravelVersion' => Application::VERSION,
    //     'phpVersion' => PHP_VERSION,
    // ]);
    return inertia('Landing');
});

Route::get('/investors', [InvestorController::class, 'index'])->name('investors.index');
Route::get('/investors/create', [InvestorController::class, 'create'])->name('investors.create');
Route::post('/investors', [InvestorController::class, 'store'])->name('investors.store');

Route::get('/investors/page2', function () {
    return Inertia::render('Investor/Page2');
})->name('investors.page2');

Route::get('/investors/page3', function () {
    return Inertia::render('Investor/Page3');
})->name('investors.page3');

Route::get('/investors/page4', function () {
    return Inertia::render('Investor/Page4');
})->name('investors.page4');

Route::get('/investors/page5', function () {
    return Inertia::render('Investor/Page5');
})->name('investors.page5');

Route::get('/about', function() {
    return inertia('About');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

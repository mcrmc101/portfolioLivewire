<?php

use App\Livewire\Items\ItemPage;
use App\Livewire\PageTemplate;
use Illuminate\Support\Facades\Route;

Route::get('/', PageTemplate::class)->name('front.home');
Route::get('/portfolio/{slug}', ItemPage::class)->name('front.item');

Route::get('dashboard', function () {
    return redirect()->to('/admin');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';

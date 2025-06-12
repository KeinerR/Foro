<?php

use App\Livewire\Show\ShowThreads;
use App\Livewire\Show\ShowThread;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', ShowThreads::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::get('/thread/{threads}', ShowThread::class)
    ->middleware(['auth', 'verified'])
    ->name('thread');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

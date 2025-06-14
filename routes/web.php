<?php

use App\Http\Controllers\ThreadController;
use App\Livewire\Show\ShowThreads;
use App\Livewire\Show\ShowThread;

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', ShowThreads::class)->name('dashboard');

    Route::get('/thread/{threads}', ShowThread::class)->name('thread');

    Route::resource('threadView', ThreadController::class)
        ->parameters(['threadView' => 'thread'])
        ->except(['show', 'destroy', 'index']);

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


require __DIR__.'/auth.php';

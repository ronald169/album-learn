<?php

use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return redirect()->route('home', ['category' => 'all']);
});


Route::middleware('guest')->group(function () {
    Volt::route('/register', 'auth.register')->name('register');
    Volt::route('/login', 'auth.login')->name('login');
    Volt::route('/forgot-password', 'auth.forgot-password');
    Volt::route('/reset-password/{token}', 'auth.reset-password')->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('images/create', 'images.create')->name('images.create');
    Volt::route('albums', 'albums.index')->name('albums.index');
    Volt::route('albums/create', 'albums.create')->name('albums.create');
    Volt::route('albums/{album}/edit', 'albums.edit')->name('albums.edit');
    Volt::route('profile', 'auth.profile')->name('profile');
});

Route::middleware(Admin::class)->group(function () {
    Volt::route('categories/create', 'categories.create')->name('categories.create');
    Volt::route('categories', 'categories.index')->name('categories.index');
    Volt::route('categories/{category}/edit', 'categories.edit')->name('categories.edit');
    Volt::route('users', 'users.index')->name('users.index');
});

Volt::route('/{category}/{param?}', 'index')->name('home');

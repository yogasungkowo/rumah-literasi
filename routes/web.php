<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/donasi', function () {
    return view('pages.donasi');
});

Route::get('/pelatihan', function () {
    return view('pages.pelatihan');
});

Route::get('/sponsorship', function () {
    return view('pages.sponsorship');
});

// Auth routes
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

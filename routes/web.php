<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/auth/redirect', function () {
    return Socialite::driver('azure')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('azure')->user();

    dd($user);
});

Route::get('/', function () {
    return view('welcome');
});

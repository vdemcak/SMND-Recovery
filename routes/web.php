<?php

use App\Models\Materials;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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


Route::get('/auth/redirect', [App\Http\Controllers\Auth\AuthController::class, 'redirect'])->name('login');
Route::get('/auth/callback', [App\Http\Controllers\Auth\AuthController::class, 'callback']);
Route::post('/auth/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

Route::get('/portal', function () {
    return view('pages.portal', [
        'material_count' => Materials::count(),
        'file_count' => DB::table('materials')->selectRaw("SUM(cardinality(string_to_array(files, ','))) as total_sum")->value('total_sum')
    ]);
})->name('portal');


Route::get('/', function () {
    return view('pages.home');
})->name('home');

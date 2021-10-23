<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('account')->group(function() {
	Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login')->middleware('guest');
	Route::post('/login', 'App\Http\Controllers\LoginController@authenticate')->name('store');
	Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
});

Route::get('/', function () {
    return view('dashboard.dashboard');
})->name('dashboard')->middleware('user.session');

Route::get('/get/territories', 'App\Http\Controllers\DashboardController@getTerritories')->name('get.territories')->middleware('user.session');
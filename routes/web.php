<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


// Rotta per il guest
Route::name('guest.')
    ->namespace('Guest')
    ->group(function () {
        Route::get('', 'GuestController@index');
        Route::get('apartment/{id}', 'GuestController@show');
        Route::get('search', 'GuestController@ajaxRequest')->name('request');
        Route::post('search', 'GuestController@ajaxResponse')->name('response');
    });

Auth::routes();

Route::prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::resource('apartments', 'HomeController');
    });

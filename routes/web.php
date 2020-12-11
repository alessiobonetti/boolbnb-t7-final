<?php

use App\Http\Controllers\Admin\ChartController;
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
        Route::get('', 'GuestController@index')->name('index');
        Route::get('apartment/{id}', 'GuestController@show')->name('show');
        Route::post('apartment/{apartment}', 'GuestController@writeMex')->name('writeMex');
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
        Route::get('message', 'MessageController@index')->name('messages');
        Route::get('chart', 'ChartController@index')->name('chart');
        Route::post('carousel/{apartment}', 'CarouselController@store')->name('carousel');
        Route::get('payment', 'PaymentsController@make')->name('payment.make');
    });

<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('guest.welcome');
});


//rotte lato guest
Route::get('/', 'ApartmentController@index')->name('guest.index');
Route::get('/apartments/{apartmentt}', 'ApartmentController@show')->name('guest.show');

Auth::routes();


Route::middleware('auth')->namespace('Ura')->prefix('ura')->name('ura.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/dashboard', function () {
        return view('ura.dashboard');
    });
    Route::resource('apartments', 'ApartmentController');
    /* Routes index and show messages */
    Route::resource('messages', 'MessageController')->only('index', 'show');
});


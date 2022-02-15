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

Route::get('/home', 'HomeController@index')->name('home');

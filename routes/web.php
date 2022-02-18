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


//rotte lato guest
Route::get('/', 'ApartmentController@index')->name('guest.index');
Route::get('/apartments/{apartment}', 'ApartmentController@show')->name('guest.show');

Route::get('/advanced-search', function () {
    $apartments = App\Models\Apartment::all();
    $services = App\Models\Service::all();
    return view('guest.advanced-search', compact('apartments', 'services'));
})->name('guest.advanced-search');

Auth::routes();

Route::get('login', 'Middleware\LoginController@login')->name('login');

route::get('requireLogin', 'Middleware\LoginController@login')->name('requireLogin');


Route::middleware('auth')->namespace('Ura')->prefix('ura')->name('ura.')->group(function () {


    Route::get('dashboard', function () {
        return view('ura.dashboard');
    })->name('dashboard');



    Route::resource('apartments', 'ApartmentController')->scoped([
        'apartments' => 'slug',
    ]);



    /* Routes index and show messages */
    Route::resource('messages', 'MessageController')->only('index', 'show')->scoped([
        'messages' => 'slug',
    ]);
});

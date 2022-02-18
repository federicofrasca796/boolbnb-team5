<?php

use App\Http\Controllers\Ura\ApartmentController;
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


//Guest routes (to be deprecated with vue routes)
Route::get('/', 'ApartmentController@index')->name('guest.index');
Route::get('/apartments/{apartment}', 'ApartmentController@show')->name('guest.show');

Auth::routes();

Route::get('login', 'Middleware\LoginController@login')->name('login');

route::get('requireLogin', 'Middleware\LoginController@login')->name('requireLogin');

// Route::get('search', function () {
//     return view('guest.vue');
// })->name('search');

Route::middleware('auth')->namespace('Ura')->prefix('ura')->name('ura.')->group(function () {


    Route::get('dashboard', function () {
        return view('ura.dashboard');
    })->name('dashboard');



    Route::resource('apartments', 'ApartmentController')->scoped([
        'apartments' => 'slug',
    ]);


    Route::put('apartments/{apartment}/make-visible', 'ApartmentController@makeVisible')->name('apartments.makeVisibile');



    /* Routes index and show messages */
    Route::resource('messages', 'MessageController')->only('index', 'show')->scoped([
        'messages' => 'slug',
    ]);
});

Route::get('/{any}', function () {
    return view('guest.index');
})->where('any', '.*');
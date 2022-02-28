<?php

use App\Models\Apartment;
use App\Models\Message;
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

//Guest routes (deprecated with vue routes)
// Route::get('/', 'ApartmentController@index')->name('guest.index');
// Route::get('/apartments/{apartment}', 'ApartmentController@show')->name('guest.show');

Route::get('/advanced-search', 'SearchController@index')->name('guest.advanced-search');

Auth::routes();

Route::get('login', 'Middleware\LoginController@login')->name('login');

route::get('requireLogin', 'Middleware\LoginController@login')->name('requireLogin');

//rotte messages

Route::get('/message/{apartment}', 'MessageController@create')->name('{apartment}.message');
Route::post('/send', 'MessageController@store')->name('message.send');

Route::middleware('auth')->namespace('Ura')->prefix('ura')->name('ura.')->group(function () {

    Route::get('dashboard', function () {
        $apartment_sponsored = Apartment::with('sponsors')->where('user_id', Auth::user()->id)->get();
        $messages = Message::with(['apartment'])->whereHas('apartment', function($query){
            $query->where('user_id', Auth::User()->id);
        })->paginate(5);
        return view('ura.dashboard', compact('messages','apartment_sponsored'));
    })->name('dashboard');

    Route::resource('apartments', 'ApartmentController')->scoped([
        'apartments' => 'slug',
    ]);

    Route::post('apartments/store' , 'ApartmentController@store')->name('apartments.store');

    Route::put('apartments/{apartment}/make-visible', 'ApartmentController@makeVisible')->name('apartments.makeVisibile');

    /* Routes index and show messages */
    Route::resource('messages', 'MessageController')->only('index', 'show')->scoped([
        'messages' => 'slug',
    ]);
    //Rotte base payments
    Route::resource('sponsors', SponsorController::class)->only('index', 'show');

    //rotte payments
    Route::get('apartments/{apartment}/payment', 'ApartmentController@showPayment')->name('apartments.payment');
    Route::post('/apartments', 'SponsorController@sendPayment')->name('checkout');
});

Route::get('/{any}', function () {
    return view('guest.index');
})->where('any', '.*');

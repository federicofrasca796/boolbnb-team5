<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('apartments', 'Api\ApartmentController@index')->name('api.apartments.index');
Route::get('apartments/{apartment}', 'Api\ApartmentController@show')->name('api.apartments.show');
Route::get('apartments/address/{address}/coords/{coords}', 'Api\ApartmentController@search')->name('api.apartments.search');
Route::get('apartments/address/{address}/coords/{coords}/services/{services}', 'Api\ApartmentController@searchadv')->name('api.apartments.searchadv');

Route::get('services', 'Api\ServiceController@index')->name('api.services.index');

Route::get('sponsored', 'Api\SponsorController@index')->name('api.sponsored.index');
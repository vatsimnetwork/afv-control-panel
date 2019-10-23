<?php

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

//--------------------------------------------------------------------------
// Guest Endpoint
//--------------------------------------------------------------------------
Route::middleware('guest')->group(function () {
    Route::get('login', 'Auth\LoginController@login')->name('auth.login');
    Route::get('verify-login', 'Auth\LoginController@verifyLogin')->name('auth.login.verify');
});

//--------------------------------------------------------------------------
// Authenticated Endpoint
//--------------------------------------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');
    
    Route::get('/', 'HomepageController')->name('home');
    Route::resource('airports', 'AirportController');
    Route::resource('airports.runways', 'RunwayController');
});

Route::get('demo', function(){
    echo "Airport::find('LEMD')->rwy_configs()->first()  [ RwyConfigs\\RwyConfig::class ]";
    dump(\App\Models\Airport::find('LEMD')->rwy_configs()->first());

    echo "Airport::find('LEMD')->rwy_configs()->first()->valid_dates()->first()  [ RwyConfigs\\RwyConfigDatetime::class ]";
    dump(\App\Models\Airport::find('LEMD')->rwy_configs()->first()->valid_dates()->first());

    echo "Airport::find('LEMD')->rwy_configs()->first()->active_times()->first()  [ RwyConfigs\\RwyConfigTime::class ]";
    dump(\App\Models\Airport::find('LEMD')->rwy_configs()->first()->active_times()->first());

    echo "Airport::find('LEMD')->rwy_configs()->first()->runways()->first()  [ Runway::class ]";
    dump(\App\Models\Airport::find('LEMD')->rwy_configs()->first()->runways()->first());
});
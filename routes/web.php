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


Route::auth();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function(){
    return redirect('date/'. \Carbon\Carbon::now()->startOfDay()-> timestamp);
});

Route::get('/date/{timestamp}', 'HomeController@index');

Route::post('reserve-me/{equipment}/{time}',['as' => 'reserve-me', 'uses' => 'BookingController@reserve']);
Route::get('reserve-me/{equipment}/{time}/{timeTo}',['as' => 'reserve-me-to', 'uses' => 'BookingController@reserveTo']);

Route::group(['middleware' => 'auth',], function () {
    Route::get('book/{equipment}/{time}', 'BookingController@index');
    Route::get('booking/{reservation}/run', ['as' => 'booking.run', 'uses' => 'BookingController@run']);
    Route::get('booking/{reservation}/edit', ['as' => 'booking.edit', 'uses' => 'BookingController@edit']);
    Route::put('booking/{reservation}', ['as' => 'booking.update', 'uses' => 'BookingController@update']);
    Route::get('booking/{reservation}/terminate', ['as' => 'booking.terminate', 'uses' => 'BookingController@terminate']);
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/', function(){
        return redirect('admin/user');
    });

    Route::resource('user', 'UserController');
    Route::get('user/destroyMe/{destroyMe}', ['as' => 'user.destroyMe', 'uses' => 'UserController@destroyMe']);
    Route::get('user/changeState/{id}', ['as' => 'user.changeState', 'uses' => 'UserController@changeState']);

    Route::resource('equipment', 'EquipmentController');
    Route::get('equipment/destroyMe/{destroyMe}', ['as' => 'equipment.destroyMe', 'uses' => 'EquipmentController@destroyMe']);

    Route::resource('method', 'EquipmentMethodController');
    Route::get('method/destroyMe/{destroyMe}', ['as' => 'method.destroyMe', 'uses' => 'EquipmentMethodController@destroyMe']);

    Route::resource('review', 'ReviewController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

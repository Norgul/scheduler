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

Route::get('/', function () {
    return redirect('date/' . \Carbon\Carbon::now()->startOfDay()->timestamp);
});

Route::get('/date/{timestamp}', 'HomeController@index');

Route::group(['middleware' => 'auth',], function () {
    Route::get('reserve/{equipment}/{time}', 'ReservationController@index');
    Route::resource('reservation', 'ReservationController', ['except' => 'index']);
    Route::get('reservation/{reservation}/run', ['as' => 'reservation.run', 'uses' => 'ReservationController@run']);
    Route::put('reservation/terminate/{reservation}', ['as' => 'reservation.update_termination', 'uses' => 'ReservationController@update_termination']);
    Route::get('reservation/{reservation}/terminate', ['as' => 'reservation.terminate', 'uses' => 'ReservationController@terminate']);
    Route::post('reserve-me/{equipment}/{time}', ['as' => 'reserve-me', 'uses' => 'ReservationController@reserve']);
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {

    Route::get('/', function () {
        return redirect('admin/user');
    });

    Route::resource('user', 'UserController');
    Route::get('user/destroyMe/{destroyMe}', ['as' => 'user.destroyMe', 'uses' => 'UserController@destroyMe']);
    Route::get('user/changeState/{id}', ['as' => 'user.changeState', 'uses' => 'UserController@changeState']);

    Route::resource('equipment', 'EquipmentController');
    Route::get('equipment/destroyMe/{destroyMe}', ['as' => 'equipment.destroyMe', 'uses' => 'EquipmentController@destroyMe']);

    Route::resource('method', 'EquipmentMethodController');
    Route::get('method/destroyMe/{destroyMe}', ['as' => 'method.destroyMe', 'uses' => 'EquipmentMethodController@destroyMe']);

    Route::resource('column', 'MethodColumnController');
    Route::get('column/destroyMe/{destroyMe}', ['as' => 'column.destroyMe', 'uses' => 'MethodColumnController@destroyMe']);

    Route::resource('review', 'ReviewController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

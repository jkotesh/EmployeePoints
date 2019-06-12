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

Route::group(['prefix' => 'admin'], function () 
{
	Route::resource('/', 'LoginController');
	Route::post('validateuser', array('as' => 'validateuser', 'uses' => 'LoginController@validateuser'));

	Route::resource('dashboard', 'DashboardController');
	Route::get('logout', 'LoginController@logout');
	Route::resource('profile', 'ProfileController');
	Route::resource('points', 'PointsController');
	Route::resource('employee', 'EmployeeController');
});

Route::resource('/', 'EmployeePointsController');
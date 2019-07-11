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
use Illuminate\Http\Request;
Route::group(['prefix' => 'admin'], function () 
{
	Auth::routes();
	Route::resource('/', 'LoginController');
	Route::post('validateuser', array('as' => 'validateuser', 'uses' => 'LoginController@validateuser'));
	Route::get('/forgot', function () {
    return view('login.forgot');
	});
	Route::get('/resetpassword', function (Request $request) {
		$token = $request->hash;
		$email = $request->email;
	    return view('auth.passwords.reset')->with('token',$token)->with('email',$email);
	});
	Route::post('forgot', array('as' => 'forgot', 'uses' => 'LoginController@forgot'));
	Route::post('resetpassword', array('as' => 'resetpassword', 'uses' => 'LoginController@resetpassword'));
	Route::resource('dashboard', 'DashboardController');
	Route::get('logout', 'LoginController@logout');
	Route::resource('profile', 'ProfileController');
	Route::resource('points', 'PointsController');
	Route::resource('employee', 'EmployeeController');
	Route::resource('employeepointsoverall', 'EmployeePointsOverall');

	Route::post('allowprivileges/{role_id}/{module_id}/{privilege_id}', array('as' => 'allowprivileges', 'uses' => 'PrivilegesController@allowprivileges'));
	Route::post('denyprivileges/{role_id}/{module_id}/{privilege_id}', array('as' => 'denyprivileges', 'uses' => 'PrivilegesController@denyprivileges'));
	Route::resource('privilegesmatrix', 'PrivilegesController@privilegesmatrix');
	Route::resource('privileges', 'PrivilegesController');
});

Route::resource('/', 'EmployeePointsController');
Route::get('employeedetails', 'EmployeePointsController@EmployeeDetails');
<?php

use Illuminate\Http\Request;

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

Route::prefix('v1')->group(function () 
{
Route::get('getversion','RestApiGeneralController@V1_GetVersion');
Route::post('login','RestApiGeneralController@V1_Login');
Route::post('changepassword','RestApiGeneralController@V1_ChangePassword');

Route::get('getallemployeepoints','RestApiGeneralController@V1_GetAllEmployeePoints');
Route::get('employeelist','RestApiGeneralController@V1_EmployeeList');
Route::post('employeedatewisepoints','RestApiGeneralController@V1_EmployeeDateWisePoints');
Route::get('getroles','RestApiGeneralController@V1_GetRoles');
Route::post('viewemployee','RestApiGeneralController@V1_ViewEmployee');
Route::post('addemployee','RestApiGeneralController@V1_AddEmployee');
Route::post('editemployee','RestApiGeneralController@V1_EditEmployee');
Route::post('deleteemployee','RestApiGeneralController@V1_DeleteEmployee');

Route::get('pointslist','RestApiGeneralController@V1_PointsList');
Route::get('addpoints','RestApiGeneralController@V1_AddPoints');
Route::post('editpoints','RestApiGeneralController@V1_EditPoints');
Route::post('deletepoints','RestApiGeneralController@V1_DeletePoints');
});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use DB;
use App\AdminUsers;
use App\Points;
use App\Role;
use Input;
use Session;
use App\Log;
use File;
use Image;
use Carbon\Carbon;
use DateTimeZone;
use Hash;

class EmployeePointsController extends Controller
{
	public function index()
    {
    	$role = Role::where('role_type','=',2)->inRandomOrder()->get();
    	if (count($role) > 0) 
    	{
    		$role_id = $role[0]->id;
    		$role_name = $role[0]->name;
    	}
    	else
    	{
    		$role_id = 0;
    		$role_name = "";
    	}
        $employeepoints = getpoints($role_id);
        return view('employeepoints.index', compact('employeepoints'))
        ->with('role_name',$role_name);
    }
}

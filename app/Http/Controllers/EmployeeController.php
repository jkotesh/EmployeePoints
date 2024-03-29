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
use App\Role;
use Input;
use Session;
use App\Log;
use File;
use Image;
use Carbon\Carbon;
use DateTimeZone;
use Hash;

class EmployeeController extends Controller
{
	private function getPrivileges()
	 {
	    $roleid = Session::get("role_id");
	    $privileges['View']  = ValidateUserPrivileges($roleid,1,1);  //role, module, privilege
	    $privileges['Add']  = ValidateUserPrivileges($roleid,1,2);
	    $privileges['Edit']  = ValidateUserPrivileges($roleid,1,3);
	    $privileges['Delete']  = ValidateUserPrivileges($roleid,1,4);        
	    return $privileges;
	 }

    public function index()
    {
    	if ( !Session::has('user_id') || Session::get('user_id') == '' )
            return Redirect::to('/');
        $privileges = $this->getPrivileges();

        $employees = DB::table('admin_users')
               ->join('role', 'role.id', '=', 'admin_users.role_id')
                ->select(DB::raw('admin_users.*,role.name as role_name,if(ifnull(admin_users.status,1)=1,"Active","Inactive") as status'))
                ->get();
        return view('employee.index', compact('employees'))         
        ->with('privileges',$privileges);
    }

     public function create()
    {
       if ( !Session::has('user_id') || Session::get('user_id') == '' )
            return Redirect::to('/');
        $privileges = $this->getPrivileges();
        if($privileges['Add'] !='true')    
            return Redirect::to('/');       
        $role = Role::all()->pluck('name','id');  

        return View::make('dashboard.create')
        ->with('role',$role)        
        ->with('privileges',$privileges);
    }

    public function store(Request $request)
    {
        $input = Input::all(); 
        $this->validate($request, [
            'email'  => 'required|unique:admin_users','password'  => 'required','mobileno'=> 'required']);        
        
        $rules = array('');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) 
        {
            return Redirect::route('dashboard.create')
                ->withInput()
                ->withErrors($validator)
                ->with('errors', 'There were validation errors');
        }
        else
        {   
            
            $person = new AdminUsers();
            $person->name =  ucwords(Input::get('name'));
            $person->email =  Input::get('email');
            $person->password =  Hash::make(Input::get('password'));
            $person->role_id =  Input::get('role_id'); 
            $person->status =  Input::get('status');
            $person->mobileno = Input::get('mobileno');
            $person->created_by =  Session::get('user_id');
            $person->created_on =   Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $person->save();   

            $employee_destinationDir = env('CONTENT_EMPLOYEE_IMAGES');
             if($files=$request->file('logo')){
                $name=$files->getClientOriginalName();
                $extension = $files->getClientOriginalExtension();
                $filename = $person->id . '.' . $extension;
                $person->profile_image = env('APP_URL'). '/' . $employee_destinationDir.'/'. $filename;
                $person->Update();
                $files->move($employee_destinationDir,$filename);
             }          

            $log = new Log();
            $log->module_id=1;
            $log->action='create';      
            $log->description='Employee ' . $person->name . ' Created Successfully!';
            $log->created_on=  Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $log->user_id=Session::get('user_id'); 
            $log->category=1;    
            $log->log_type=1;
            createLog($log);

        return Redirect::route('dashboard.index')->with('success',$log->description);
        
        }
    }

    public function edit($id)
    {
        if ( !Session::has('user_id') || Session::get('user_id') == '' )
            return Redirect::to('/');
        $privileges = $this->getPrivileges();
        if($privileges['Edit'] !='true')
            return Redirect::to('/');        
        $user = AdminUsers::find($id);
        $role = Role::all()->pluck('name','id'); 
 
        return View::make('dashboard.edit', compact('user'))
        ->with('role',$role)
        ->with('privileges',$privileges);
    }

    public function update(Request $request, $id)
    {
         $input = Input::all(); 

         $this->validate($request, [
            'email'  => 'required','email'=> 'required']);
        $rules = array('');
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) 
        {
            return Redirect::route('dashboard.edit',$id)
                ->withInput()
                ->withErrors($validator)
                ->with('warning', 'There were validation errors');
        }
        else
        {   
            
            $person = AdminUsers::find($id);
            $person->name =  ucwords(Input::get('name'));
            $person->email =  Input::get('email');
            $person->role_id =  Input::get('role_id'); 
            $person->status =  Input::get('status');
            $person->mobileno = Input::get('mobileno');
            $person->modified_by =  Session::get('user_id');
            $person->modified_on =   Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $person ->update();

            $log = new Log();
            $log->module_id=1;
            $log->action='update';      
            $log->description='Employee ' . $person->name . ' Updated Successfully!';
            $log->created_on= Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $log->user_id=Session::get("user_id"); 
            $log->category=1;    
            $log->log_type=1;
            createLog($log);
        return Redirect::route('dashboard.index')->with('success',$log->description);
        
        }

    }
}

<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use DB;
use App\Role;
use Input;
use Session;
use App\Log;
use File;
use Image;
use Carbon\Carbon;
use DateTimeZone;
use Hash;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function getPrivileges()
     {
        $roleid = Session::get("role_id");
        $privileges['View']  = ValidateUserPrivileges($roleid,10,1);  //role, module, privilege
        $privileges['Add']  = ValidateUserPrivileges($roleid,10,2);
        $privileges['Edit']  = ValidateUserPrivileges($roleid,10,3);
        $privileges['Delete']  = ValidateUserPrivileges($roleid,10,4);        
        return $privileges;
     }

    public function index()
    {
        if ( !Session::has('user_id') || Session::get('user_id') == '' )
        return Redirect::to('/admin');
        $privileges = $this->getPrivileges();
       
        $roles = DB::table('role')
                ->select(DB::raw('id,role.name,if(ifnull(role_type,1)=1,"Admin","User") as role_type'))
                ->get();
         return View::make('role.index', compact('roles'))         
        ->with('privileges',$privileges);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( !Session::has('user_id') || Session::get('user_id') == '' )
            return Redirect::to('/admin');
        $privileges = $this->getPrivileges();
        if($privileges['Add'] !='true')    
            return Redirect::to('/admin'); 

        return View::make('role.create')
        ->with('privileges',$privileges);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all(); 
        $this->validate($request, [
            'name'  => 'required|unique:role']);        
        
        $rules = array('');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) 
        {
            return Redirect::route('role.create')
                ->withInput()
                ->withErrors($validator)
                ->with('errors', 'There were validation errors');
        }
        else
        {   
            
            $role = new Role();
            $role->name =  ucwords(Input::get('name'));
            $role->role_type =  Input::get('role_type');
            $role->save();      

            $log = new Log();
            $log->module_id=10;
            $log->action='create';      
            $log->description='Role ' . $role->name . ' Created Successfully!';
            $log->created_on=  Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $log->user_id=Session::get('user_id'); 
            $log->category=1;    
            $log->log_type=1;
            createLog($log);

        return Redirect::route('role.index')->with('success',$log->description);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return View::make('edit');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);       
       
        if (is_null($role))
        {
         return Redirect::back()->with('warning','Role Details Are Not Found!');
        }
        else
        {
            Role::find($id)->delete();

            $log = new Log();
            $log->module_id=10;
            $log->action='delete';      
            $log->description='Role '. $role->name . ' Deleted Successfully!';
            $log->created_on= Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $log->user_id=Session::get("user_id"); 
            $log->category=1;    
            $log->log_type=1;
            createLog($log);
           return Redirect::back()->with('success',$log->description);
        }
    }
}
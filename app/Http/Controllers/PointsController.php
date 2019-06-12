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
use Input;
use Session;
use App\Log;
use File;
use Image;
use Carbon\Carbon;
use DateTimeZone;
use Hash;

class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */   

    private function getPrivileges()
     {
        $roleid = Session::get("role_id");
        $privileges['View']  = ValidateUserPrivileges($roleid,2,1);  //role, module, privilege
        $privileges['Add']  = ValidateUserPrivileges($roleid,2,2);
        $privileges['Edit']  = ValidateUserPrivileges($roleid,2,3);
        $privileges['Delete']  = ValidateUserPrivileges($roleid,2,4);        
        return $privileges;
     }

    public function index()
    {
        if ( !Session::has('user_id') || Session::get('user_id') == '' )
        return Redirect::to('/');
        $privileges = $this->getPrivileges();
        $points = Points::join('admin_users', 'admin_users.id', '=', 'employee_points_daily.employee_id')
                ->select(DB::raw('employee_points_daily.id,admin_users.name,employee_points_daily.points,date'))
            ->get();

         return View::make('points.index', compact('points'))         
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
            return Redirect::to('/');
        $privileges = $this->getPrivileges();
        if($privileges['Add'] !='true')    
            return Redirect::to('/');       
        $employees = AdminUsers::all()->pluck('name','id');  

        return View::make('points.create')
        ->with('employees',$employees)        
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
            'points'  => 'required','date'  => 'required']);        
        
        $rules = array('');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) 
        {
            return Redirect::route('points.create')
                ->withInput()
                ->withErrors($validator)
                ->with('errors', 'There were validation errors');
        }
        else
        {   
            
            $points = new Points();
            $points->employee_id =  Input::get('employee_id');
            $points->points =  Input::get('points');
            $points->date =  Input::get('date');
            $points->comments =  Input::get('comments');
            $points->created_at =   Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $points->save(); 

            $employee = AdminUsers::find($points->employee_id);
            $employee->total_points = $employee->total_points + $points->points;
            $employee->Update();

            $log = new Log();
            $log->module_id=2;
            $log->action='create';      
            $log->description= $employee->name . ' got '.$points->points.' on '. $points->date;
            $log->created_on=  Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $log->user_id=Session::get('user_id'); 
            $log->category=1;    
            $log->log_type=1;
            createLog($log);

        return Redirect::route('points.index')->with('success',$log->description);
        
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
        if ( !Session::has('user_id') || Session::get('user_id') == '' )
            return Redirect::to('/');
        $privileges = $this->getPrivileges();
        if($privileges['Edit'] !='true')
            return Redirect::to('/'); 
        $point = Points::find($id);   
        $user = AdminUsers::find($point->employee_id); 
        return View::make('points.edit', compact('user'))
        ->with('point',$point)
        ->with('privileges',$privileges);
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
         $input = Input::all(); 
         $this->validate($request, [
            'points'  => 'required','date'=> 'required']);
        $rules = array('');
        $validator = Validator::make(Input::all(), $rules);
        
        if ($validator->fails()) 
        {
            return Redirect::route('points.edit',$id)
                ->withInput()
                ->withErrors($validator)
                ->with('warning', 'There were validation errors');
        }
        else
        {   
            
            $points = Points::find($id);
            $points->employee_id =  Input::get('employee_id');
            $points->points =  Input::get('points');
            $points->date =  Input::get('date');
            $points->comments =  Input::get('comments');
            $points->updated_at =   Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $points ->update();

            $log = new Log();
            $log->module_id=2;
            $log->action='update';      
            $log->description= Input::get('employee') . ' got '.$points->points.' on '. $points->date;
            $log->created_on= Carbon::now(new DateTimeZone('Europe/London'));
            $log->user_id=Session::get("user_id"); 
            $log->category=1;    
            $log->log_type=1;
            createLog($log);
        return Redirect::route('points.index')->with('success',$log->description);
        
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = AdminUsers::find($id);       
       
        if (is_null($user))
        {
         return Redirect::back()->with('warning','User Details Are Not Found!');
        }
        else
        {
           AdminUsers::find($id)->delete();
            $log = new Log();
            $log->module_id=1;
            $log->action='delete';      
            $log->description='Admin User '. $user->email . ' Deleted Successfully!';
            $log->created_on= Carbon::now(new DateTimeZone('Europe/London'));
            $log->user_id=Session::get("user_id"); 
            $log->category=1;    
            $log->log_type=1;
            createLog($log);
           return Redirect::back()->with('success',$log->description);
        }
    }
}

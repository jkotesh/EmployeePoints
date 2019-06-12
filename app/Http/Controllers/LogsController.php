<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Users;
use View;
use Input;
use DB;
use App\Role;
use App\Defaults;
use Session;
use App\Log;
use Excel;
use Carbon\Carbon;
use Lang;
use DateTimeZone;

class LogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        if ( !Session::has('user_id') || Session::get('user_id') == '' )
            return Redirect::to('/');
       
        $selectedrole = Input::get('role');
        $allroles = Role::all();
        $roles = Role::pluck('name', 'id');        
        if($selectedrole=='')
            $selectedrole = $allroles[0]->id;
        $Defaults = Defaults::all();
        $date = \Carbon\Carbon::today()->subDays($Defaults[0]->log_max_days);
        
        $logs = DB::table('log')
                ->join('module', 'module.id', '=', 'log.module_id')
                ->leftjoin('admin_users', 'admin_users.id', '=', 'log.user_id')
                ->select(DB::raw('log.*,module_name,admin_users.email,admin_users.role_id'))
                ->Where('admin_users.role_id','=',$selectedrole)
                ->Where('log.created_on','>=',$date)
                ->orderBy('log.created_on', 'Desc')
                ->get();
                
        return View::make('logs.index', compact('logs'))
        ->with('roles',$roles)
        ->with('selectedrole',$selectedrole);
    }


     public function getlogsDownload(Request $request)
    {
        if($request['role'])
        {
            $selectedrole = $request['role'];
        }
        else
        {
        $allroles = Role::all();
        $roles = Role::pluck('name', 'id');        
        if($selectedrole=='')
            $selectedrole = $allroles[0]->id;
        }

        $Defaults = Defaults::all();
        $date = \Carbon\Carbon::today()->subDays($Defaults[0]->log_max_days);

        $export = Log::join('module', 'module.id', '=', 'log.module_id')
                ->leftjoin('admin_users', 'admin_users.id', '=', 'log.user_id')
                ->select('log.created_on As CreatedOn',\DB::raw("module.module_name As ModuleName"),'log.action As Action','log.description as Description')
                ->Where('admin_users.role_id','=',$selectedrole)
                ->Where('log.created_on','>=',$date)
                ->orderBy('log.created_on', 'Desc')
                ->get();

        Excel::create('Logs_'.Carbon::now(new DateTimeZone('Asia/Kolkata')),function($excel) use($export) 
        {
            $excel->sheet('Sheet 1',function($sheet) use($export){
                $sheet->fromArray($export);
            });
        })->export('xls') ; 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      $log = Log::find($id);

    $request->session()->flash('alert-success', Lang::get('labels.successfullyyourdetailsdeleted'));
     $log = new Log();
            $log->module_id=4;
            $log->action='delete';      
            $log->description='logs ' . $log->module_id . ' is deleted';

            $log->created_on=  Carbon::now(new DateTimeZone('Asia/Kolkata'));
            $log->operator_id=Session::get("operator_id"); 
            $log->category=1;    
            $log->log_type=1;
            createLog($log);

    
       Log::find($id)->delete();
            return Redirect::route('log.index');
    }
}

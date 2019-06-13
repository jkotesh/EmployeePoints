<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Redirect;
use Input;
use DB;
use Session;
use DateTimeZone;
use Mail;
use Hash;
use App\AdminUsers;
use Carbon\Carbon;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $userid = Session::get('user_id');
       $valid_session = isset($userid) ? $userid === Session::get('user_id') : FALSE;
       if ($valid_session) 
       {
           $url = env('ADMIN_URL');
           header('Location: '.$url.'/dashboard');
           exit();
        }
       return View::make('auth.login');
    }
    public function validateuser(Request $request)
    {
        $input = Input::all();
        $this->validate($request, [
            'email'  => 'required|email','password'=>'required'
        ]);
        $rules = array('');
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
        {
            return View::make('login.login')
                ->withInput()
                ->withErrors($validator)
                ->with('errors', 'There were validation errors.');


        }
        $register_data = DB::table('admin_users')
            ->where('admin_users.email','=', Input::get("email"))
            ->get();       

        $loginerr = DB::table('admin_users')
            ->where('admin_users.email','=', Input::get("email"))
            ->count();

        if($loginerr > 0)
        {
            
            $logindetails = DB::table('admin_users')
            ->where('admin_users.email','=', Input::get("email"))
            ->where('admin_users.password','=',!Hash::check(Input::get('password'), $register_data[0]->password))
            ->get();
           
         $login = DB::table('admin_users')
            ->where('admin_users.email','=', Input::get("email"))
            ->where('admin_users.password','=', !Hash::check(Input::get('password'), $register_data[0]->password))
            ->count();
              
            if($login > 0)
            {

               if ($login == 1)
                    {
                        if($logindetails[0]->status == 1)
                        {
                            $adminuser = AdminUsers::find($logindetails[0]->id);
                            $hashedPassword = hash('sha256', $register_data[0]->password);
                            $adminuser->reset_hash = $hashedPassword;
                            $adminuser->Update();

                            Session::put("user_id",$logindetails[0]->id);
                            Session::put("name",$logindetails[0]->name);
                            Session::put("role_id",$logindetails[0]->role_id);
                            Session::put("email",$logindetails[0]->email);
                            Session::put("status",$logindetails[0]->status);
                            Session::put("mobileno",$logindetails[0]->mobileno);
                            Session::put("profile_image",$logindetails[0]->profile_image);

                            return Redirect::route('dashboard.index');
                        }
                        else {
                            return \Redirect::back()->withErrors( 'In active user')
                                ->withInput();
                        }
                    }
                    else
                    {                            
                        return \Redirect::back()->withErrors( 'Invalid User details')
                            ->withInput();
                    }
                  }
            else{
                            
                return \Redirect::back()->withErrors( 'Please Enter Correct Password')
                    ->withInput();
            } }
        else{
            return \Redirect::back()->withErrors( 'Please Enter Correct Login')
                ->withInput();
        }

    }

    public function logout(Request $request) 
    {
          Session::flush();
          return redirect('/admin');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgot(Request $request)
    {
        $input = Input::all();
       
         $this->validate($request, [
            'email'  => 'required|email'
        ]);
        $rules = array('');
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return View::make('login.forgot')
            ->withInput()
            ->withErrors($validator)
            ->with('errors', 'There were validation errors.');
        }
        $login_details = DB::table('admin_users')
            ->where('admin_users.email','=', Input::get("email")) 
            ->get();
        $login = DB::table('admin_users')
            ->where('admin_users.email','=', Input::get("email"))           
            ->count();
        if($login == 1)
        {
            $data = array('hash' => $login_details[0]->reset_hash ,'name'=>$login_details[0]->name,'email'=> $login_details[0]->email);          
            Mail::send('layouts.forgotpassword', $data, function($m) use ($data) {
                $m->from('info@advisrtech.com', 'Talent Test');
                $m->to($data['email'])->subject('Forgot Password!');
            });
           return redirect('/login')->with('success','We Have Mailed Your Reset Password Link!');
        }
        else{
             return \Redirect::back()->withErrors( 'Invalid Email')
                ->withInput();  
        }   
    }

    public function resetpassword(Request $request)
    {
        $input = Input::all();
        $this->validate($request, [
            'newpassword'  => 'required','cfnewpassword' => 'required'
        ]);
        $rules = array('');
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) 
        {
            return View::make('login.resetpassword')
            ->withInput()
            ->withErrors($validator)
            ->with('errors', 'There were validation errors.');
        }
        else
        {
            if($input['newpassword'] == $input['cfnewpassword'])
            {
                $email = $input['email'];
                $hash = $input['reset_hash'];
                $password = Hash::make($input['newpassword']);
                $resetpassword = "UPDATE admin_users SET password ='".$password."' WHERE email ='".$email."' and reset_hash='".$hash."'";
                DB::select(DB::raw($resetpassword));
              return redirect('/login')->with('success','Updated Password!');  
            }
            else
            {
                return \Redirect::back()->withErrors( 'Password And Confirm Password Are Not Match')
                ->withInput();
            }
        }

    }


    public function create()
    {
        
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
    public function destroy($id)
    {
        //
    }
}

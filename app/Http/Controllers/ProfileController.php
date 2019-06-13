<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;
use DB;
use Session;
use Hash;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return View::make('profile.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('assessment.create');
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
             'currentpassword'=>'required','password' => 'required']);
        
        $rules = array('');
        $validator = Validator::make(Input::all(), $rules);

        $strong_password = strongPassword($input['new_password']);
        if($strong_password == 0)
        {
            return Redirect::back()->with('warning','New password not strong enough - Minimum 8 characters, Uppoer/Lower case and Numeric!');
        }
        $login = DB::table('admin_users')
            ->where('admin_users.email','=', Session::get('email'))          
            ->get();
        $currentpassword_validation = DB::table('admin_users')
            ->where('admin_users.email','=', Session::get('email'))
            ->where('admin_users.password','=', !Hash::check($input['currentpassword'], $login[0]->password))       
            ->count();
        if($currentpassword_validation == 0)
        {
            return Redirect::back()->with('warning','Sorry exiting password incorrect!');
        }
        if(empty($input['new_password']))
        {
            return Redirect::back()->with('warning','Please Enter New Password!');
        }
        if($input['new_password'] != $input['password'])
        {
            return Redirect::back()->with('warning','Old Password And New Password MissMatched!');
        }

         if ($validator->fails()) 
        {
            return Redirect::route('profile.index')
                ->withInput()
                ->withErrors($validator)
                ->with('errors', 'There were validation errors');
        }
        else
        { 

             $login = DB::table('admin_users')
            ->where('admin_users.email','=', Session::get('email'))          
            ->count();
            
            if($login == 1)
            {
               DB::table('admin_users')
                ->where('email', Session::get('email'))
                ->update(['password' =>  Hash::make(Input::get('password'))]);

               Session::flush();
               return redirect('/admin')->with('success','Updated Password Successfully!');
            }
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

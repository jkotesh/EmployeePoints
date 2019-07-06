<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestApiGeneralController extends Controller
{
    public  function appendHeaders($object)
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
        ];
        return response()->json($object,200,$headers);
    }

    public function V1_GetVersion()
    {
        $returnvalue = v1_getVersion();
        $data = array('status' => 0,'message' => 'Success','result' => $returnvalue);
        return $this->appendHeaders($data);
    }

    public function V1_Login(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'email' => $request->{'email'},
                'password' => $request->{'password'}
            );
            
            $returnvalue = v1_login($UserData);
            if (in_array($returnvalue, array(-2001,-2002,-2003,-2004,-2005), true ) )
            {

                $message = "";
                if($returnvalue == -2001)
                $message = "In active user!";   
                else if($returnvalue == -2002)
                $message = "Invalid User details!";
                else if($returnvalue == -2003)
                $message = "Please Enter Correct Password!"; 
                else if($returnvalue == -2004)
                $message = "Please Enter Correct Login!"; 
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }

    public function V1_GetAllEmployeePoints()
    {
        $returnvalue = v1_getallemployeepoints();
        $data = array('status' => 0,'message' => 'Success','result' => $returnvalue);
        return $this->appendHeaders($data);
    }

    public function V1_EmployeeList()
    {
        $returnvalue = v1_employeelist();
        $data = array('status' => 0,'message' => 'Success','result' => $returnvalue);
        return $this->appendHeaders($data);
    }

    public function V1_GetRoles()
    {
        $returnvalue = v1_getroles();
        $data = array('status' => 0,'message' => 'Success','result' => $returnvalue);
        return $this->appendHeaders($data);
    }

    public function V1_AddEmployee(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'employeeno' => $request->{'employeeno'},
                'name' => $request->{'name'},
                'email' => $request->{'email'},
                'designation' => $request->{'designation'},
                'password' => $request->{'password'},
                'mobileno' => $request->{'mobileno'},
                'profile_image' => $request->{'profile_image'},
                'role_id' => $request->{'role_id'},
                'status' => $request->{'status'}
            );
            
            $returnvalue = v1_addemployee($UserData);
            if (in_array($returnvalue, array(-2001,-2002,-2003   ), true ) )
            {

                $message = "";
                if($returnvalue == -2001)
                $message = "Already exists with this employee no!";   
                else if($returnvalue == -2002)
                $message = "Already exists with this email!";
                else if($returnvalue == -2003)
                $message = "Already exists with this mobile no!"; 
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }

    public function V1_EditEmployee(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'employee_id' => $request->{'employee_id'},
                'employeeno' => $request->{'employeeno'},
                'name' => $request->{'name'},
                'email' => $request->{'email'},
                'designation' => $request->{'designation'},
                'mobileno' => $request->{'mobileno'},
                'profile_image' => $request->{'profile_image'},
                'role_id' => $request->{'role_id'},
                'status' => $request->{'status'}
            );
            
            $returnvalue = v1_editemployee($UserData);
            if (in_array($returnvalue, array(-2001), true ) )
            {

                $message = "";
                if($returnvalue == -2001)
                $message = "Employee details not found!"; 
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }

    public function V1_DeleteEmployee(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'employee_id' => $request->{'employee_id'}
            );
            
            $returnvalue = v1_deleteemployee($UserData);
            if (in_array($returnvalue, array(-2001), true ) )
            {

                $message = "";
                if($returnvalue == -2001)
                $message = "Employee details not found!"; 
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }

    public function V1_PointsList()
    {
        $returnvalue = v1_pointslist();
        $data = array('status' => 0,'message' => 'Success','result' => $returnvalue);
        return $this->appendHeaders($data);
    }

     public function V1_AddPoints(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'employee_id' => $request->{'employee_id'},
                'points' => $request->{'points'},
                'date' => $request->{'date'},
                'comments' => $request->{'comments'}
            );
            
            $returnvalue = v1_addpoints($UserData);
            if (in_array($returnvalue, array(-2001), true ) )
            {
                $message = "";
                if($returnvalue == -2001)
                $message = "Already points added to this employee and this date!"; 
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }

    public function V1_EditPoints(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'point_id' => $request->{'point_id'},
                'employee_id' => $request->{'employee_id'},
                'points' => $request->{'points'},
                'date' => $request->{'date'},
                'comments' => $request->{'comments'}
            );
            
            $returnvalue = v1_editpoints($UserData);
            if (in_array($returnvalue, array(-2001), true ) )
            {
                $message = "";
                if($returnvalue == -2001)
                $message = "point details are not found!"; 
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }

    public function V1_DeletePoints(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'point_id' => $request->{'point_id'}
            );
            
            $returnvalue = v1_deletepoints($UserData);
            if (in_array($returnvalue, array(-2001), true ) )
            {
                $message = "";
                if($returnvalue == -2001)
                $message = "point details are not found!"; 
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }

    public function V1_ViewEmployee(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'employee_id' => $request->{'employee_id'}
            );
            
            $returnvalue = v1_viewemployee($UserData);
            if (in_array($returnvalue, array(-2001), true ) )
            {
                $message = "";
                if($returnvalue == -2001)
                $message = "Employee details are not found!"; 
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }

    public function V1_ChangePassword(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'email' => $request->{'email'},
                'currentpassword' => $request->{'currentpassword'},
                'password' => $request->{'password'},
                'new_password' => $request->{'new_password'},
            );
            
            $returnvalue = v1_changepassword($UserData);
            if (in_array($returnvalue, array(-2001,-2002,-2003,-2004,-2005), true ) )
            {
                $message = "";
                if($returnvalue == -2001)
                $message = "New password not strong enough - Minimum 8 characters, Uppoer/Lower case and Numeric!"; 
                else if($returnvalue == -2002)
                $message = "Sorry exiting password incorrect!";
                else if($returnvalue == -2003)
                $message = "Please Enter New Password!";
                else if($returnvalue == -2004)
                $message = "Old Password And New Password MissMatched!";
                else if($returnvalue == -2005)
                $message = "Details not found!";
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }

    public function V1_EmployeeDateWisePoints(Request $request)
    {
        $postdata = file_get_contents("php://input");
        if (isset($postdata)) 
        {
            $request = json_decode($postdata);

             $UserData = array(
                'employee_id' => $request->{'employee_id'},
                'month' => $request->{'month'},
                'year' => $request->{'year'},
            );
            
            $returnvalue = v1_employeedatewisepoints($UserData);
            if (in_array($returnvalue, array(-2001), true ) )
            {
                $message = "";
                if($returnvalue == -2001)
                $message = "Details not found!";
                $data = array('status' => $returnvalue,'message' => $message,'result' => null);
                return $this->appendHeaders($data);
            }
            else
            {   
                $message = "Success";
                $data = array('status' => 0,'message' => $message,'result' => $returnvalue);
                return $this->appendHeaders($data); 
            }
        }
        else
        {
            $data = array('status' => -1000,'message' => 'Invalid Inputdata','result' => null);
            return $this->appendHeaders($data);
        }
    }


}
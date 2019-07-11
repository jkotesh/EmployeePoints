<?php 
use App\RoleModulePrivileges;
use App\Defaults;
use App\AdminUsers;
use App\Points;
use App\Log;
use Carbon\Carbon;
use App\Role;

function strongPassword($pwd) {
        if (preg_match("#.*^(?=.{8,20})(?=.*[a-zA-Z])(?=.*[0-9]).*$#", $pwd)) {
            return 1;
        } else {
            return 0;
        }
    }
function generateRandomHexString($length) {
        return substr(bin2hex(openssl_random_pseudo_bytes(ceil($length / 2))), 0, $length);
    }
    
function randomPin(){
   $hex=generateRandomHexString(8);
   $dec=hexdec($hex);
  return substr($dec,0,6);
}

function ValidateUserPrivileges($role_id, $module_id, $privilege_id)
{
    $count  = DB::table('rolemoduleprivileges') 
                    ->where('role_id','=',$role_id)
                    ->where('module_id','=',$module_id)
                    ->where('privilege_id','=',$privilege_id)
                    ->count();
    if($count>0)
        return "true";
    else
        return "false";                  
}
function createLog($log)
{
    $defaults = Defaults::all();

    $validate = true;
    if($log->action == 'create')
    {
        if($defaults[0]->allow_create_logs<>'1')
            $validate = false;
    }
    elseif($log->action == 'update')
    {
        if($defaults[0]->allow_edit_logs<>'1')
            $validate = false;
    }
    elseif($log->action ==  'delete')
    {
        if($defaults[0]->allow_delete_logs<>'1')
            $validate = false;
    }
    
    if($validate)
    {
        $objLog = new Log();
        $objLog->module_id  =$log->module_id;   
        $objLog->created_on  =$log->created_on;
        $objLog->user_id =   $log->user_id;
        $objLog->action      =$log->action;
        $objLog->category    =$log->category;
        $objLog->description =$log->description;
        $objLog->log_type    =$log->log_type;
        $objLog->save();
    }
}

function createThumbnailImage($sourceDir,$identity,$extension)
{
    $info = getimagesize($sourceDir . '//' . $identity . '.' .  $extension);

    if ($info['mime'] == 'image/jpeg') 
    {
        $quality = 60;
        $image = imagecreatefromjpeg($sourceDir . '//' . $identity . '.' .  $extension);
    }
    elseif ($info['mime'] == 'image/gif')
    { 
        $quality = 60;
        $image = imagecreatefromgif($sourceDir . '//' . $identity . '.' .  $extension);
    }
    elseif ($info['mime'] == 'image/png')
    { 
        $quality = 30;
        $image = imagecreatefrompng($sourceDir . '//' . $identity . '.' .  $extension);
    }                 
    elseif ($info['mime'] == 'image/svg')
    { 
        $quality = 30;
        $image = imagecreatefrompng($sourceDir . '//' . $identity . '.' .  $extension);
    }

    $dest_image = $sourceDir . '//' . $identity . '_t.' .  $extension;
    $width =ImageSx($image);
    $height = ImageSy($image);
    $dst = ImageCreateTrueColor($width,$height);
    imagecopyresampled($dst,$image,0,0,0,0,$width,$height,$width,$height);

    imagejpeg($dst,$dest_image, $quality);
}

function v1_getallemployeepoints()
{
    $departmentwise = DB::table('admin_users')
    ->join('role', 'role.id', '=', 'admin_users.role_id')
    ->select(DB::raw('admin_users.role_id,role.name'))
    ->where('role.role_type','=',2)
    ->Groupby('admin_users.role_id','role.name')
    ->get();
    if(count($departmentwise) > 0)
    {
        foreach ($departmentwise as $key => $value) 
        {
            $Data[$key]['role_id'] = $value->role_id;
            $Data[$key]['role_name'] = $value->name;
            $Data[$key]['employees'] = getpoints($value->role_id);
        }
        $Finaldata = $Data;
    }
    else
    {
        $Finaldata = [];
    }
    return $Finaldata;
}

function getpoints($role_id)
{
    $points = Points::join('admin_users', 'admin_users.id', '=', 'employee_points_daily.employee_id')
        ->select(DB::raw('employee_points_daily.employee_id,admin_users.name,admin_users.profile_image,sum(employee_points_daily.points) as totalpoints,employeeno,admin_users.designation'))
        ->where('admin_users.role_id','=',$role_id)
        ->whereMonth('date', '=', date('m'))
        ->Groupby('employee_id','name','profile_image','employeeno','designation')
        ->Orderby('totalpoints','desc')
        ->get();
    if(count($points) > 0)
    {
        foreach ($points as $key => $value) 
        {
            $Data[$key]['employee_id'] = $value->employee_id;
            $Data[$key]['name'] = $value->name;
            $Data[$key]['designation'] = $value->designation;
            $Data[$key]['employeeno'] = $value->employeeno;
            $Data[$key]['profile_image'] = $value->profile_image;
            $Data[$key]['totalpoints'] = $value->totalpoints;
            $Data[$key]['datewisepoints'] = employeedatewisepoints($value->employee_id);
        }
        $Finaldata = $Data;
    }
    else
    {
        $Finaldata = [];
    }
    return $Finaldata;
}

function employeedatewisepoints($employee_id)
{
    $employeepoints = DB::table('employee_points_daily')
        ->select(DB::raw('employee_points_daily.points,employee_points_daily.date'))
        ->where('employee_points_daily.employee_id','=',$employee_id)
        ->whereMonth('date', '=', date('m'))
        ->get();
    return $employeepoints;
}

function employeedetails($emp_id)
{
    $currentMonth = date('m');
    $currentYear = date('Y');
    $totaldays = cal_days_in_month(CAL_GREGORIAN,$currentMonth,$currentYear);
    $today = new DateTime();
    $lastDayOfThisMonth = new DateTime('last day of this month');
    $nbOfDaysRemainingThisMonth =  $lastDayOfThisMonth->diff($today)->format('%a');
    $days = $totaldays - $nbOfDaysRemainingThisMonth-1;
    for ($ind = $days; $ind >= 0; $ind--)
    {
        $datepoints = [];
        $date  = Carbon::now()->addDays(-1 * $ind)->formatLocalized('%Y-%m-%d');
        $lastdates = new DateTime($date);
        $datepoints['country'] =  $lastdates->format('d');
        $point =  Points::where('date','=',$date)->where('employee_id','=',$emp_id)->first();
        $datepoints['value'] = $point['points'];
        $date_wise_points[] = $datepoints;
    }

    return $date_wise_points;
}

function v1_getVersion()
{
    return '1.0.0';
}

function v1_login($UserData)
{
    $register_data = DB::table('admin_users')
            ->where('admin_users.email','=', $UserData['email'])
            ->get();       

        $loginerr = DB::table('admin_users')
            ->where('admin_users.email','=', $UserData['email'])
            ->count();

        if($loginerr > 0)
        {
            
            $logindetails = DB::table('admin_users')
            ->where('admin_users.email','=', $UserData['email'])
            ->where('admin_users.password','=',!Hash::check($UserData['password'], $register_data[0]->password))
            ->get();
           
            $login = DB::table('admin_users')
                ->where('admin_users.email','=', Input::get("email"))
                ->where('admin_users.password','=', !Hash::check($UserData['password'], $register_data[0]->password))
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

                            return $adminuser;                            
                        }
                        else 
                        {
                            return -2001;
                        }
                    }
                    else
                    {   
                        return -2002;  
                    }
                  }
            else{
                            
                return -2003;
            } }
        else{
            return -2004;
        }
}

function v1_employeelist()
{
    $employees = AdminUsers::join('role', 'role.id', '=', 'admin_users.role_id')
               ->leftjoin('employee_points_daily', 'employee_points_daily.employee_id', '=', 'admin_users.id')
                ->select(DB::raw('admin_users.id as employee_id,admin_users.name,role.name as role_name,admin_users.email,admin_users.profile_image,sum(employee_points_daily.points) as totalpoints,employeeno,admin_users.designation,if(ifnull(admin_users.status,1)=1,"Active","Inactive") as status,admin_users.role_id,admin_users.mobileno'))
                ->where('admin_users.id','!=',1)
                ->Groupby('admin_users.id','admin_users.email','admin_users.name','role.name','profile_image','employeeno','designation','admin_users.status','admin_users.role_id','admin_users.mobileno')
                ->Orderby('totalpoints','desc')
                ->get();
    return $employees;
}

function v1_getroles()
{
    $role = Role::all();
    return $role;
}

function v1_addemployee($UserData)
{
    $employeeid_validate = AdminUsers::where('employeeno','=',$UserData['employeeno'])->count();
    if($employeeid_validate == 1)
    {
        return -2001;
    }
    $employeeemail_validate = AdminUsers::where('email','=',$UserData['email'])->count();
    if($employeeemail_validate == 1)
    {
        return -2002;
    }
    $employeemobileno_validate = AdminUsers::where('mobileno','=',$UserData['mobileno'])->count();
    if($employeemobileno_validate == 1)
    {
        return -2003;
    }
    
    $person = new AdminUsers();
    $person->name =  ucwords($UserData['name']);
    $person->email =  $UserData['email'];
    $person->employeeno =  $UserData['employeeno'];
    $person->password =  Hash::make($UserData['password']);
    $person->role_id =  $UserData['role_id']; 
    $person->designation =  $UserData['designation']; 
    $person->status =  $UserData['status'];
    $person->mobileno = $UserData['mobileno'];
    $person->created_by =  "1";
    $person->created_on =   Carbon::now(new DateTimeZone('Asia/Kolkata'));
    $person->save();

    if(!empty($UserData['profile_image']) && (strpos($UserData['profile_image'], 'base64') !== false))
    {
        $image_parts = explode(";base64,", $UserData['profile_image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = env('CONTENT_EMPLOYEE_IMAGES').'/' . $person->id . '.png';

        $file_path = env('APP_URL').'/'.$file;
        file_put_contents($file, $image_base64);
    }
    else
    {
        $file = env('APP_URL').'/assets/images/users/default.jpg';
        $file_path = env('APP_URL').'/assets/images/users/default.jpg';
    }
    
    $person->profile_image = $file_path;
    $person->Update();
    return $person;
}

function v1_editemployee($UserData)
{
    $person = AdminUsers::find($UserData['employee_id']);
    if(is_null($person))
    {
        return -2001;
    }

    $person->name =  ucwords($UserData['name']);
    $person->email =  $UserData['email'];
    $person->employeeno =  $UserData['employeeno'];
    $person->role_id =  $UserData['role_id']; 
    $person->designation =  $UserData['designation']; 
    $person->status =  $UserData['status'];
    $person->mobileno = $UserData['mobileno'];
    $person->created_by =  "1";
    $person->created_on =   Carbon::now(new DateTimeZone('Asia/Kolkata'));
    if(!empty($UserData['profile_image']) && (strpos($UserData['profile_image'], 'base64') !== false))
    {
        $image_parts = explode(";base64,", $UserData['profile_image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = env('CONTENT_EMPLOYEE_IMAGES').'/' . $person->id . '.png';

        $file_path = env('APP_URL').'/'.$file;
        file_put_contents($file, $image_base64);
    }
    else
    {
        $file = env('APP_URL').'/assets/images/users/default.jpg';
        $file_path = env('APP_URL').'/assets/images/users/default.jpg';
    }
    
    $person->profile_image = $file_path;
    $person->Update();
    return $person;
}

function v1_deleteemployee($UserData)
{
    $person = AdminUsers::find($UserData['employee_id']);
    if(is_null($person))
    {
        return -2001;
    }
    $person->delete();

    return "Employee deleted successfully!";
}

function v1_pointslist()
{
    $points = Points::join('admin_users', 'admin_users.id', '=', 'employee_points_daily.employee_id')
              ->select(DB::raw('employee_points_daily.id,admin_users.name,employee_points_daily.points,date,comments'))
             ->get();
    if(count($points) == 0)
    {
        return -2001;
    }
    return $points;
}

function v1_addpoints($UserData)
{
    $pointvalidate = Points::where('employee_id','=',$UserData['employee_id'])
              ->where('date','=',$UserData['date'])->count();
    if($pointvalidate > 0)
    {
        return -2001;
    }
    $points = new Points();
    $points->employee_id =  $UserData['employee_id'];
    $points->points =  $UserData['points'];
    $points->date =  $UserData['date'];
    $points->comments =  $UserData['comments'];
    $points->created_at =   Carbon::now(new DateTimeZone('Asia/Kolkata'));
    $points->save(); 

    return $points;
}

function v1_editpoints($UserData)
{
    $points = Points::find($UserData['point_id']);
    if(is_null($points))
    {
        return -2001;
    }
    $points->employee_id =  $UserData['employee_id'];
    $points->points =  $UserData['points'];
    $points->date =  $UserData['date'];
    $points->comments =  $UserData['comments'];
    $points->created_at =   Carbon::now(new DateTimeZone('Asia/Kolkata'));
    $points->Update(); 

    return $points;
}

function v1_deletepoints($UserData)
{
    $points = Points::find($UserData['point_id']);
    if(is_null($points))
    {
        return -2001;
    }
    $points->delete(); 

    return "Points deleted successfully!";
}

function v1_viewemployee($UserData)
{
    $employees = AdminUsers::join('role', 'role.id', '=', 'admin_users.role_id')
               ->leftjoin('employee_points_daily', 'employee_points_daily.employee_id', '=', 'admin_users.id')
                ->select(DB::raw('admin_users.id as employee_id,admin_users.name,role.name as role_name,admin_users.email,admin_users.profile_image,sum(employee_points_daily.points) as totalpoints,employeeno,admin_users.designation,if(ifnull(admin_users.status,1)=1,"Active","Inactive") as status,admin_users.mobileno,admin_users.role_id'))
                ->where('admin_users.id','=',$UserData['employee_id'])
                ->Groupby('admin_users.id','admin_users.email','admin_users.name','role.name','profile_image','employeeno','designation','admin_users.status','admin_users.mobileno','admin_users.role_id')
                ->Orderby('totalpoints','desc')
                ->get();
    return $employees;
}

function v1_changepassword($UserData)
{
    $strong_password = strongPassword($UserData['new_password']);
    if($strong_password == 0)
    {
        return -2001;
    }
    $login = DB::table('admin_users')
        ->where('admin_users.email','=', $UserData['email'])          
        ->first();
    if(is_null($login))
    {
        return -2005;
    }
    $currentpassword_validation = DB::table('admin_users')
        ->where('admin_users.email','=', $UserData['email'])
        ->where('admin_users.password','=', !Hash::check($UserData['currentpassword'], $login->password))
        ->count();
    if($currentpassword_validation == 0)
    {
        return -2002;
    }
    if(empty($UserData['new_password']))
    {
        return -2003;
    }
    if($UserData['new_password'] != $UserData['password'])
    {
        return -2004;
    }

    $login = DB::table('admin_users')
    ->where('admin_users.email','=', $UserData['email'])          
    ->count();    
    if($login == 1)
    {
       DB::table('admin_users')
        ->where('email', $UserData['email'])
        ->update(['password' =>  Hash::make($UserData['password'])]);
       return 'Updated Password Successfully!';
    }
    else
    {
        return -2005;
    }
}
function v1_employeedatewisepoints($UserData)
{
    $date = date_parse($UserData['month']);
    if($date['month'] < 10)
    {
        $month = '0'.$date['month'];
    }
    else
    {
         $month = $date['month'];
    }
    $employeepoints = DB::table('employee_points_daily')
        ->select(DB::raw('employee_points_daily.points,employee_points_daily.date,comments'))
        ->where('employee_points_daily.employee_id','=',$UserData['employee_id'])
        ->whereMonth('date', '=', $month)
        ->whereYear('date','=',$UserData['year'])
        ->get();
    if(count($employeepoints) > 0)
    {
        $total=0;
        foreach ($employeepoints as $key => $value) 
        {
            $Points['totalpoints']  = $total+= $value->points;
            $Get[$key]['points'] = $value->points;
            $Get[$key]['date'] = $value->date;
            $Get[$key]['comments'] = $value->comments;
        }
        $Finaldata = $Points;
        $Finaldata['datewise'] = $Get;
    }
    else
    {
        $Finaldata = [];
    }
    return $Finaldata;
}
?>
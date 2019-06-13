<?php 
use App\RoleModulePrivileges;
use App\Defaults;
use App\AdminUsers;
use App\Points;
use App\Log;
use Carbon\Carbon;

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

function getpoints()
{
    $points = Points::join('admin_users', 'admin_users.id', '=', 'employee_points_daily.employee_id')
        ->select(DB::raw('employee_points_daily.employee_id,admin_users.name,admin_users.designation,admin_users.profile_image,sum(employee_points_daily.points) as totalpoints,employeeno'))
        ->Groupby('employee_id','name','profile_image','employeeno','designation')
        ->Orderby('totalpoints','desc')
        ->get()->random(5);
    if(count($points) > 0)
    {
        foreach ($points as $key => $value) 
        {
            $Data[$key]['employee_id'] = $value->employee_id;
            $Data[$key]['name'] = $value->name;
            $Data[$key]['employeeno'] = $value->employeeno;
            $Data[$key]['profile_image'] = $value->profile_image;
            $Data[$key]['designation'] = $value->designation;
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

?>
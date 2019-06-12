<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    public $timestamps = false;
    protected $table = 'employee_points_daily';
}

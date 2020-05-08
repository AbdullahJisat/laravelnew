<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','email','image','department_id','action','actionTime','actionBy','is_delete','created_at','update_at'];
}

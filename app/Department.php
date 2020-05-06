<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = 
    ['code','name','action','actionTime','actionBy','is_delete','created_at','update_at'];
    // public function Course()
    // {
    //     return $this->hasMany(Course::class);
    //     //return $this->hasMany('App\Department', 'department_id', 'id');
    // }
}

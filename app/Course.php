<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = 
    ['code','name','department_id','action','actionTime','actionBy','is_delete','created_at','update_at'];
    // public function Department()
    // {
    //     return $this->belongsTo(Department::class);
    //     //return $this->hasMany('App\Department', 'department_id', 'id');
    // }
}

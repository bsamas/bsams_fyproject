<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{

    use SoftDeletes;

    protected $fillable=[
        'department_name'
    ];

     protected  $dates=[
         'deleted_at'
     ];

     public function staffs()

     {
     return $this->hasMany(Staff::class);
     }

    public function courses()
    {
        return $this->hasMany(course::class);
    }

    public function programme()
    {
        return $this->hasMany(programme::class);
    }


}

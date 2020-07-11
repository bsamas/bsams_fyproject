<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Programme extends Model
{

    use SoftDeletes;

    protected $fillable=[
        'programme_name'
    ];

     protected  $dates=[
         'deleted_at'
     ];

     public function courses()

     {
     return $this->hasMany(Course::class);
     }

    public function department()
    {
        return $this->belongsTo(department::class);
    }

}


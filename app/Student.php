<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;


    protected $fillable=[
        'reg_number',
        'fingerprint',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'year_of_study',
        'email',
        'phone_number'



    ];


    protected $dates=[
        'deleted_at'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(room::class);
    }
}

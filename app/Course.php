<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'code',
        'course_name',
        'semester',
        'year'
    ];

    protected $dates=[
        'deleted_at'
    ];

public function staff()
{
return $this->belongsTo(Staff::class);
}

public function attendances()
{
    return $this->hasMany(Attendance::class);
}

public function students(){
    return $this->belongsToMany(Student::class);
}
public function department()
{
    return $this->belongsTo(department::class);
}

public function rooms()
{
    return $this->belongsToMany(room::class);
}

public function programme()
{
    return $this->belongsTo(programme::class);
}

}

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
        'class',
        'programme_id'
    ];

    protected $dates=[
        'deleted_at'
    ];

public function staff()
{
return $this->belongsTo(Staff::class,'staff_id');
}

public function attendances()
{
    return $this->hasMany(Attendance::class);
}

public function students(){
    return $this->belongsToMany(Student::class,'student_id');
}
public function department()
{
    return $this->belongsTo(Department::class,'department_id');
}

public function rooms()
{
    return $this->belongsToMany(Room::class);
}

public function programme()
{
    return $this->belongsTo(Programme::class,'programme_id');
}

}

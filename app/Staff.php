<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'staff_number',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'type',
        'email',
        'phone_number',
        'username',
        'password'
        // 'department_id',
        // 'room_id'
    ];

    protected $dates = [
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{

    use SoftDeletes;

    protected $fillable=[
        'room_number',
        'room_type',
        'capacity',
        'longitude',
        'latitude'
    ];

    protected $dates=[

        'deleted_at'
    ];

    public function courses()
    {
        return $this->belongsToMany(course::class);
    }

    // public function students()
    // {
    //     return $this->belongsToMany(student::class);
    // }

}

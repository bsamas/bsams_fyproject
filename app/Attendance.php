<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
  use SoftDeletes;

  protected $fillable=[
      'status',
      'date',
      'type',
      'count',
      
    //   'time',
    //   'course_id',
    //   'student_id'
  ];

  protected $dates=[
      'deleted_at'
  ];

  public function course()
  {
   return $this->belongsTo(course::class);
  }


  public function student()
  {
      return $this->belongsTo(student::class);
  }

}

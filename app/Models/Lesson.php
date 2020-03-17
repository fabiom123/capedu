<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use Storage;
use File;

class Lesson extends Model
{
    //
    protected $table = 'lessons';

    protected $fillable = ['id','name','course_id','instructor_id'];

    public function courses() {
        return $this->belongsTo('App\Models\Course','course_id','id');
    } 
    public function sessions() {
        return $this->hasMany('App\Models\Session');
    }
}

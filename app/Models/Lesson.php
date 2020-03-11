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
 
}

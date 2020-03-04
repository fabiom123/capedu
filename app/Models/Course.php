<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use Storage;
use File;

class Course extends Model {
    protected $table = 'courses';

    protected $fillable = ['id_course','name','description','periodo','duration','type','state','instructor_id'];

    static public function get_courses(){
        return DB::table('courses')
        ->get();
    }
}

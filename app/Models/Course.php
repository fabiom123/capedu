<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use Storage;
use File;

class Course extends Model {
    protected $table = 'courses';

    protected $fillable = ['id','name','description','url_image','url_video','category','duration','start_date','end_date','periodo','duration','type','state','instructor_id'];
 
    static public function get_courses(){
        return DB::table('courses')
        ->get();
    }
    static public function get_distinct_course (){
        return DB::table('courses')
                    ->select('id', 'name')
                    ->distinct()
                    ->get();
    }
}

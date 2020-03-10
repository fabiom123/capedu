<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;
use Storage;
use File;

class Session extends Model {

    protected $table = 'sessions';

    protected $fillable = ['id','name','description','url_video','course_id','instructor_id'];
 
    static public function get_sessions(){
        return DB::table('sessions')
        ->get();
    }
}

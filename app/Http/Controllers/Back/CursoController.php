<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Auth;

class CursoController extends Controller {

    public function show_courses(){
        $user = Auth::id();
        $courses = Course::get_courses();
        return view ('instructor.courses', [
            'courses'    =>    $courses,
        ]); 
    }
    
}

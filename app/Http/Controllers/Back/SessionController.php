<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Session;
use App\Models\Lesson;
use Carbon\Carbon;
use Auth;
use Storage;
class SessionController extends Controller {
    public function show_sessions(){
        $instructor_id = Auth::guard('instructor')->user()->id; 
        $sessions = Session::get_sessions();
        return view ('instructor.courses.lista', [
            'instructor_id'    =>    $instructor_id,
            'sessions'    =>    $sessions,
        ]);  
    }
    public function store_lesson(Request $request){
        $input = $request->all();
        $now = Carbon::now(); 
        //dd($input);exit;
        /*insert data */
        try {
            $lesson = Lesson::create([
                'name' => $input['name'],
                'instructor_id' => isset($input['instructor_id']) ? $input['instructor_id'] : null,
                'course_id' => isset($input['course_id']) ? $input['course_id'] : null,
            ]);
            $session = Session::get_sessions_by_lesson($lesson->id);
            return response()->json([
                'lesson' => $lesson,
                'session' => $session,
                'msj' => 'Registro de leccion exitosa',
                'status' => true 
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function store_session(Request $request){
        $input = $request->all();
        $now = Carbon::now(); 
        //dd($input);exit;
        /*insert data */
        try {
            $session = Session::create([
                'name' => $input['name'],
                'description' =>  isset($input['description']) ? $input['description'] : null,
                'url_video' => isset($input['url_video']) ? $input['url_video'] : null,
                'instructor_id' => isset($input['instructor_id']) ? $input['instructor_id'] : null,
                'course_id' => isset($input['course_id']) ? $input['course_id'] : null,
            ]);
            return response()->json([
                'session' => $session,
                'msj' => 'Registro de session exitosa',
                'status' => true 
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

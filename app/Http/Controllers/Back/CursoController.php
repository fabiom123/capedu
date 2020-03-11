<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Carbon\Carbon;
use Auth;
use Storage;

class CursoController extends Controller {

    public function show_courses(){
        $instructor_id = Auth::guard('instructor')->user()->id; 
        $courses = Course::get_courses();
        return view ('instructor.courses.lista', [
            'instructor_id'    =>    $instructor_id,
            'courses'    =>    $courses,
        ]);  
    }
    public function show_form_courses(){
        $instructor_id = Auth::guard('instructor')->user()->id; 
        return view ('instructor.courses.form', [
            'instructor_id'    =>    $instructor_id,
        ]); 
    }
    public function store_curso(Request $request){
        $input = $request->all();
        $now = Carbon::now(); 
        //dd($input);exit;}
        /* upload files */
        if ($request->hasFile('url_image')){
            $filename = $request->file('url_image')->getClientOriginalName();
            $file = file_get_contents($request->file('url_image')->getRealPath());
            Storage::disk('cursos')->put($filename, $file);
            $input['url_image'] = $filename;
        }
        /*insert data */
        try {
            Course::create([
                'name' => $input['name'],
                'description' =>  isset($input['description']) ? $input['description'] : null,
                'url_image' => isset($input['url_image']) ? $input['url_image'] : null,
                'url_video' => isset($input['url_video']) ? $input['url_video'] : null,
                'category' => isset($input['category']) ? $input['category'] : null,
                'duration' => isset($input['duration']) ? $input['duration'] : null,
                'start_date' => isset($input['start_date']) ? $input['start_date'] : null,
                'end_date' => isset($input['end_date']) ? $input['end_date'] : null,
                'type' => 2,
                'instructor_id' => $input['instructor_id'],
                'periodo' => $now->year,
                'state' => 1
            ]);
            return response()->json([
                'msj' => 'Registro de curso exitoso',
                'status' => true 
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
   
    public function find_course($id){
       $instructor_id = Auth::guard('instructor')->user()->id;
       $course = Course::find($id);
       $distinct_courses = Course::get_distinct_course();
       $lessons = Course::get_lessons($id);
       //var_dump($lessons);exit;
       return view ('instructor.courses.form', [
        'instructor_id'    =>    $instructor_id,
        'course'           =>    $course,  
        'lessons'          =>   $lessons, 
        'distinct_courses' =>    $distinct_courses,
       ]);
    }
    public function update_curso(Request $request){
        $input = $request->all();
        $now = Carbon::now();
        if ($request->hasFile('url_image')){
            $filename = $request->file('url_image')->getClientOriginalName();
            $file = file_get_contents($request->file('url_image')->getRealPath());
            Storage::disk('cursos')->put($filename, $file);
            $input['url_image'] = $filename;
        }
        try {
            $courses = Course::find($input['id']);
            $courses->name = $input['name'];
            $courses->description =  isset($input['description']) ? $input['description'] : null;
            $courses->url_image = isset($input['url_image']) ? $input['url_image'] : null;
            $courses->url_video = isset($input['url_video']) ? $input['url_video'] : null;
            $courses->category = isset($input['category']) ? $input['category'] : null;
            $courses->duration = isset($input['duration']) ? $input['duration'] : null;
            $courses->start_date = isset($input['start_date']) ? $input['start_date'] : null;
            $courses->end_date = isset($input['end_date']) ? $input['end_date'] : null;
            $courses->type = 2;
            $courses->instructor_id = $input['instructor_id'];
            $courses->periodo = $now->year;
            $courses->state = 1;
            $courses->save();
            return response()->json([
                'msj' => 'Actulizacion de curso exitosa',
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

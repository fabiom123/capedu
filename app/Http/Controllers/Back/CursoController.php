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
        return view ('instructor.courses.lista.', [
            'courses'    =>    $courses,
        ]); 
    }
    public function show_form_courses(){
        $user = Auth::id();
        $courses = Course::get_courses();
        return view ('instructor.courses.form', [
            'courses'    =>    $courses,
        ]); 
    }
    public function store_curso(Request $request){
        $input = $request->all(); 
        dd($input);exit;
        try {
            $id_con = DB::table('postulacion')->insert([
                'id' => $input['id'],
                'id_conv' => $input['id_conv'],
                'estado_postu' => 1
            ]);
            return response()->json([
                'idconv' =>$input['id_conv'],
                'status' => true 
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'idconv' =>$input['id_conv'],
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

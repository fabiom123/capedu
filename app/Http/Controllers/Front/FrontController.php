<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Auth;
class FrontController extends Controller {
    public function index(Request $request){
        $id = Auth::id();
        return view ('student.dashboard', [
            'id'      =>    $id,
        ]);
    }
    public function course(Request $request){
        $id = Auth::id();
        return view ('student.course', [
            'id'      =>    $id,
        ]);
    }
}

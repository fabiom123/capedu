<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

Route::get('/login/instructor', 'Auth\LoginController@showInstructorLoginForm');
Route::get('/register/instructor', 'Auth\RegisterController@showInstructorRegisterForm');
Route::post('/login/instructor', 'Auth\LoginController@InstructorLogin');
Route::post('/register/instructor', 'Auth\RegisterController@registerInstructor');

Route::group(['guard' => 'web'], function () {
    Route::get('/resumen','Front\FrontController@index');
    Route::get('/curso','Front\FrontController@course');
});

Route::group([ 'middleware' => 'instructor' ], function () {
    Route::view('/instructor', 'instructor/home');
    Route::get('/cursos','Back\CursoController@show_courses');
    Route::get('/cursos/crear','Back\CursoController@show_form_courses');
    Route::post('/cursos/store', 'Back\CursoController@store_curso'); 
    Route::get('/cursos/{id}', 'Back\CursoController@find_course');
    Route::post('/cursos/update', 'Back\CursoController@update_curso');
    Route::post('/lesson/store', 'Back\SessionController@store_lesson'); 
    Route::post('/session/store', 'Back\SessionController@store_session');
    Route::post('/session/update', 'Back\SessionController@update_session');
    Route::post('/session/show', 'Back\SessionController@show_session');  
}); 

Route::group([ 'middleware' => 'admin' ], function () {
    Route::view('/admin', 'admin/home');
});

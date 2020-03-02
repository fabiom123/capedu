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
});

Route::group([ 'middleware' => 'admin' ], function () {
    Route::view('/admin', 'admin/home');
});

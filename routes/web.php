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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => "auth"], function() {
// -------------------------- LECTURES -------------------------------//
// Route::resource("lectures");
Route::get("/lectures", "LecturesController@index")->name('lectures.index');
Route::get("/lectures/{id}", "LecturesController@show")->name('lectures.show');
Route::get("/lecture/create", "LecturesController@create")->name('lectures.create');
Route::get("/lectures/edit/{id}", "LecturesController@edit")->name('lectures.edit');
Route::post("/lectures/store", "LecturesController@store")->name("lectures.store");
Route::post("/lectures/update/{id}", "LecturesController@update")->name("lectures.update");
Route::post("/lectures/destroy/{id}", "LecturesController@destroy")->name("lectures.destroy");
// -----------------------end of LECTURES -------------------------------//
// -------------------------- LECTURES -------------------------------//
Route::get("/students", "StudentsController@index")->name('students.index');
Route::get("/students/{id}", "StudentsController@show")->name('students.show');
Route::get("/student/create", "StudentsController@create")->name('students.create');
Route::get("/students/edit/{id}", "StudentsController@edit")->name('students.edit');
Route::post("/students/store", "StudentsController@store")->name("students.store");
Route::post("/students/update/{id}", "StudentsController@update")->name("students.update");
Route::post("/students/destroy/{id}", "StudentsController@destroy")->name("students.destroy");
// -----------------------end of LECTURES -------------------------------//
// --------------------------- GRADES -------------------------------//
Route::get("/grades", "GradesController@index")->name('grades.index');
// Route::get("/grades/{id}", "GradesController@show")->name('grades.show');
Route::get("/grade/create", "GradesController@create")->name('grades.create');
Route::get("/grades/edit/{id}", "GradesController@edit")->name('grades.edit');
Route::post("/grades/store", "GradesController@store")->name("grades.store");
Route::post("/grades/update/{id}", "GradesController@update")->name("grades.update");
Route::post("/grades/destroy/{id}", "GradesController@destroy")->name("grades.destroy");
// -----------------------end of GRADES -------------------------------//
});

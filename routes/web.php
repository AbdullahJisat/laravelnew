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
Route::resource('Department', 'DepartmentController');
Route::resource('Course', 'CourseController'); 
Route::resource('Student','StudentController');
Route::resource('CourseAssign','CourseAssignController');

Route::get('CourseAssign/create','CourseAssignController@create');
Route::get('CourseAssign/getCourseByDepartmentId/{id}','CourseAssignController@getCourseByDepartmentId');
Route::get('CourseAssign/getStudentByDepartmentId/{id}','CourseAssignController@getStudentByDepartmentId');

<?php


Route::get('/', function () {
    return view('welcome');
});

/////////////////// DEPARTMENT ROUTES /////////////////////
Route::group(['prefix' => 'department'], function() {
    Route::get('/','DepartmentController@index')->name('department.index');
    Route::get('create','DepartmentController@create')->name('department.create');
    Route::post('store','DepartmentController@store')->name('department.store');
    Route::delete('destroy/{id}','DepartmentController@destroy')->name('department.destroy');
    Route::put('update/{id}','DepartmentController@update')->name('department.update');
    Route::get('edit/{id}','DepartmentController@destroy')->name('department.edit');
});


/////////////////// COURSE ROUTES /////////////////////
Route::group(['prefix' => 'course'], function() {
    Route::get('/','CourseController@index')->name('course.index');
    Route::get('create','CourseController@create')->name('course.create');
    Route::post('store','CourseController@store')->name('course.store');
    Route::delete('destroy/{id}','CourseController@destroy')->name('course.destroy');
    Route::put('update/{id}','CourseController@update')->name('course.update');
    Route::get('edit/{id}','CourseController@destroy')->name('course.edit');
});

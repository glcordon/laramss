<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/app', function () {
    return view('mentor_welcome');
});
Route::get('/add-course', function(){
    return view('course.create');
})->name('add-course');

Route::post('/add-course', 'CourseController@create')->name('create-course');
Route::get('/list', 'CourseController@list')->name('create-list');

Route::get('/course/{course}/course', 'CourseController@show')->name('show-course');
Route::get('/course/{course}/delete', 'CourseController@delete')->name('delete-course');
Route::get('/course/{course}/edit', 'CourseController@edit')->name('edit-course');

Route::get('/course/{course}/lesson/{lesson}', 'LessonController@show')->name('show-lesson');
Route::post('/add-lesson', 'LessonController@add')->name('create-lesson');

//lesson CRUD
Route::get('/lesson/{lesson}/delete', 'LessonController@destroy')->name('delete-lesson');


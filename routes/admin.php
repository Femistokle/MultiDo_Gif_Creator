<?php

use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {
    Route::get('login', 'Admin\AdminAuthController@getLogin')->name('login');
    Route::post('login', 'Admin\AdminAuthController@postLogin')->name('login.post');
    Route::get('logout', 'Admin\AdminAuthController@logout')->name('logout');

    Route::middleware('adminauth')->group(function () {
        Route::prefix('departments')->name('departments.')->group(function (){
            Route::get('all', 'Admin\DepartmentController@departments')->name('all');
            Route::get('new', 'Admin\DepartmentController@new')->name('new');
            Route::post('new', 'Admin\DepartmentController@newStore')->name('new');
            Route::get('{department}', 'Admin\DepartmentController@department')->name('department');
            Route::get('{department}/edit', 'Admin\DepartmentController@edit')->name('edit');
            Route::post('{department}/edit', 'Admin\DepartmentController@update')->name('edit');
            Route::get('{department}/delete', 'Admin\DepartmentController@delete')->name('delete');
        });
        Route::prefix('teachers')->name('teachers.')->group(function (){
            Route::get('all', 'Admin\TeacherController@teachers')->name('all');
            Route::get('new', 'Admin\TeacherController@new')->name('new');
            Route::post('new', 'Admin\TeacherController@newStore')->name('new');
            Route::get('{teacher}', 'Admin\TeacherController@teacher')->name('teacher');
            Route::get('{teacher}/edit', 'Admin\TeacherController@edit')->name('edit');
            Route::post('{teacher}/edit', 'Admin\TeacherController@update')->name('edit');
            Route::get('{teacher}/delete', 'Admin\TeacherController@delete')->name('delete');
        });
        Route::prefix('groups')->name('groups.')->group(function (){
            Route::get('all', 'Admin\GroupController@groups')->name('all');
            Route::get('new', 'Admin\GroupController@new')->name('new');
            Route::post('new', 'Admin\GroupController@newStore')->name('new');
            Route::get('{group}', 'Admin\GroupController@group')->name('group');
            Route::get('calendar', 'Admin\GroupController@calendar')->name('calendar');
            Route::get('{group}/profile', 'Admin\GroupController@profile')->name('profile');
            Route::get('{group}/edit', 'Admin\GroupController@edit')->name('edit');
            Route::post('{group}/edit', 'Admin\GroupController@update')->name('edit');
            Route::get('{group}/delete', 'Admin\GroupController@delete')->name('delete');
        });

        Route::prefix('rooms')->name('rooms.')->group(function (){
            Route::get('all', 'Admin\RoomController@rooms')->name('all');
            Route::get('new', 'Admin\RoomController@new')->name('new');
            Route::post('new', 'Admin\RoomController@newStore')->name('new');
            Route::get('{room}', 'Admin\RoomController@room')->name('room');
            Route::get('{room}/edit', 'Admin\RoomController@edit')->name('edit');
            Route::post('{room}/edit', 'Admin\RoomController@update')->name('edit');
            Route::get('{room}/delete', 'Admin\RoomController@delete')->name('delete');
        });
        Route::prefix('students')->name('students.')->group(function (){
            Route::get('all', 'Admin\StudentController@students')->name('all');
            Route::get('new', 'Admin\StudentController@new')->name('new');
            Route::post('new', 'Admin\StudentController@newStore')->name('new');
            Route::get('{student}', 'Admin\StudentController@student')->name('student');
            Route::get('{student}/edit', 'Admin\StudentController@edit')->name('edit');
            Route::post('{student}/edit', 'Admin\StudentController@update')->name('edit');
            Route::get('{student}/delete', 'Admin\StudentController@delete')->name('delete');
        });
        Route::prefix('courses')->name('courses.')->group(function (){
            Route::get('all', 'Admin\CourseController@courses')->name('all');
            Route::get('new', 'Admin\CourseController@new')->name('new');
            Route::post('new', 'Admin\CourseController@newStore')->name('new');
            Route::get('{course}', 'Admin\CourseController@course')->name('course');
            Route::get('{course}/edit', 'Admin\CourseController@edit')->name('edit');
            Route::post('{course}/edit', 'Admin\CourseController@update')->name('edit');
            Route::get('{course}/delete', 'Admin\CourseController@delete')->name('delete');
        });
        Route::prefix('lessons')->name('lessons.')->group(function (){
//            Route::get('all', 'Admin\LessonController@lessons')->name('all');
            Route::get('{course}/new', 'Admin\LessonController@new')->name('new');
            Route::post('{course}/new', 'Admin\LessonController@newStore')->name('new');
            Route::get('{lesson}', 'Admin\LessonController@lesson')->name('lesson');
        });

    });
});


<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'ExcelsController@home'
]); 

Route::group(['prefix'=>'excel'], function() {

    Route::get('/upload', [
        'as' => 'excel.upload',
        'uses' => 'ExcelsController@upload'
    ]); 

    Route::post('/upload', [
        'as' => 'excel.post.upload',
        'uses' => 'ExcelsController@postUploadCsv'
    ]); 

    Route::get('/check-attendance', [
        'as' => 'check.attendance',
        'uses' => 'ExcelsController@checkAttendance'
    ]); 

    Route::get('/view/{employeeId}/{month}/{year}', [
        'as' => 'view.attendance',
        'uses' => 'ExcelsController@viewAttendance'
    ]); 
});
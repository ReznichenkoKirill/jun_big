<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', 'Tasks\TasksController@index')
        ->name('tasks.index'); // это вызовет TasksController action index

    Route::get('/create', 'Tasks\TasksController@create')
        ->name('tasks.create');

    Route::get('/{lang}', 'Tasks\TasksController@choiseLanguage')
    ->name('tasks.choiseLanguage');

    Route::post('/', 'Tasks\TasksController@add')
        ->name('tasks.add');

    Route::delete('/{task}', 'Tasks\TasksController@delete')->name('tasks.delete');

});

Route::auth();


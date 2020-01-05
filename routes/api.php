<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('TodoList')->group(function () {
    Route::get('todo-list', 'TodoListIndex')->name('todo.index');
    Route::get('todo-list/{todoList}', 'TodoListShow')->name('todo.show');

    Route::post('todo-list', 'TodoListStore')->name('todo.store');
    Route::patch('todo-list/{todoList}', 'TodoListUpdate')->name('todo.update');
    Route::delete('todo-list/{todoList}', 'TodoListDestroy')->name('todo.destroy');

    Route::delete('todo-list', 'TodoListDestroyAll')->name('todo.destroy.all');
});

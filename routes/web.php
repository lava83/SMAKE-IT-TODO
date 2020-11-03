<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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

Auth::routes();

Route::get('/', function () {
    return redirect(route('todos.index'));
});


Route::middleware('auth')->group(function(){
    Route::get('todos/filter', 'TodosController@filter')->name('todos.filter');
    Route::post('todos/{todo}/checked', 'TodosController@checked')->name('todos.checked');
    Route::resource('todos', 'TodosController');
});


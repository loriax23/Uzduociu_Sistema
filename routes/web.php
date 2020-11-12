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

Route::get('/', 'App\Http\Controllers\PageController@showIndexPage');

Route::group(['middleware' => ['auth', 'AdministratorPages']], function() {

    Route::get('/sukurdi-uzduoti', 'App\Http\Controllers\PageController@showCreateTaskPage')->name('create-task-page');

    Route::get('/visos-uzduotys', 'App\Http\Controllers\PageController@showAllTasksPage')->name('all-tasks-page');

    Route::get('/redaguoti-uzduoti/{id}', 'App\Http\Controllers\PageController@showEditTaskPage')->name('edit-task-page');

    Route::get('/visos-atliktos-uzduotys', 'App\Http\Controllers\PageController@showAllCompletedTasksPage')->name('all-completed-tasks-page');



    Route::get('/create-task/{id}', 'App\Http\Controllers\AdministratorController@deleteTaskAction')->name('delete-task-action');

    Route::post('/edit-task/{id}', 'App\Http\Controllers\AdministratorController@editTaskAction')->name('edit-task-action');

    Route::post('/create-task', 'App\Http\Controllers\AdministratorController@createTaskAction')->name('create-task-action');

});

Route::group(['middleware' => ['auth', 'UserPages']], function() {

    Route::get('/mano-uzduotys', 'App\Http\Controllers\PageController@showAllMyTasksPage')->name('my-tasks-page');

    Route::get('/mano-atliktos-uzduotys', 'App\Http\Controllers\PageController@showMyCompletedTasksPage')->name('my-completed-tasks-page');



    Route::get('/complete-task/{id}', 'App\Http\Controllers\UserController@completeTaskAction')->name('complete-task-action');

});


Route::get('/prisijungti', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');

Route::post('/prisijungti', 'App\Http\Controllers\Auth\LoginController@login');

Route::post('/atsijunti', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/registruotis', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');

Route::post('/registruotis', 'App\Http\Controllers\Auth\RegisterController@register');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

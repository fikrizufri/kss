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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');

    //ACL -- Access Control List
    Route::resource('user', 'UserController');
    Route::resource('role', 'RoleController');
    Route::resource('task', 'TaskController');

    //Master Data
    Route::resource('department', 'DepartmentController');
    Route::resource('job', 'JobController');

    Route::get('/Edituser', 'UserController@ubah')->name('user.ubah');
    Route::put('/simpanuser', 'UserController@simpan')->name('user.simpan');
});

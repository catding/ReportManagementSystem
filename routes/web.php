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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::resource('reports', 'ReportController')->middleware('auth');
Route::resource('groups', 'GroupController')->middleware('auth');
Route::resource('users', 'UserController')->middleware('auth');


// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/reports', 'AdminPanelController@getReports')->name('reports');
    Route::get('/groups', 'AdminPanelController@getGroups')->name('groups');
    Route::get('/users', 'AdminPanelController@getUsers')->name('users');
    Route::get('/reports/search', 'AdminPanelController@search')->name('reports.search');

});

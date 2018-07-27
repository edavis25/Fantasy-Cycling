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

/**
 * Admin Routes
 */
Route::group([
    'as'         => 'admin.',
    'middleware' => ['auth', 'admin'],
    'namespace'  => 'Admin',
    'prefix'     => 'admin'
], function() {
    Route::resource('/', 'DashboardController', ['as' => 'dashboard'])->only('index');
    Route::resource('races', 'RaceController');
    Route::resource('teams', 'TeamController');
    Route::resource('riders', 'RiderController');

    Route::group([
        'as' => 'race.'
    ], function() {
        Route::resource('{race}/stages', 'StageController');
        //Route::resource('{slug}/{year}/stages', 'StageController');
        //Route::resource('{slug}/{year}/teams', 'RaceTeamController');
        //Route::resource('{slug}/{year}/stages', 'RaceRiderController');
    });
});

/**
 * Web Routes
 */
Route::group([
    'as'         => 'web.',
    'middleware' => ['auth'],
    'namespace'  => 'Web'
], function() {
    // Routes Here
});

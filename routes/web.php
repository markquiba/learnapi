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

Route::group(['prefix' => 'api/v1'], function() {
	Route::get('/', function() {
		return Response::json([
            'data' => [
            	'message' => 'Welcome to my app!'
            ]
        ], 200);
	});
	Route::resource('lessons', 'LessonsController');
});

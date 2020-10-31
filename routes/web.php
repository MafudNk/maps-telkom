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

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('/createuser', function () {
//     return view('User.create');
// });

//  Route::get('/user', function () {
//     return view('User.index');
//  });

//  Route::get('/updateuser', function () {
//     return view('User.update');
//  });

//  Route::get('/login', function () {
//     return view('login');
//  });


	// route::get('/map',function() {
 // 		return view('map');


Route::get('/maps','MyController@maps');

 route::get('/odp/import','OdpController@importExcel');

 Route::get('/login','MyController@login');
 Route::get('logout','MyController@logout');
 Route::post('/login',['as' => 'login','uses' =>'MyController@doLogin']);

 Route::get('/','MyController@check');


 Route::group(['prefix' => '/','middleware' => 'auth'], function(){
 	route::get('/dashboard','MyController@dashboard');
 	route::resource('/user', 'UserController');
 	route::resource('/odp','OdpController');
 	route::post('/odp/import','OdpController@importExcel');
 	Route::get('/map','MapController@index');
 });


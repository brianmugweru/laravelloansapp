<?php
Route::get('/', function () {
    return view('welcome');
});


Route::get('signup', function(){
  return view('signup');
});

Route::get('login', ['as'=>'login', 'uses'=>'AuthController@create']);
Route::post('auth/login', ['as'=>'auth.login', 'uses'=>'AuthController@authenticate']);
Route::post('user/signup', ['as'=>'user.register', 'uses'=>'AuthController@register']);
Route::get('logout', ['as'=>'logout', 'uses'=>'AuthController@logout']);
Route::resource('loans', 'LoansController');
Route::resource('savings', 'SavingsController');

Route::get('dashboard',['as'=>'user.dashboard', 'uses'=>'AuthController@dashboard']);

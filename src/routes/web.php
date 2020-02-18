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

// STEP 2-3
Route::get('/user', 'UserController@index');
Route::get('/user/show', 'UserController@show');
Route::get('/user/delete/{email}', 'UserController@delete');


// STEP 2-4
Route::get('/bbs', 'BbsController@index');
Route::post('/bbs', 'BbsController@create');

// STEP 2-5
Route::get('github', 'Github\GithubController@top');
Route::post('github/issue', 'Github\GithubController@createIssue');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

// STEP 2-6
Route::post('user', 'User\UserController@updateUser');

<?php

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

Route::get('/', function () {
    return view('main');
});

// Route::get('/profile', function () 
// {
//     return view('layout.profile');
// });


Route::get('/master', function () {
    return view('master');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes([
    'register'=> false,
    'reset'=>false
]);

Route::get('/home', 'HomeController@index')->name('home');

//user

Route::get('/user', 'UserController@index');

Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user','UserController@store')->name('user.store');
Route::post('/user/delete/{id}','UserController@destroy')->name('user.destroy');
Route::post('/user/edit/{id}','UserController@edit')->name('user.edit');
Route::post('/user/update/{id}','UserController@update')->name('user.update');

//profile
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::post('/profile/edit/{id}','ProfileController@edit')->name('profile.edit');
Route::post('/profile/update/{id}','ProfileController@update')->name('profile.update');


//Register
Route::get('/main/create', 'RegisterController@create')->name('register.create');
Route::post('/main','RegisterController@store')->name('register.store');


//Forum
Route::get('/diskusi', 'ForumController@index')->name('diskusi');

Route::post('/forum/create','ForumController@store')->name('forum.store');
Route::get('/forum/{forum}','ForumController@detail')->name('forum.detail');

//komentar
Route::post('/forum/create/detail{id}','ForumController@storeComment')->name('komentar.store');
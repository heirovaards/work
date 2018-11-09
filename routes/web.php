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


Route::get('/test', function(){return view('pages.home');})->name('home');

//auth routes
Route::get('/', 'AuthController@getLogin')->name('pages.login');
Route::post('/login', 'AuthController@postLogin')->name('post.login');
//Route::get('/signup', 'AuthController@getRegister')->name('pages.signup');
//Route::post('/signup', 'AuthController@postRegister')->name('post.register');
//auth routes end

//route profile
Route::get('/profile', function(){return view('pages.index');})->name('pages.profile');
//route profile end

//route user
Route::get('/user', 'UserController@showUser')->name('user.table');
Route::get('/user/create', 'Usercontroller@addUserForm')->name('user.add')->middleware('role:admin');
Route::post('/user/post', 'Usercontroller@adduser')->name('user.post')->middleware('role:admin');
Route::post('/user/{user}/edit', 'UserController@editUser')->name('user.edit')->middleware('role:admin');
Route::post('/user/update', 'UserController@updateUser')->name('user.update')->middleware('role:admin');
Route::post('/user/{user}/view', 'UserController@viewUser')->name('user.view');
Route::post('/user/{user}/delete', 'UserController@deleteUser')->name('user.delete')->middleware('role:admin');
//route user end

//route role
Route::get('/role', 'RoleController@showRole')->name('role.table');
Route::get('/role/create', 'RoleController@addRoleForm')->name('role.add')->middleware('role:admin');
Route::post('/role/post', 'RoleController@addRole')->name('role.post')->middleware('role:admin');
Route::post('/role/{role}/edit', 'RoleController@editRole')->name('role.edit')->middleware('role:admin');
Route::post('/role/update', 'RoleController@updateRole')->name('role.update')->middleware('role:admin');
Route::post('/role/{role}/delete', 'RoleController@deleteRole')->name('role.delete')->middleware('role:admin');


//route logout
Route::get('/logout', 'AuthController@logout')->name('logout');
//auth logout end

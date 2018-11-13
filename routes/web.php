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
Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/', 'UserController@showUser')->name('user.table');
    Route::get('/create', 'Usercontroller@addUserForm')->name('user.add')->middleware('role:admin');
    Route::post('/post', 'Usercontroller@adduser')->name('user.post')->middleware('role:admin');
    Route::post('/{user}/edit', 'UserController@editUser')->name('user.edit')->middleware('role:admin');
    Route::post('/update', 'UserController@updateUser')->name('user.update')->middleware('role:admin');
    Route::post('/{user}/view', 'UserController@viewUser')->name('user.view');
    Route::post('/{user}/delete', 'UserController@deleteUser')->name('user.delete')->middleware('role:admin');
});
//route user end

//route role
Route::prefix('role')->middleware('auth')->group(function(){
    Route::get('/', 'RoleController@showRole')->name('role.table');
    Route::get('/create', 'RoleController@addRoleForm')->name('role.add')->middleware('role:admin');
    Route::post('/post', 'RoleController@addRole')->name('role.post')->middleware('role:admin');
    Route::get('/{role}/edit', 'RoleController@editRole')->name('role.edit')->middleware('role:admin');
    Route::post('/update', 'RoleController@updateRole')->name('role.update')->middleware('role:admin');
    Route::post('/{role}/delete', 'RoleController@deleteRole')->name('role.delete')->middleware('role:admin');
});
//route role end

//tansaction route
Route::get('/transaction', 'TransactionController@showTransaction')->name('transaction.table');
Route::post('/transaction/search', 'TransactionController@searchTransaaction')->name('transaction.search');
Route::get('/transaction/chart', 'TransactionController@chartTransaction')->name('transaction.chart');


//route logout
Route::get('/logout', 'AuthController@logout')->name('logout');
//auth logout end

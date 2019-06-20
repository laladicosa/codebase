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


Route::get('/', [
    'uses'=>'Client\MainController@show_main_page',
    'as'=>'frontend.main'
]);


Auth::routes(['verify'=>true]);

Route::get('/signin', 'Client\AuthController@login')->name('signin');
Route::get('/signup', 'Client\AuthController@register')->name('signup');
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/nha-dat', [
	'uses'=>'Client\Properties\HousesController@index',
	'as'=>'nha.dat'
])->middleware('verified');

Route::get('/bat-dong-san-nha-dat', 'Client\Nosignin\ListingsController@index')->name('main.nhadat');
Route::get('/nha-dat/{id}/{slug}', 'Client\Nosignin\ListingsController@details')->name('main.nhadat.details');
Route::get('/tim-kiem-nha-dat', 'Client\Nosignin\SearchController@search')->name('tim-kiem-nha-dat');

Route::post('/dang-nha/process', 'Client\Properties\HousesController@store')->name('dang-nha.process')->middleware('verified');
Route::post('/sua-nha/process/{id}/{slug}', 'Client\Properties\HousesController@update')->name('sua-nha.process')->middleware('verified');
Route::get('/danh-sach-nha', 'Client\Properties\HousesController@list')->name('danh-sach-nha.list')->middleware('verified');
Route::get('/thong-tin-nha/{id}/{slug}', 'Client\Properties\HousesController@info')->name('thong-tin-nha.info')->middleware('verified');
Route::get('/location/change', 'Client\Properties\HousesController@location_change')->name('location.change');
Route::get('/tien-ich/{id}', 'Client\Properties\FeaturesController@feature')->name('tien-ich.feature')->middleware('verified');
Route::post('/tien-ich/process', 'Client\Properties\FeaturesController@store')->name('tien-ich.process')->middleware('verified');
Route::get('/sua-tien-ich/{id}', 'Client\Properties\FeaturesController@edit')->name('sua-tien-ich.edit')->middleware('verified');
Route::post('/sua-tien-ich/process/{id}', 'Client\Properties\FeaturesController@update')->name('sua-tien-ich.update')->middleware('verified');



Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('/', function(){
        return view('backend.dashboard');
    })->middleware('verified');

    Route::get('/users', 'Admin\UsersController@index')->name('users')->middleware('verified');
    Route::get('/users/look-up', 'Admin\UsersController@search')->name('users.search')->middleware('verified');

    Route::get('/roles', 'Admin\RolesController@index')->name('roles')->middleware('verified');
    Route::get('/houses', 'Admin\HousesController@all_houses')->name('all_houses')->middleware('verified');
    Route::post('/xoa-nha/{id}', 'Admin\HousesController@trash')->name('xoa-nha.trash')->middleware('verified');
    Route::get('/houses/trashed', 'Admin\HousesController@all_trashed')->name('only_trashed')->middleware('verified');
    Route::get('/houses/trashed/restore/{id}', 'Admin\HousesController@restore_house')->name('nha.restore')->middleware('verified');
});


// FACEBOOK
Route::get('login/facebook', 'Auth\LoginController@redirectToProviderFacebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallbackFacebook');

// GOOGLE
Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');

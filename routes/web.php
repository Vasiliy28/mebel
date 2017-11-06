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

Route::get('/', "HomeController@index")->name("home");
Route::get('our_work/{type}', "OurWorkController@index")->name("our_work")->where('type', '[A-Za-z]+');
Route::get('material/{material}', "MaterialController@index")->name("material")->where('material', '[A-Za-z\_]+');

Route::prefix('admin')->group(function () {
  Route::get('/', "AdminPanelController@index")->name("admin");
  Route::get('our_work', "OurWorkController@create")->name('create_our_work');
});
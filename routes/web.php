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
Route::get('works/{type}', "WorksController@show")->name("works")->where('type', '[A-Za-z\_-]+');
Route::get('materials/{material}', "MaterialsController@show")->name("materials")->where('material', '[A-Za-z\_-]+');



Route::prefix('admin')->group(function () {
  Route::get('/', "AdminController@index")->name("admin");
  Route::resource('works','WorksController');
  Route::resource('materials','MaterialsController');
  Route::resource('examples','ExamplesController');
});

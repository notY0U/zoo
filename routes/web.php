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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//SPECIES
Route::group(['prefix' => 'species'], function(){
    Route::get('', 'SpecieController@index')->name('specie.index');
    Route::get('create', 'SpecieController@create')->name('specie.create');
    Route::post('store', 'SpecieController@store')->name('specie.store');
    Route::get('edit/{specie}', 'SpecieController@edit')->name('specie.edit');
    Route::post('update/{specie}', 'SpecieController@update')->name('specie.update');
    Route::post('delete/{specie}', 'SpecieController@destroy')->name('specie.destroy');
    Route::get('show/{specie}', 'SpecieController@show')->name('specie.show');
});

//MANAGERS
Route::group(['prefix' => 'managers'], function(){
    Route::get('', 'ManagerController@index')->name('manager.index');
    Route::get('create', 'ManagerController@create')->name('manager.create');
    Route::post('store', 'ManagerController@store')->name('manager.store');
    Route::get('edit/{manager}', 'ManagerController@edit')->name('manager.edit');
    Route::post('update/{manager}', 'ManagerController@update')->name('manager.update');
    Route::post('delete/{manager}', 'ManagerController@destroy')->name('manager.destroy');
    Route::get('show/{manager}', 'ManagerController@show')->name('manager.show');
    Route::get('pdf/{manager}', 'ManagerController@pdf')->name('manager.pdf');
 });
 
 //ANIMALS
 Route::group(['prefix' => 'animals'], function(){
     Route::get('', 'AnimalController@index')->name('animal.index');
     Route::get('create', 'AnimalController@create')->name('animal.create');
     Route::post('store', 'AnimalController@store')->name('animal.store');
     Route::get('edit/{animal}', 'AnimalController@edit')->name('animal.edit');
     Route::post('update/{animal}', 'AnimalController@update')->name('animal.update');
     Route::post('delete/{animal}', 'AnimalController@destroy')->name('animal.destroy');
     Route::get('show/{animal}', 'AnimalController@show')->name('animal.show');
  });
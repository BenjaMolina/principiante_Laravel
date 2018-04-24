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

//Usando controladores
Route::get('/', 'PagesController@home')->name('home');

Route::get('contactos', 'PagesController@contactos')->name('contactos');

Route::post('contacto', 'PagesController@mensaje');

Route::get('saludos/{nombre?}', 'PagesController@saludos')->name('saludos')->where('nombre', "[A-Za-z]+");

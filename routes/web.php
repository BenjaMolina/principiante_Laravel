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
//Route::get('/', 'PagesController@home')->name('home')->middleware('example'); //Middleware

Route::get('/', 'PagesController@home')->name('home');

/*Route::get('contactos', 'PagesController@contactos')->name('contactos');

Route::post('contacto', 'PagesController@mensaje');

Route::get('contactame',[
    'as' => 'contactactamee', 
    'uses'=>'PagesController@contact'
    ]); //Otra forma de darle un Alias a un Controlador
*/

Route::get('saludos/{nombre?}', 'PagesController@saludos') //parametro opcional
                                ->name('saludos')
                                ->where('nombre', "[A-Za-z]+");


//USO de REST
/*Route::get('mensajes','MessagesController@index')->name('messages.index');
Route::get('mensajes/create','MessagesController@create')->name('messages.create');
Route::post('mensajes','MessagesController@store')->name('messages.store');
Route::get('mensajes/{id}','MessagesController@show')->name('messages.show');
Route::get('mensajes/{id}/edit','MessagesController@edit')->name('messages.edit');
Route::put('mensajes/{id}','MessagesController@update')->name('messages.update');
Route::delete('mensajes/{id}','MessagesController@destroy')->name('messages.destroy');*/




    //Ruta para crear un usuario de prueba

/*Route::get('test',function(){
    $user = new App\User;

    $user->name = 'Jorge2';
    $user->email = 'jorge2@gmail.com';
    $user->password = bcrypt('123123'); //Encriptamos la contraseña
    $user->role_id = '1';

    $user->save();

    return $user;

    $rol = new \App\Role;
    $rol->create([
        "nombre" => "admin",
        "description" => "",
        "display_name" => "Administrador del sitio"
    ]);
    $rol2 = new \App\Role;
    $rol2->create([
        "nombre" => "mod",
        "description" => "",
        "display_name" => "Moderador de comentarios"
    ]);

});*/



Route::get('roles', function(){
    return \App\Role::with('user')->get();
});

//Reduciendo las rutas a una sola linea
Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');


//Autenticacion

Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

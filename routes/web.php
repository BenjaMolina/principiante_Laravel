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
    return 'Hola desde la pagina de inicio';
});

Route::get('contacto', function () {
    return 'Hola desde la pagina de contaco';
});

//Rutas con pase de parametro necesario
Route::get('saludos/{nombre}', function ($nombre) {
    return "HOLA $nombre";
});

//Rutas con pase de parametro Opcionales
Route::get('saludos2/{nombre?}', function ($nombre = "Por defecto") {
    return "Hola $nombre";
});

//Rutas con pase de parametro Validados (En este caso no acepta numero)
Route::get('saludos3/{nombre?}', function ($nombre = "Por defecto") {
    return "Hola $nombre";
})->where('nombre', "[A-Za-z]+");


//Rutas con Alias
Route::get('rutas', function () {
    echo "<a href=" . route('contactos') . "> Contactanos </a><br>";
    echo "<a href=" . route('contactos') . "> Contactanos </a><br>";
    echo "<a href=" . route('contactos') . "> Contactanos </a><br>";
    echo "<a href=" . route('contactos') . "> Contactanos </a><br>";
});

// Route::get('contacto',['as' => 'contactos', function(){
//     return "Seccion de contactos";
// }]);

Route::get('contactooo', ['as' => 'contactos', function () {
    return "Seccion de contactos";
}]);

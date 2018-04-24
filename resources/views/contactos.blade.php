    @extends('layout')

    @section('content')
        <h1>CONTACTOS</h1>
        <h2>Escribenos</h2>
        <form action="contacto" method="post">
            <p><label for="nombre">
                Nombre:
                <input type="text" name="nombre">
            </label></p>
            <p><label for="email">
                Email:
                <input type="text" name="email">
            </label></p>
            <p><label for="mensaje">
                Mensaje:
                <textarea name="mensaje"></textarea>
            </label></p>
            <input type="submit" value="Enviar">
        </form>
        <hr>
        
    @stop
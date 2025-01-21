<?php

    $nombreServidor = "localhost";
    $nombreUsuario = "root"; 
    $contraseña = ""; 
    $baseDeDatos = "dbcomercio"; 

    $conexion = mysqli_connect($nombreServidor, $nombreUsuario, $contraseña, $baseDeDatos);

    if(!$conexion) {

        die("Error en la conexión: ". mysqli_connect_error());

    }


?>
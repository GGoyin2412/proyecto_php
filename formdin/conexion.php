<?php
    $host = 'localhost'; // Host de la base de datos
    $usuario = 'root'; // Nombre de usuario de la base de datos
    $contraseña = ''; // Contraseña de la base de datos
    $basededatos = 'incidencia'; // Nombre de la base de datos

    // Crear la conexión
    $conexion = new mysqli($host, $usuario, $contraseña, $basededatos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Establecer el juego de caracteres a UTF-8
    mysqli_set_charset($conexion, "utf8");

    // Si necesitas usar $conexion en otros archivos, puedes incluir este archivo donde lo necesites.
?>

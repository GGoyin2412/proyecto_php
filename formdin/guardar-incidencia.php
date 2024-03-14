<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////
$host = 'localhost';
$basededatos = 'incidencia';
$usuario = 'root';
$contraseña = '';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion->connect_error) {
    die( "Fallo la conexión : (" . $conexion->connect_error . ") " . $conexion->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id_nivel = $_POST['id_nivel'];
    $id_grado = $_POST['id_Grado'];
    $id_grupo = $_POST['id_Grupo'];
    $incidencia = $_POST['incidencia'];
    $id_nivelin = $_POST['id_nivelin'];
    $comentarios = $_POST['comentarios'];
    
    // Preparar la consulta para insertar los datos en la tabla
    $consulta = "INSERT INTO registro_incidencia (id_nivel, id_grado, id_grupo, incidencia, id_nivelin, comentarios) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Preparar la sentencia
    $stmt = $conexion->prepare($consulta);
    // Vincular los parámetros con los valores
    $stmt->bind_param("ssssss", $id_nivel, $id_grado, $id_grupo, $incidencia, $id_nivelin, $comentarios);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Los datos se insertaron correctamente.";
    } else {
        echo "Error al insertar los datos: " . $stmt->error;
    }
    
    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
} else {
    echo "No se recibieron datos del formulario.";
}
?>

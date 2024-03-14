<?php
   
require_once ("_db.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

        case 'eliminar_registro':
            eliminar_registro();
            break;

        case 'acceso_user':
            acceso_user();
            break;
    }
}

function editar_registro() {
    $Nom_Alu = $_POST['Nom_Alu'];
    $PA_Alu= $_POST['PA_Alu'];
    $SA_Alu = $_POST['SA_Alu'];
    $id_nivel = $_POST['id_nivel'];
    $id_Grupo  = $_POST['id_Grupo'];
    $id_grado = $_POST['id_grado'];
    $id = $_POST['id'];

    $conexion = mysqli_connect("localhost", "root", "", "incidencia");
    extract($_POST);
    $consulta = "UPDATE alumno SET  Nom_Alu = '$Nom_Alu', PA_Alu = '$PA_Alu',
                 SA_Alu = '$SA_Alu', id_nivel = '$id_nivel', id_Grupo = '$id_Grupo', id_grado = '$id_grado' WHERE id_Alu = '$id'";

    mysqli_query($conexion, $consulta);
    //echo $id;

    header('Location: ../views/user.php');
}

function eliminar_registro() {
    $conexion = mysqli_connect("localhost", "root", "", "incidencia");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM alumno WHERE id_Alu = $id";

    mysqli_query($conexion, $consulta);

    header('Location: ../views/user.php');
}

function acceso_user() {
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;

    $conexion = mysqli_connect("localhost", "root", "", "incidencia");
    $consulta = "SELECT * FROM usuarios WHERE nombre='$nombre' AND contrasena='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if ($filas['id_rol'] == 1) { //admin
        header('Location: ../views/user.php');
    } else if ($filas['id_rol'] == 2) { //lector
        header('Location: ../views/lector.php');
    } else {
        header('Location: login.php');
        session_destroy();
    }
}





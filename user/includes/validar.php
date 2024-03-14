<?php
      $conexion= mysqli_connect("localhost", "root", "", "incidencia");

      if(isset($_POST['registrar'])){

          if(strlen($_POST['nombre']) >=1 && strlen($_POST['correo']) >=1 
          && strlen($_POST['password'])  >=1 && strlen($_POST['id_rol']) >= 1 ){

          $nombre = trim($_POST['nombre']);
          $correo = trim($_POST['correo']);
          $contrasena = trim($_POST['password']);
          $id_rol = trim($_POST['id_rol']);

          $consulta= "INSERT INTO usuarios (nombre, correo, contrasena, id_rol)
          VALUES ('$nombre', '$correo','$contrasena', '$id_rol' )";

          mysqli_query($conexion, $consulta);
          mysqli_close($conexion);

          header('Location: ../views/user.php');
        }
      }
?>
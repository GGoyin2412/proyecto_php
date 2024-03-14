<?php
   
require_once ("_db.php");




if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros

            case 'acceso_user';
            acceso_user();
            break;


		}

	}


        function acceso_user() {
            $nombre=$_POST['nombre'];
            $password=$_POST['password'];
            session_start();
            $_SESSION['nombre']=$nombre;

            $conexion=mysqli_connect("localhost","root","","r_user");
            $consulta= "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
            $resultado=mysqli_query($conexion, $consulta);
            $filas=mysqli_fetch_array($resultado);


            if($filas['rol'] == 1){ //admin

                header('Location: ../views/user.php');

            }else if($filas['rol'] == 2){//lector
                header('Location: ../views/lector.php');
            }
            
            
            else{

                header('Location: login.php');
                session_destroy();

            }
        }









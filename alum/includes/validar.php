<?php
      $conexion= mysqli_connect("localhost", "root", "", "incidencia");

      if(isset($_POST['registrar'])){

          if(strlen($_POST['Nom_Alu']) >=1 && strlen($_POST['PA_Alu']) >=1 
          && strlen($_POST['SA_Alu'])  >=1 && strlen($_POST['id_nivel']) >= 1 && strlen($_POST['id_Grupo']) >= 1&& strlen($_POST['id_grado']) >= 1){

          $nom = trim($_POST['Nom_Alu']);
          $AP = trim($_POST['PA_Alu']);
          $SP = trim($_POST['SA_Alu']);
          $Niv = trim($_POST['id_nivel']);
          $Gru = trim($_POST['id_Grupo']);
          $Gra = trim($_POST['id_grado']);
         
          $consulta= "INSERT INTO alumno(Nom_Alu, PA_Alu, SA_Alu, id_nivel, id_Grupo, id_grado)
          VALUES ('$nom','$AP', '$SP', '$Niv', '$Gru', '$Gra')";

          mysqli_query($conexion, $consulta);
          mysqli_close($conexion);

          header('Location: ../views/user.php');
        }
      }
?>
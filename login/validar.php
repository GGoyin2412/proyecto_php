<?php
        include('db.php');
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        $consulta = "SELECT id_rol FROM usuarios WHERE correo='$correo' AND contrasena ='$contrasena'";
        $resultado = mysqli_query($conexion, $consulta);

        $filas = mysqli_num_rows($resultado);

        if ($filas) {
            $usuario = mysqli_fetch_assoc($resultado);
            $id_rol = $usuario['id_rol'];

            if ($id_rol == 1) {
                header("Location: home.php"); // Si el rol es 1 (admin), redirige a home.php
            } else if ($id_rol == 2) {
                header("Location: formulario.php"); // Si el rol es 2, redirige a formulario.php
            }
        } else {
            include("index.html");
            echo '<h1 class="bad">Usuario y contraseña acce incorrectos</h1>';
        }

        mysqli_free_result($resultado);
        mysqli_close($conexion);
?>
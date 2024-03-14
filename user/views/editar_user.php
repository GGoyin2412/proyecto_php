<?php


$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "incidencia");
$consulta = "SELECT * FROM usuarios WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);


$conexion = mysqli_connect("localhost", "root", "", "incidencia");
$rol = "SELECT * FROM usuarios INNER JOIN rol ON usuarios.id_rol = rol.id_rol";
$dato = mysqli_query($conexion, $rol);

?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>

    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">


</head>

<body id="page-top">
    <form action="../includes/_functions.php" method="POST">
    <form onsubmit="return validarContrasena()" action="index.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <h3 class="text-center">Editar usuario</h3>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="" value="<?php echo $usuario['correo']; ?>">
                            </div>

                            <div class="form-group">
                            <label for="password">Contraseña:</label><br>
                            <input type="password" name="contrasena" id="contrasena" class="form-control" value="<?php echo $usuario['contrasena']; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="confirm_password">Confirmar Contraseña:</label><br>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $usuario['contrasena']; ?>"required>
                            <div id="password_error" class="error"></div> <!-- Div para mostrar el mensaje de error -->
                            </div>

                            <div id="password_error" style="color: red; display: none;">Las contraseñas no coinciden.</div>


                            <div class="form-group">
                                <label for="rol" class="form-label">Rol de usuario</label>
                                <select type="select" id="rol" name="rol" class="form-control"  required>
                                    <option value="">Elije una opcion</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Docente</option>
                                </select>
                                
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>
                            <br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Editar</button>
                                <a href="user.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script>
    // Obtener referencias a los campos de contraseña y confirmar contraseña
    var password = document.getElementById("contrasena");
    var confirm_password = document.getElementById("confirm_password");
    var password_error = document.getElementById("password_error");

    // Función para validar si las contraseñas coinciden y tienen al menos 8 caracteres
    function validatePassword() {
        if (password.value.length < 8) {
            password.setCustomValidity("La contraseña debe tener al menos 8 caracteres");
            password_error.innerHTML = "La contraseña debe tener al menos 8 caracteres";
        } else if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Las contraseñas no coinciden");
            password_error.innerHTML = "Las contraseñas no coinciden";
        } else {
            password.setCustomValidity("");
            confirm_password.setCustomValidity("");
            password_error.innerHTML = "";
        }
    }

    // Agregar un listener de evento 'input' a los campos de contraseña y confirmar contraseña
    password.addEventListener("input", validatePassword);
    confirm_password.addEventListener("input", validatePassword);
</script>

</html>
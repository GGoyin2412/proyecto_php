
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

	<link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="css/styles.css">
    
    <script>
            function validarContrasena() {
                var contra1 = document.getElementById('password').value;
                var contra2 = document.getElementById('confirmar_password').value;

                if (password !== cofirmar_password) {
                    alert('Las contraseñas no coinciden');
                    return false;
                }

                return true;
            }
    </script>

</head>

<body id="page-top">
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Usuarios</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form  action="../includes/validar.php" method="POST">
                <form onsubmit="return validarContrasena()" action="index.php" method="POST">
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="correo"required>
                            </div>

                            <div class="form-group">
                            <label for="password">Contraseña:</label><br>
                            <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                            <label for="confirm_password">Confirmar Contraseña:</label><br>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                            <div id="password_error" class="error"></div> <!-- Div para mostrar el mensaje de error -->
                            </div>

                            <div id="password_error" style="color: red; display: none;">Las contraseñas no coinciden.</div>
                            <div class="form-group">
                                <label for="rol" class="form-label">Rol de usuario:</label>
                                <select id="id_rol" name="id_rol" class="form-control">
                                    <option value="1">Administrador</option>
                                    <option value="2">Docente</option>
                                </select>
                            </div>
       
                            <div class="mb-3">
                                    
                               <input type="submit" value="Guardar"class="btn btn-success" 
                               name="registrar">
                               <a href="user.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                        

                        </form>
               
</body>
<script>
    // Obtener referencias a los campos de contraseña y confirmar contraseña
    var password = document.getElementById("password");
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
<?php
// Verificamos si se ha pasado el parámetro 'id' en la URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Establecemos la conexión a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "incidencia");

    // Consulta para obtener los datos del alumno con el ID proporcionado
    $consulta = "SELECT * FROM alumno WHERE id_Alu = $id";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificamos si se encontró el alumno con el ID proporcionado
    if($usuario = mysqli_fetch_assoc($resultado)) {
        // Consultas para obtener los datos adicionales necesarios
        $consulta_grupo = "SELECT * FROM grupo";
        $resultado_grupo = mysqli_query($conexion, $consulta_grupo);

        $consulta_nivel = "SELECT * FROM nivel";
        $resultado_nivel = mysqli_query($conexion, $consulta_nivel);

        $consulta_grado = "SELECT * FROM grado";
        $resultado_grado = mysqli_query($conexion, $consulta_grado);
    } else {
        // Si no se encontró el alumno, redirigimos a alguna página de manejo de errores
        header('Location: error.php');
        exit();
    }
} else {
    // Si no se proporcionó el parámetro 'id' en la URL, redirigimos a alguna página de manejo de errores
    header('Location: error.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>

    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/es.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body id="page-top">

    <form action="../includes/_functions.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <h3 class="text-center">Editar Alumnos</h3>

                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="Nom_Alu" name="Nom_Alu" class="form-control"
                                    value="<?php echo $usuario['Nom_Alu']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ApellidoM" class="form-label">Apellido Paterno</label>
                                <input type="text" id="PA_Alu" name="PA_Alu" class="form-control"
                                    value="<?php echo $usuario['PA_Alu']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="ApellidoM" class="form-label">Apellido Materno</label>
                                <input type="text" id="SA_Alu" name="SA_Alu" class="form-control"
                                    value="<?php echo $usuario['SA_Alu']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="Nivel" class="form-label">Nivel</label>
                                <select id="id_nivel" name="id_nivel" class="form-control" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                    while ($row_nivel = mysqli_fetch_assoc($resultado_nivel)) {
                                        echo "<option value='" . $row_nivel['id_nivel'] . "'";
                                        if ($row_nivel['id_nivel'] == $usuario['id_nivel']) {
                                            echo " selected";
                                        }
                                        echo ">" . $row_nivel['Nom_Nivel'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Grado" class="form-label">Grado</label>
                                <select id="id_grado" name="id_grado" class="form-control" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                    while ($row_grado = mysqli_fetch_assoc($resultado_grado)) {
                                        echo "<option value='" . $row_grado['id_grado'] . "'";
                                        if ($row_grado['id_grado'] == $usuario['id_grado']) {
                                            echo " selected";
                                        }
                                        echo ">" . $row_grado['Nom_Grado'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="Grupo" class="form-label">Grupo</label>
                                <select id="id_Grupo" name="id_Grupo" class="form-control" required>
                                    <option value="">Selecciona una opción</option>
                                    <?php
                                    while ($row_grupo = mysqli_fetch_assoc($resultado_grupo)) {
                                        echo "<option value='" . $row_grupo['id_Grupo'] . "'";
                                        if ($row_grupo['id_Grupo'] == $usuario['id_Grupo']) {
                                            echo " selected";
                                        }
                                        echo ">" . $row_grupo['Nom_Grupo'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="mb-3">
                                <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
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

</html>

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

$consultaGrado = "SELECT * FROM `grado`";
$resultadoGrado = $conexion->query($consultaGrado);

$alumnos="SELECT * FROM alumno order by id_Alu";
$queryAlumnos= $conexion->query($alumnos);
$incidencia="SELECT * FROM registro_incidencia order by id_incidencia";
$queryincidencia= $conexion->query($incidencia);

$grupos = "SELECT * FROM grupo";
$queryGrupos  = $conexion->query($grupos);  
?>

<html lang="es">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <link rel="stylesheet" href="css/estilos.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <script language="javascript" src="jquery-3.7.1.min.js"></script>
    <script languaje="javascript" src="js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .fila-fija {
            display: flex;
            flex-wrap: wrap;
        }

        .fila-fija td {
            flex: 1 0 100%;
        }

        @media (min-width: 600px) {
            .fila-fija td {
                flex: 1;
            }
        }
    </style>

    <script type="text/javascript" src="js/nav.js"></script>

    <script>
        $(function () {
            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adicional").on('click', function () {
                $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
            });

            // Evento que selecciona la fila y la elimina 
            $(document).on("click", ".eliminar", function () {
                var parent = $(this).parents().get(0);
                $(parent).remove();
            });
        });
    </script>
</head>

<body>
<header>
    <div class="alert alert-info">
        <h2>Registros de Incidencias</h2>
    </div>
</header>

<section>

    <table class="table">
        <tr class="info">
            <th>Nombre</th>
            <th>Grado</th>
            <th>Grupo</th>
            <th>Incidencia</th>
            <th>Comentarios</th>
        </tr>
        <?php
        while ($registroAlumno = $queryAlumnos->fetch_array(MYSQLI_BOTH))
            while ($registroincidencia = $queryincidencia->fetch_array(MYSQLI_BOTH)) {
                echo '<tr>
                        <td>' . $registroAlumno['Nom_Alu'] . '</td>
                        <td>' . $registroAlumno['id_nivel'] . '</td>
                        <td>' . $registroAlumno['id_Grupo'] . '</td>
                        <td>' . $registroincidencia['incidencia'] . '</td>
                        <td>' . $registroincidencia['comentarios'] . '</td>
                      </tr>';
            }
        ?>
    </table>

    <form method="post" action="guardar_incidencia.php">
        <h3 class="bg-primary text-center pad-basic no-btm">Agregar -Alumno </h3>
        <table class="table bg-info" id="tabla">
            <tr class="fila-fija">
                <td>
                    <select name="id_nivel[]" required>
                        <option value="">Selecciona nivel</option>
                        <?php
                        $consultaNivel = "SELECT * FROM nivel";
                        $resultadoNivel = $conexion->query($consultaNivel);
                        while ($nivel = $resultadoNivel->fetch_assoc()) {
                            echo "<option value='" . $nivel['id_nivel'] . "'>" . $nivel['Nom_Nivel'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <select name="id_Grado[]" required>
                        <option value="">Selecciona el grado</option>
                        <!-- Aquí se cargarán dinámicamente los grados según el nivel seleccionado -->
                    </select>
                </td>
                <td>
                    <select name="id_Grupo[]" required>
                        <option value="">Selecciona el grupo</option>
                        <?php
                        $consultaGrupo = "SELECT * FROM grupo";
                        $resultadoGrupo = $conexion->query($consultaGrupo);
                        while ($grupo = $resultadoGrupo->fetch_assoc()) {
                            echo "<option value='" . $grupo['id_Grupo'] . "'>" . $grupo['Nom_Grupo'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input required name="incidencia[]" placeholder="Incidencia"/></td>
                <td>
                    <select name="id_nivelin[]" required>
                        <option value="">Selecciona nivel de intervención</option>
                        <?php
                        $consultaNivelIncidencia = "SELECT * FROM nivel_incidencia";
                        $resultadoNivelIncidencia = $conexion->query($consultaNivelIncidencia);
                        while ($nivelIncidencia = $resultadoNivelIncidencia->fetch_assoc()) {
                            echo "<option value='" . $nivelIncidencia['id_nivelin'] . "'>" . $nivelIncidencia['Nom_Incidencia'] . "</option>";
                        }
                        ?>
                    </select>
                </td>
                <td><input required name="comentarios[]" placeholder="comentarios"/></td>
                <td class="eliminar"><input type="button" value="Eliminar" class="btn btn-danger"/></td>
            </tr>
        </table>

        <div class="btn-der">
            <tr class="fila-fija">
                <input type="submit" name="insertar" value="Guardar" class="btn btn-info"/>
                <button id="adicional" name="adicional" type="button" class="btn btn-warning">Agregar Alumno </button>
            </tr>
        </div>
    </form>

</section>
</body>

</html>

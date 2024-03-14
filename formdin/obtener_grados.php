<?php
        // Realiza la conexión a la base de datos (debes incluir tu archivo de conexión aquí)
        include('conexion.php');

        // Verifica si se recibió un valor para el nivel
        if(isset($_POST['nivel'])){
            // Obtiene el nivel seleccionado desde la solicitud AJAX
            $nivel = $_POST['nivel'];

            // Consulta los grados correspondientes al nivel seleccionado
            $query = "SELECT * FROM grado WHERE id_nivel = $nivel";
            $result = mysqli_query($conexion, $query);

            // Construye las opciones para el select de grados
            $options = "<option value=''>Selecciona el grado</option>";
            while($row = mysqli_fetch_array($result)){
                $options .= "<option value='".$row['id_Grado']."'>".$row['Nom_Grado']."</option>";
            }

            // Retorna las opciones de los grados
            echo $options;
        }
?>

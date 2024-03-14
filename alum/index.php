<?php


?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

	<link rel="stylesheet" href="./css/es.css">
    <link rel="stylesheet" href="./css/styles.css">

</head>

<body id="page-top">

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Registro de Alumnos</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form  action="../includes/validar.php" method="POST">

                <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="Nom_Alu" name="Nom_Alu" class="form-control"required>
                            </div>
                            <div class="form-group">
                                <label for="ApellidoM" class="form-label">Apellido Paterno</label>
                                <input type="text" id="PA_Alu" name="PA_Alu" class="form-control"required>
                            </div>
                            <div class="form-group">
                                <label for="ApellidoM" class="form-label">Apellido Materno</label>
                                <input type="text" id="SA_Alu" name="SA_Alu" class="form-control"required>
                            </div>
                            <div class="form-group">
                                <label for="Nivel" class="form-label">Nivel</label>
                                <select type="select" id="id_nivel" name="id_nivel" class="form-control" required >
                                    <option value="">Selecciona una opcion</option>
                                    <option value="1">Preescola</option>
                                    <option value="2">Primaria</option>
                                    <option value="2">Secundaria</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Grupo" class="form-label">Grupo</label>
                                <select type="select" id="id_Grupo" name="id_Grupo" class="form-control" required >
                                    <option value="">Selecciona una opcion</option>
                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Grado" class="form-label">Grado</label>
                                <select type="select" id="id_grado" name="id_grado" class="form-control" required >
                                    <option value="">Selecciona una opcion</option>
                                    <option value="1">Primero Preescolar</option>
                                    <option value="2">Segundo Preescolar</option>
                                    <option value="3">Tercero Preescolar</option>
                                    <option value="4">Primero Primaria</option>
                                    <option value="5">Segundo Primaria</option>
                                    <option value="6">Tercero Primaria</option>
                                    <option value="7">Cuarto Primaria</option>
                                    <option value="8">Quinto Primaria</option>
                                    <option value="9">Sexto Primaria</option>
                                    <option value="9">Primero Secundaria</option>
                                    <option value="9">Segundo Secundaria</option>
                                    <option value="9">Tercero Secundaria</option>
                                </select>
                            </div>
                            <br>
                

                            
                            <div class="mb-3">   
                               <input type="submit" value="Guardar"class="btn btn-success" 
                               name="registrar">
                               <a href="user.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        

                        </form>
               
</body>
</html>
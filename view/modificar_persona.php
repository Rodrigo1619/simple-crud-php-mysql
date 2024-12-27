<?php
include("../model/conexion.php");
/* recoger el id que se manda */
$id=$_GET["id"];

/* traer toda la informacion segun el id */

$sql=$conexion->query("SELECT PERS.*, PAI.nombre AS nombre_pais 
                                FROM PERSONA PERS 
                                LEFT JOIN PAIS PAI ON PERS.id_pais = PAI.id_pais 
                                WHERE PERS.id_persona = $id");
?>

<!-- Formulario -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">Modificar personas</h3>
            <!-- input para poder obtener el id -->
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <?php 
            /* llamando al controlador para poder mostrar los mensajes de error */
            include("../controller/modificar_persona.php");
                /* recorrer los datos de la BD y poder mostrarlos */
                while($datos=$sql->fetch_object()){?>
                <!-- con value mostramos dinamicamente los valores -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                        <input type="text" class="form-control" name="nombre" value="<?=$datos->nombre ?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
                        <input type="text" class="form-control" name="apellido" value="<?=$datos->apellido ?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">DNI de la persona</label>
                        <input type="text" class="form-control" name="dni" value="<?=$datos->dni ?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha" value="<?=$datos->fecha_nac ?>">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Correo</label>
                        <input type="text" class="form-control" name="correo" value="<?=$datos->correo ?>">
                    </div>

                    <div class="mb-3">
                        <label for="pais" class="form-label">País</label>
                        <select class="form-control" name="id_pais" id="pais">
                            <option value="">Seleccione un país</option>
                                <?php
                                    $queryPaises = $conexion->query("SELECT * FROM PAIS");
                                    while ($pais = $queryPaises->fetch_object()) {
                                        $selected = ($pais->id_pais == $datos->id_pais) ? "selected" : "";
                                        echo "<option value='$pais->id_pais' $selected>$pais->nombre</option>";

                                    }
                                ?>
                        </select>
                    </div>
                <?php }
            ?>
            

            <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
        </form>
</body>
</html>
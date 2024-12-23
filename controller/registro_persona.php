<?php
/* ver si el usuario presiona el boton */
    if(!empty($_POST["btnregistrar"])){
        /* validando todos los datos */
        if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fecha"]) and !empty($_POST["correo"]) ){
            /* almacenar todos los datos */
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $dni=$_POST["dni"];
            $fecha=$_POST["fecha"];
            $correo=$_POST["correo"];

            $sql=$conexion->query("INSERT INTO PERSONA (nombre,apellido,dni,fecha_nac,correo) VALUES ('$nombre', '$apellido', '$dni', '$fecha', '$correo')");
            /* ver si realmente se registro */
            if($sql==1){
                echo '<div class="alert alert-success"> Registro exitoso </div>';
            }else{
                echo '<div class="alert alert-danger"> Error de registro </div>';
            }
        }else{
            echo '<div class="alert alert-warning"> Llene todos los campos </div>';
        }
    }
?>
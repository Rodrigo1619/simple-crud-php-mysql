<?php
if(!empty($_POST["btnmodificar"])){
    /* ver que los campos no esten vacios */
    if(!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fecha"]) and !empty($_POST["correo"]) and !empty($_POST["id_pais"])){
        /* ALMACENAR TODOS LOS DATOS */
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $dni=$_POST["dni"];
        $fecha=$_POST["fecha"];
        $correo=$_POST["correo"];
        $id_pais=$_POST["id_pais"];

        /* modificar todo en la bd */
        $sql=$conexion->query("UPDATE PERSONA SET nombre='$nombre', apellido='$apellido', dni='$dni', fecha_nac='$fecha', correo='$correo', id_pais='$id_pais' WHERE id_persona=$id");
        /* ver si se ha modificado */
        if($sql==1){
            header("location:../index.php");
        }else{
            echo '<div class="alert alert-danger"> Error al modificar </div>';
        }
    }else{
        echo '<div class="alert alert-warning"> Llene todos los campos </div>';
    }
}
?>
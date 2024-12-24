<?php

/* ver si se ha mandado correctamente el id */
if(!empty($_GET['id'])){
    /* guardando el id */
    $id=$_GET['id'];

    /* Haciendo la conexion */
    $sql=$conexion->query("DELETE PERSONA FROM PERSONA WHERE id_persona=$id");

    /* validando que se elimino */
    if($sql == 1){
        echo '<div class="alert alert-success"> Registro eliminado correctamente </div>';
    }else{
        echo '<div class="alert alert-danger"> Registro no eliminado </div>';
    }
}

?>
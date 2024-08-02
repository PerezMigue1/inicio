<?php

if (!empty($_POST["btnregistro"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["correo"]) and !empty($_POST["telefono"]) and !empty($_POST["perfil"]) and !empty($_POST["exp"]) ){
        
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $correo=$_POST["correo"];
        $telefono=$_POST["telefono"];
        $perfil=$_POST["perfil"];
        $exp=$_POST["exp"];

        $sql=$conexion->query(" UPDATE candidatos SET nombre='$nombre', apellido='$apellido', correo_electronico='$correo', telefono='$telefono', perfil_profesional='$perfil', experiencia='$exp' WHERE candidato_id= $id");
        if ($sql==1) {
            header("location: /../app/view/GRUD.php");
        } else {
            echo '<div class="alert alert-danger">Error al modificar</div>';
        }
        
    } else {
        echo '<div class="alert alert-warning">Campos vacios</div>';
    }
}
?>
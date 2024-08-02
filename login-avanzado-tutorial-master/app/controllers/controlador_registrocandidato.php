<?php
if (!empty($_POST["btnregistro"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["correo"]) and !empty($_POST["telefono"]) and !empty($_POST["perfil"]) and !empty($_POST["exp"]) ){

        $db = new DBConnection();
        $conexion = $db->getconnection();

        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $correo=$_POST["correo"];
        $telefono=$_POST["telefono"];
        $perfil=$_POST["perfil"];
        $exp=$_POST["exp"];

        $sql=$conexion->query(" INSERT INTO candidatos (nombre,apellido,correo_electronico,telefono,perfil_profesional,experiencia) VALUES ('$nombre','$apellido','$correo','$telefono','$perfil','$exp')" );
        if ($sql==1) {
            echo '<div class="alert alert-success">Persona registrado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar persona</div>';
        }

    } else {
        echo '<div class="alert alert-warning">Algunos de los campos esta vacio</div>';
    }
}
?>
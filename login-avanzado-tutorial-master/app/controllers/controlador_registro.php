<?php
require_once "app\conf\DBConnection.php";

if (!empty($_POST["btnregistro"])) {
    if (empty($_POST["nombre"]) or empty($_POST["apellido"]) or empty($_POST["usuario"]) or empty($_POST["email"]) or empty($_POST["password"])) {
        echo '<div class="alerta">UNO DE LOS CAMPOS ESTA VACIO</div>';
    } else {
        $db = new DBConnection();
        $conexion = $db->getconnection();

        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $usuario=$_POST["usuario"];
        $email=$_POST["email"];
        $clave=$_POST["password"];
        $sql=$conexion->query(" INSERT INTO usuarios(usuario,contraseña,nombre,apellido,correo_electronico) VALUES ('$usuario','$clave','$nombre','$apellido','$email')");
        if ($sql == 1) {
            echo '<div class="secces">Usuario registrado correctamente</div>';
        } else {
            echo '<div class="alerta ">Error usuario no registrado</div>';
        }
        
    }
    
}
?>
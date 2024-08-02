<?php
require_once "app\conf\DBConnection.php";
session_start();
if (!empty($_POST["btniniciar"])) {
    if (empty($_POST["usuario"]) || empty($_POST["password"])) {
        echo '<div class="alert alert-warning">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
        $db = new DBConnection();
        $conexion = $db->getconnection();

        $usuario = $conexion->real_escape_string($_POST["usuario"]);
        $clave = $conexion->real_escape_string($_POST["password"]);

        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?");
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_object()) {
            var_dump($user);
            $_SESSION["id"] = $user->usuario_id;
            $_SESSION["nombre"] = $user->nombre;
            $_SESSION["apellido"] = $user->apellido;
            //$_SESSION["id"]=$result->usuario_id;
            //$_SESSION["nombre"]=$result->nombre;
            //$_SESSION["apellido"]=$result->apellido;
            header("Location: ../inicio.php");
            exit();
        } else {
            echo '<div class="alert alert-danger">ACCESO DENEGADO</div>';
        }

        $stmt->close();
        $db->closeConnection();
    }
}
?>
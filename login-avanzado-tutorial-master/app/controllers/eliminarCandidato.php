<?php
require_once(__DIR__ . '/../conf/DBConnection.php');

if (!empty($_GET["id"])) {

    $db = new DBConnection();
    $conexion = $db->getconnection();

    $id=$_GET["id"];
    $sql=$conexion->query(" DELETE FROM candidatos WHERE candidato_id=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">Persona eliminada correctamente</div>';
    } else {
        echo '<div class="alert alert-danger"> Hubo un error al eliminar </div>';
    }
}
?>
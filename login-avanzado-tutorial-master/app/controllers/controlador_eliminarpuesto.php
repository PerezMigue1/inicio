<?php
require_once(__DIR__ . '/../conf/DBConnection.php');

if (!empty($_GET["id"])) {
    $db = new DBConnection();
    $conexion = $db->getconnection();
    
    $id=$_GET["id"];

    $eliminar=$conexion->query(" DELETE FROM puestos WHERE puesto_id='$id'");

    if ($eliminar==true) {
        echo '<div class="alert alert-success">Puesto eliminado</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar</div>';
    }
    ?>
    <script>
        window.history.replaceState(null, null, window.location.pathname);
    </script>
<?php }
?>
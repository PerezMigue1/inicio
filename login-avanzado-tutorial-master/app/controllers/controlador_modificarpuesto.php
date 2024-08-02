<?php
if (!empty($_POST['btnmodificar'])) {
    $descripcion = $_POST['desc'];
    $categoria = $_POST['categoria'];
    $salario = $_POST['salario'];
    $id=$_POST['txtid'];

    if (!empty($descripcion) && !empty($categoria) && !empty($salario)) {
        $modificar=$conexion->query( "UPDATE puestos SET descripcion='$descripcion', categoria_id='$categoria', salario='$salario' WHERE puesto_id = $id");
        if ($modificar==true) {
            echo '<div class="alert alert-success">Datos modificados correctamente</div> ';
        } else {
            '<div class="alert alert-warning"> Error al modificar los datos</div> ';
        }
        
    } else {
        echo '<div class="alert alert-danger"> Error faltan datos</div> ';
    }?>
    
    <script>
        window.history.replaceState(null, null, window.location.pathname);
    </script>

<?php }
?>
<?php

if (!empty($_POST["btnregistro"])) {

    $descripcion=$_POST['desc'];
    $categoria=$_POST['categoria'];
    $salario=$_POST['salario'];

    if (!empty($_POST["desc"]) and !empty($_POST["categoria"]) and !empty($_POST["salario"])) {
        $registrar=$conexion->query( "INSERT INTO puestos(descripcion,categoria_id,salario) VALUES ('$descripcion','$categoria','$salario')");
        if ($registrar==true) {
            echo '<div class="alert alert-seccess"> Puesto registrado</div>';
        } else {
            echo '<div class="alert alert-danger"> Error al registrar</div>';
        }
        
    }else{
        echo '<div class="alert alert-danger"> Debe llenar todos los campos</div>';
    }

?>
<script>
    window.history.replaceState(null, null, window.location.pathname);
</script>
<?php }
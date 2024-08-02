<?php
require_once(__DIR__ . '/../conf/DBConnection.php');
$db = new DBConnection();
$conexion = $db->getconnection();

$id = $_GET["id"];
$sql = $conexion->query(" SELECT * FROM candidatos WHERE candidato_id=$id ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/app/css/styleinicio.css">
    <link rel="icon" href="/img/LOGO.ico">
</head>
<body>
<header class="header">
		<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰</label>
		</div>
			<div class="logo">
				<h1>JOMPAX</h1>
			</div>
			<nav class="menu">
				<a href="/inicio.php">Inicio</a>
				<a href="#">Nosotros</a>
				<a href="#">Blog</a>
				<a href="#">Contacto</a>
			</nav>
		</div>
	</header>
    <div class="capa"></div>
<!--	--------------->
<input type="checkbox" id="btn-menu">
<div class="container-menu">
	<div class="cont-menu">
		<nav>
			<a href="#">Portafolio</a>
			<a href="/app/view/GRUD.php">Candidatos</a>
			<a href="/app/view/puestos.php">Puestos</a>
			<a href="#">Facebook</a>
			<a href="#">Youtube</a>
			<a href="#">Instagram</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
<br>
<br>
<form class="col-4s p-5 m-auto" method="POST">
        <h3 class="text-center" style="color:#bbd0ff">Actulizar datos de la persona</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        require_once __DIR__ . '/../controllers/controladorModificarRegistro.php';
        while ($datos = $sql->fetch_object()) {?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color:white">Nombre de la persona:</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color:white">Apellido de la persona:</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color:white">Correo electronico de la persona:</label>
                <input type="email" class="form-control" name="correo" value="<?= $datos->correo_electronico?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color:white">Telefono de la persona:</label>
                <input type="tel" class="form-control" name="telefono" value="<?= $datos->telefono?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color:white">Perfil profesional de la persona:</label>
                <input type="text" class="form-control" name="perfil" value="<?= $datos->perfil_profesional ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label" style="color:white">Experiencia de la persona:</label>
                <input type="number" class="form-control" name="exp" aria-describedby="emailHelp">
            </div>
        <?php }
        ?>
        <button type="submit" class="btn btn-primary" name="btnregistro" value="Ok">Modificar registro</button>
    </form>
</body>
</html>
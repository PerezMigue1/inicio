<?php
session_start();
if (!isset($_SESSION["id"])) {
	header("location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vacantes de Empleo</title>
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
			<a href="app\view\GRUD.php">Candidatos</a>
			<a href="app/view/puestos.php">Puestos</a>
			<a href="#">Facebook</a>
			<a href="#">Youtube</a>
			<a href="#">Instagram</a>
		</nav>
		<label for="btn-menu">✖️</label>
	</div>
</div>
</body>


</html>
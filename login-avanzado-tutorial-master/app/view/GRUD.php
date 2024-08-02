<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidatos</title>
    <link rel="stylesheet" href=".css.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
<br>
    <h1 class="text-center p-3 " style="background-color:orange">Registro de candidatos</h1>

    <script>
        function eliminar() {
            var respuesta=confirm("ESTA SEGURO DE CONTINUAR CON LA ELIMINACIÓN");
            return respuesta
        }
    </script>
    <?php
    include_once __DIR__ . '/../conf/DBConnection.php';
    ?>

    <div class="container-fluid row">
    <form class="col-4 p-3" method="POST">

        <?php
        require_once __DIR__ . '/../controllers/controlador_registrocandidato.php';
        require_once __DIR__ . '/../controllers/eliminarCandidato.php';
        ?>

        <h3 class="text-center" style="color:#bbd0ff">Registro de personas</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:white">Nombre de la persona:</label>
            <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:white">Apellido de la persona:</label>
            <input type="text" class="form-control" name="apellido" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:white">Correo electronico de la persona:</label>
            <input type="email" class="form-control" name="correo" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:white">Telefono de la persona:</label>
            <input type="tel" class="form-control" name="telefono" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:white">Perfil profesional de la persona:</label>
            <input type="text" class="form-control" name="perfil" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" style="color:white">Experiencia de la persona:</label>
            <input type="number" class="form-control" name="exp" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary" name="btnregistro" value="Ok">Registar</button>
    </form>

    <div class="col-8 p-4">
        <table class="table">
            <thead class="bg-info">
                <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Perfil</th>
                <th scope="col">Experiencia</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once(__DIR__ . '/../conf/DBConnection.php');
                    $db = new DBConnection();
                    $conexion = $db->getconnection();
            
                    $sql=$conexion->query("SELECT * FROM candidatos");            
                    while($datos=$sql->fetch_object()){ ?>
                        <tr>
                            <td><?= $datos->candidato_id ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->correo_electronico ?></td>
                            <td><?= $datos->telefono ?></td>
                            <td><?= $datos->perfil_profesional ?></td>
                            <td><?= $datos->experiencia ?></td>
                            <td>
                                <a href="/../app/view/actulizarDatosCandidato.php?id=<?= $datos->candidato_id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="/../app\view\GRUD.php?id=<?= $datos->candidato_id ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                ?>
            </tbody>
        </table>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/../app\js\jquery-3.3.1.slim.min.js"></script>
	<script src="/../app\js\popper.min.js"></script>
	<script src="/../app\js\bootstrap.min.js"></script>

</body>
</html>
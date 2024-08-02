<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puestos</title>
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
    <h1 class="text-center p-3" style="background-color:orange">Registro de Puestos</h1>

    <script>
        function confirmar() {
            return confirm("¿Esta seguro de eliminar el siguiente campo?");
        }
    </script>

    <?php
    include_once __DIR__ . '/../conf/DBConnection.php';
    $db = new DBConnection();
    $conexion = $db->getconnection();

    include_once __DIR__ . '/../controllers/controlador_modificarpuesto.php';
    include_once __DIR__ . '/../controllers/controlador_eliminarpuesto.php';
    ?>

    <div class="row col-12 p-3">
    <form action="" class="col p-3" method="POST">
        <h2 class="text-center" style="color:#bbd0ff">Registro de puesto</h2>

        <?php
        include_once __DIR__ . '/../controllers/controlador_puesto.php';
        ?>
        <div class="mb-3">
            <label class="form-label" style="color:white">Descripcion</label>
            <input type="text" class="form-control" name="desc">
        </div>

        <div class="mb-3">
            <label class="form-label" style="color:white">Categorias</label>
            <select class="form-select" aria-label="Default select example" name="categoria">
                <option selected>Seleccionar</option>
                <?php
                $db = new DBConnection();
                $conexion = $db->getconnection();

                $categoria=$conexion->query(" SELECT * FROM categoriaspuestos");
                while($datos=$categoria->fetch_object()){ ?>
                <option value="<?= $datos->categoria_id ?>"><?= $datos->categoria ?></option>
                <?php }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label" style="color:white">Salario</label>
            <input type="number" class="form-control" name="salario" step="0.01">
        </div>

        <div class="mb-3">
            <button type="submit" name="btnregistro" value="OK" class="btn btn-primary">Registrar</button>
        </div>
    </form>

    <table class="table col p-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Categoria</th>
                <th scope="col">Salario</th>
                <th></th>
            </tr>
        </thead>
    <tbody>
        <?php
        //require_once(__DIR__ . '/../conf/DBConnection.php');
        //$db = new DBConnection();
        //$conexion = $db->getconnection();

        $puesto = $conexion->query(" SELECT puestos.*, categoriaspuestos.categoria FROM puestos
        INNER JOIN categoriaspuestos ON
        puestos.categoria_id = categoriaspuestos.categoria_id");

        while($datos=$puesto->fetch_object()){ ?>
            <tr>
                <td><?= $datos->puesto_id?></td>
                <td><?= $datos->descripcion?></td>
                <td><?= $datos->categoria?></td>
                <td><?= $datos->salario?></td>
                <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="./puestos.php?id=<?= $datos->puesto_id?>" onclick="return confirmar()" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar puesto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" class="col" method="POST">

                                <input type="hidden" value="<?= $datos->puesto_id?>" name="txtid">

                                <h2 class="text-center">Modificar Registro</h2>
                                <div class="mb-3">
                                    <label class="form-label">Descripcion</label>
                                    <input type="text" class="form-control" name="desc" value="<?= $datos->descripcion ?>">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Categorias</label>
                                    <select class="form-select" aria-label="Default select example" name="categoria">
                                        <option selected>Seleccionar...</option>
                                        <?php
                                        $datoscategoria=$conexion->query(" SELECT * FROM categoriaspuestos");
                                        while ($dato=$datoscategoria->fetch_object()) { ?>
                                            <option <?= $datos->categoria_id == $dato->categoria_id ? "selected" : "" ?> 
                                            value="<?= $dato->categoria_id?>"><?= $dato->categoria?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Salario</label>
                                    <input type="number" class="form-control" name="salario" step="0.01" value="<?= $datos->salario ?>">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="btnmodificar" value="OK" class="btn btn-primary">Modificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </tbody>
    </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/../app\js\jquery-3.3.1.slim.min.js"></script>
	<script src="/../app\js\popper.min.js"></script>
	<script src="/../app\js\bootstrap.min.js"></script>

</body>
</html>
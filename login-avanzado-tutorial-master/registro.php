<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro2</title>
    <meta name="description" content="Ejemplo: Login 1">
    <link rel="preload" href="css/normalize.css" as="style">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,500&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10+Charted&display=swap" rel="stylesheet">
    <link rel="preload" href="css/styleslogin.css" as="style">
    <link rel="stylesheet" href="css/styleslogin.css">
</head>

<body>

    <section class="fondo fondo--registro">
        <div class="capa-fondo">

            <main class="contenedor">

                <div class="contenido">

                    <h1>Crea tu cuenta</h1>
                    <?php
                        require_once "app\conf\DBConnection.php";
                        include "app\controllers\controlador_registro.php";
                    ?>

                    <form class="formulario-registro" method="POST">
                        

                        <div class="campoIzq nombre">
                            <input class="registro__field  nombre-field" type="name" placeholder="Nombre" id="name" name="nombre">
                        </div>

                        <div class="campoDer apellido">
                            <input class="registro__field apellido-field" type="name" placeholder="Apellido" id="lastname" name="apellido">
                        </div>


                        <div class="campoIzq email1">
                            <input class="registro__field email-field" type="usuario" placeholder="Usuario" id="usuario" name="usuario">
                        </div>

                        <div class="campoDer email2">
                            <input class="registro__field email-field" type="email" placeholder="Correo electronico" id="email" name="email">
                        </div>


                        <div class="campoIzq contraseña1">
                            <input class="registro__field contraseña-field" type="password" placeholder="Contraseña" id="password" name="password">
                        </div>

                        <div class="campoDer contraseña2">
                            <input class="registro__field contraseña-field" type="password" placeholder="Confirma la contraseña" id="password" name="password">
                        </div>

                        <div class="campoIzq boton1">
                            <a href="login.php" class="boton boton--secundario">Iniciar</a>
                        </div>

                        <div class="campoDer boton2">
                            <input type="submit" value="Crear Cuenta" class="boton boton--primario" name="btnregistro">
                        </div>

                    </form>
                    
                </div> <!-- Fin div contendio-->
            </main><!-- Fin div main-->
        </div><!-- Fin div capa de fondo-->
    </section><!-- Fin fondo-->






</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <meta name="description" content="Ejemplo: Login 1">
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
   <section class="fondo">
      <div class="capa-fondo">

         <main class="contenedor">

            <div class="contenido">

               <h1>BIENVENIDO</h1>

               <?php
               require_once "app\conf\DBConnection.php";
               include "app\controllers\controllerinicio.php";               
               ?>

               <form method="POST" class="formulario" action="">

                  <div class="campo1"><label class="campo__label usuario" for="usuario">Usuario:</label></div>
                  <div class="campo2"><input class="campo__field usuario-field" type="usuario" placeholder="Tu usuario" id="usuario" name="usuario"></div>
                  <div class="campo1"><label class="campo__label contraseña" for="password">Contraseña</label></div>
                  <div class="campo2"><input class="campo__field contraseña-field" type="password" placeholder="Tu contraseña" id="password" name="password"></div>
                  <div class="campo3"><a href="registro.php" class="boton boton--secundario">Registrarse</a></div>
                  <div class="campo4"><input type="submit" value="Iniciar sesion" class="boton boton--primario" name="btniniciar"></div>

               </form>
            </div> <!-- Fin div contendio-->
         </main><!-- Fin div main-->
      </div><!-- Fin div capa de fondo-->
   </section><!-- Fin fondo-->

</body>

</html>
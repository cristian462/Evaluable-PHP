<?php
session_start();
if(empty($_SESSION)){
    header("location:../php/sesion.php");
}
$adminMode = "hidden";
if($_SESSION["nivel"]==2){
    $adminMode = "visible";
}

$img = "../img/".$_SESSION["foto"];
if(!isset($_COOKIE["color"])){
    $colorFondo="green";
}else{
$colorFondo = strip_tags($_COOKIE["color"]);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/estilos.css">
    <title>Página Principal</title>
</head>
<body>

</head>
<body>

    <header>
        <div class="usuario">
            <img src="<?=$img?>" alt="" style="max-width: 100px; max-height: 100px">
            <a href="../php/usuario.php" style="color:white;"><?=$_SESSION["nombre"]?></a>
        </div>
        
        <div class="cerrar-sesion">
            <a href="../php/admin.php" id="servicio" style="visibility: <?=$adminMode?>;" >Administar</a>
            <a href="../php/alta.php" id="servicio">Servicio</a>
            <a href="../php/sesion.php">Cerrar Sesión</a>
        </div>
    </header>

    <main>
        <h1  style="background-color: <?=$colorFondo?>;">Bienvenido a Mi Sitio Web</h1>

        <section class="noticias">
            <article>
                <h2>Titulo de la Noticia 1</h2>
                <p>Descripción breve de la noticia 1. Puedes agregar más detalles si es necesario.</p>
                <a href="#">Leer más</a>
            </article>

            <article>
                <h2>Titulo de la Noticia 2</h2>
                <p>Descripción breve de la noticia 2. Puedes agregar más detalles si es necesario.</p>
                <a href="#">Leer más</a>
            </article>

            <!-- Puedes agregar más artículos de noticias según sea necesario -->

        </section>
    </main>

</body>
</html>
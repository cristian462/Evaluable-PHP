<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../style/alta.css"></link>
</head>
<body>
    <?php
    foreach($errrores as $error){
        echo $error . "<br>";
    }
    ?>
    <h1>Alta de Servicio</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="titulo">Titulo:</label>
    <input type="text" name="titulo"><br>
    <label for="servicio">Tipo de Servicio:</label>
    <select name="servicio"><!-- Pendiente a modificar los option!-->
        <option value="servicio1">servicio1</option>
        <option value="servicio2">servicio2</option>
        <option value="servicio3">servicio3</option>
    </select><br>
    <label for="desc">Descripcion del servicio:</label>
    <textarea name="desc"cols="30" rows="10" placeholder="Dame una breve descripcion de lo que ofreces hacer"></textarea><br>
    <label for="tipo">Tipo de Pago:</label>
    <input type="radio" name="pago" id="" value="inter">Intercambio</input>
    <input type="radio" name="pago" id="" value="dinero">Dinero</input><br>
    <label for="precio">Precio por hora:</label>
    <input type="text"name="precio"><br>
    <label for="ubi">Ubicación:</label>
    <input type="text" name="ubi"><br>
    <select name="disponible">
        <option value="manana">Mañanas</option>
        <option value="tarde">Tardes</option>
        <option value="noche">Noches</option>
        <option value="finde">Fines de Semana</option>
    </select><br>
    <label for="foto"></label>
    <input type="file" name="foto"><br>
    <input type="submit" name="enviar" value="enviar">
    </form>

</body>
</html>
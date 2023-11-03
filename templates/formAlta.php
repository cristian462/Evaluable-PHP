<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    foreach($errrores as $error){
        echo $error . "<br>";
    }
    ?>
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
    <label for="tipo">Tipo de Pago</label>
    <input type="radio" name="pago" id="" value="inter">Intercambio</input>
    <input type="radio" name="pago" id="" value="dinero">Dinero</input><br>
    <label for="precio">Precio/h</label>
    <input type="text"name="">

</body>
</html>
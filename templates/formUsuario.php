<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" type="text/css" href="../style/usuario.css"></link>
</head>
<body>
    <?php
        foreach($errores as $error){
            echo $error."<br>";
        }
    ?>
    <h1>Modificar Usuario</h1>
    <form action="" method="post">
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass">
        <label for="foto">Foto de perfil:</label>
        <input type="file" name="foto"><br>
        <label for="idioma">Idioma:</label>
        <input type="checkbox" name="idioma" value="espanol">Español</input>
        <input type="checkbox" name="idioma" value="frances">Frances</input>
        <input type="checkbox" name="idioma" value="ingles">Ingles</input><br><br>
        <label for="descripcion">Descripción personal:</label>
        <textarea name="descripcion" cols="30" rows="10"></textarea><br>
        <input type="submit" name="enviar" value="enviar">
    </form>
</body>
</html>
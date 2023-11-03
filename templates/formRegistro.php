<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <?php
        foreach($errores as $error){
            echo $error."<br>";
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br>
    <label for="correo">Correo:</label>
    <input type="text" name="correo"><br>
    <label for="pass">Contraseña:</label>
    <input type="password" name="pass"><br>
    <label for="fecha">Fecha de nacimiento:</label>
    <input type="text" name="fecha"><br>
    <label for="imagen">Foto de perfil</label>
    <input type="file" name="imagen"><br>
    <label for="idioma">Idioma:</label>
    <input type="checkbox" name="idioma" value="espanol">Español</input>
    <input type="checkbox" name="idioma" value="frances">Frances</input>
    <input type="checkbox" name="idioma" value="ingles">Ingles</input><br><br>
    <label for="info">Descripción:</label><br>
    <textarea name="info" cols="30" rows="10" placeholder="Indica una descripción tuya"></textarea><br>
    <input type="submit" name="bAceptar" value="Registrarse">
    </form>
</body>
</html>
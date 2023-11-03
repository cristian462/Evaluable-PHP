<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
</head>
<body>
    <?php
        foreach($errores as $error){
            echo $error."<br>";
        }
    ?>
    <form action="" method="post">
        <label for="correo">Correo electrónico:</label>
        <input type="text" name="correo"><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass"><br>
    </form>
    <p>Si no tienes una cuenta <a href="formRegistro.php">registrate</a> aquí.</p>
</body>
</html>
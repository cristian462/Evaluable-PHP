    <?php
        foreach($errores as $error){
            echo $error."<br>";
        }
    ?>
    <h1>Inicio de Sesion</h1>
    <form action="" method="post">
        <label for="correo">Correo electrónico:</label>
        <input type="text" name="correo"><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass"><br>
        <input type="submit" name="enviar" value="Iniciar Sesion"><br>
    </form>
    <p>Si no tienes una cuenta <a href="formRegistro.php">registrate</a> aquí.</p>

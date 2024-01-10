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
        <label for="color">Elija el color de su pagina:</label><br>
        <input type="radio" name="color" value="red">Rojo
        <input type="radio" name="color" value="cyan">Celeste<br>
        <input type="submit" name="enviar" value="Iniciar Sesion"><br>
        
    </form>
    <p>Si no tienes una cuenta <a href="../php/registro.php">registrate</a> aquí.</p>
        
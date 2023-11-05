<body>
    <?php
        foreach($errores as $error){
            echo $error."<br>";
        }
    ?>
    <h1>Modificar Usuario</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="pass">Contraseña Actual:</label>
        <input type="password" name="oldPass">
        <label for="pass">Contraseña Nueva:</label>
        <input type="password" name="newPass">
        <label for="foto">Foto de perfil:</label>
        <input type="file" name="imagen"><br>
        <label for="idioma">Idioma:</label>
        <input type="checkbox" name="idioma[]" value="espanol">Español</input>
        <input type="checkbox" name="idioma[]" value="frances">Frances</input>
        <input type="checkbox" name="idioma[]" value="ingles">Ingles</input><br><br>
        <label for="descripcion">Descripción personal:</label>
        <textarea name="info" cols="30" rows="10"></textarea><br>
        <input type="submit" name="bAceptar" value="enviar">
    </form>

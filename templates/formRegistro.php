    <?php
        foreach($errores as $error){
            echo $error."<br>";
        }
    ?>
    <h1>Registro</h1>
    <form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br>
    <label for="correo">Correo:</label>
    <input type="text" name="correo"><br>
    <label for="pass">Contraseña:</label>
    <input type="password" name="pass"><br>
    <label for="fecha">Fecha de nacimiento:</label>
    <input type="date" name="fecha"><br>
    <label for="imagen">Foto de perfil</label>
    <input type="file" name="imagen"><br>
    <label for="idioma">Idioma:</label>
    <input type="checkbox" name="idioma[]" value="1">Español</input>
    <input type="checkbox" name="idioma[]" value="2">Frances</input>
    <input type="checkbox" name="idioma[]" value="3">Ingles</input><br><br>
    <?php
    // aqui hacer un metodo pintaCheck() que llamaria a la base de datos
    
    ?>
    <label for="info">Descripción:</label><br>
    <textarea name="info" cols="30" rows="10" placeholder="Indica una descripción tuya"></textarea><br>
    <input type="submit" name="bAceptar" value="Registrarse">
    </form>


    <?php
    foreach($errores as $error){
        echo $error . "<br>";
    }
    ?>
    <form  method="post" enctype="multipart/form-data">
    <h1>Alta de Servicio</h1>
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
        <option value="1">Mañanas</option>
        <option value="2">Tardes</option>
        <option value="3">Noches</option>
        <option value="4">Fines de Semana</option>
    </select><br>
    <label for="foto"></label>
    <input type="file" name="foto"><br>
    <input type="submit" name="enviar" value="enviar">
    </form>
    

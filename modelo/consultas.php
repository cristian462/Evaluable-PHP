<?php
function crearUsuario($pdo,$nombre,$email,$pass,$f_nacimiento,$foto_perfil,$descripcion){
    $password = password_hash($pass, PASSWORD_BCRYPT);
    $consulta = "INSERT INTO usuario (nombre,email,pass,f_nacimiento,foto_perfil,descripcion,nivel,activo)
                values (?,?,?,?,?,?,?,?)";
    $nivel = 0;
    $stmt = $pdo->prepare($consulta);

    $stmt->bindValue(1, $nombre);
    $stmt->bindValue(2, $email);
    $stmt->bindValue(3, $password); 
    $stmt->bindValue(4, $f_nacimiento);
    $stmt->bindValue(5, $foto_perfil);
    $stmt->bindValue(6, $descripcion);
    $stmt->bindValue(7, $nivel);
    $stmt->bindValue(8, false);
     
    return($stmt->execute());
}
function consultaEmail($pdo,$usuario){
    $consulta = "SELECT email FROM usuario WHERE email = ?";
    
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(1, $usuario);
    $stmt->execute();

    // Verificar si se encontró un registro
    if ($stmt->rowCount() > 0) {
        return true;  // Si se encontró un registro, devolver el array con los valores
    } else {
        return false; // Si no se encontró ningún registro, devolver false
    }
}
function IniciarSesion($pdo, $usuario, $pass) {
    if(consultaEmail($pdo,$usuario)){

        //aqui se encontro el email
    $consulta = "SELECT email, pass,nombre, id_user,foto_perfil,nivel FROM usuario WHERE email = ?";
    
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(1, $usuario);
    $stmt->execute();

    // Verificar si se encontró un registro
    if ($stmt->rowCount() > 0) {
        $arrayValores = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($pass,$arrayValores["pass"])){
            return $arrayValores;
        }else{
            return false;
        }
          // Si se encontró un registro, devolver el array con los valores
    } else {
        return false; // Si no se encontró ningún registro, devolver false
    }
    }else{
        return false;
    }
}
function obtenerIdUser($pdo, $email) {
    $consulta = "SELECT id_user FROM usuario WHERE email=?";
    $stmt = $pdo->prepare($consulta);
    $stmt->bindParam(1, $email);
    $stmt->execute();

    // Verificar si se encontró un registro
    if ($stmt->rowCount() > 0) {
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['id_user'];  // Devolver el id_user
    } else {
        return false; // Si no se encontró ningún registro, devolver false
    }
}
function agregarIdiomas($pdo, $idiomas, $email) {
    $idUser = obtenerIdUser($pdo, $email);

    if ($idUser !== false) {
        $consulta = 'INSERT INTO user_idioma (id_user, id_idioma) VALUES (?, ?)';
        $stmt = $pdo->prepare($consulta);

        foreach ($idiomas as $idioma) {
            $stmt->bindParam(1, $idUser);
            $stmt->bindParam(2, $idioma);
            $stmt->execute();
        }

        if ($stmt->rowCount() > 0) {
            return true;  // Se insertaron registros correctamente
        } else {
            return false; // No se insertaron registros
        }
    } else {
        return false; // No se pudo obtener el id_user
    }
}
function agregarServicio($pdo,$titulo,$id_user,$descripcion,$precio,$tipo,$foto_servicio){
    $consulta = "INSERT INTO servicios (titulo,id_user,descripcion,precio,tipo,foto_servicio)
                values (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($consulta);

    $stmt->bindValue(1, $titulo);
    $stmt->bindValue(2, $id_user);
    $stmt->bindValue(3, $descripcion); 
    $stmt->bindValue(4, $precio);
    $stmt->bindValue(5, $tipo);
    $stmt->bindValue(6, $foto_servicio);

    return($stmt->execute());
}
function agregarDispServ($pdo,$id_dispobibilidad){
    $id_servicios=$pdo->lastInsertId();
    $consulta = "INSERT INTO disp_servicio (id_servicio,id_disponibilidad) values (?,?)";
    $stmt = $pdo->prepare($consulta);

    $stmt->bindValue(1, $id_servicios);
    $stmt->bindValue(2, $id_dispobibilidad);

    return($stmt->execute());



}

?>
<?php
session_start();
if (empty($_SESSION)) {
    header("location:sesion.php");
}
include("../libs/bGeneral.php");
cabecera("Usuario", "../style/usuario.css");
$errores = [];
$oldPass = "";
$newPass = "";
$idiomas = "";
$info = "";
$extensionesValidas = ["jpeg", "jpg", "png"];
$dir = __DIR__ . DIRECTORY_SEPARATOR . "../img" . DIRECTORY_SEPARATOR;

if (!isset($_REQUEST["bAceptar"])) {
    include("../templates/formUsuario.php");
} else {


    //aqui modificamos la contraseña
    $oldPass = recoge("oldPass");
    $newPass = recoge("newPass");

    //changePass($newPass, $oldPass, $_SESSION, $errores, $pdo);

    //aqui modificamos los idiomas
    $idiomas = recogeArray("idioma");
    if (!empty($idiomas)) {
        if (cCheck($idiomas, "idiomas", $errores, ["espanol", "frances", "ingles"])) {
            $_SESSION["idiomas"] = $idiomas;
           // updatePass();
        }
    }

    //aqui modificamos info
    $info = recoge("info");
    if (!empty($info)) {
        $_SESSION["info"] = recoge("info");
    }


    //aqui modificamos la foto de perfil

    if (empty($errores)) {
        if ($_SESSION["imagen"] != ($imagenNueva = (cFile("imagen", $errores, $extensionesValidas, $dir, 2000000))) && $_FILES["imagen"]["name"] != "") {
            if (file_exists("../img/" . $_SESSION["imagen"])) { //hacemos esto si queremos borrar de la base de datos la imagen anterior
                unlink("../img/" . $_SESSION["imagen"]);
            }
            $_SESSION["imagen"] = $imagenNueva;
        }
    }

    if (!empty($errores)) {
        include("../templates/formUsuario.php");
    } else {
        include("../templates/index.html");
    }
}
pie();

<?php
session_start();
include("../libs/bGeneral.php");
cabecera("inicio de sesion","../style/sesion.css");
    $errores=[];
    $correousu="";
    $passusu="";
    if(!isset($_REQUEST["enviar"])){
        include("../templates/formSesion.php");
    }else{
        $correousu=recoge("correo");
        $passusu=recoge("pass");
        if($_SESSION["pass"]!=$passusu){
            $errores["PasswordIncorrecta"]="La contraseña no coincide";
        }
        if($_SESSION["correo"]!=$correousu){
            $errores["CorreoIncorrecto"]="El correo no coincide";
        }

        if(!empty($errores)){
            include("../templates/formSesion.php");
        }else{
            print_r($_REQUEST);
            print_r($_SESSION);
        }
    }
pie();
?>
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
        
        comprobarUsuario($correousu,$passusu,$errores);

        if(!empty($errores)){
            include("../templates/formSesion.php");
        }else{
            include("../templates/index.html");
        }
    }
pie();
?>
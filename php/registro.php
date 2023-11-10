<?php
session_start();
include("../libs/bGeneral.php");
cabecera("registro","../style/registro.css");
    $nombre="";
    $correo="";
    $pass="";
    $fecha="";
    $idiomas="";
    $info="";
    $extensionesValidas=["jpeg","jpg","png"];
    $dir=__DIR__.DIRECTORY_SEPARATOR."../img".DIRECTORY_SEPARATOR;
    $errores=[]; 
    if(!isset($_REQUEST["bAceptar"])){
        include("../templates/formRegistro.php");
    }else{
        $nombre=recoge("nombre");
        $correo=recoge("correo");
        $pass=recoge("pass");
        $fecha=recoge("fecha");
        $idiomas=recogeArray("idioma");
        $info=recoge("info");

        //vamos a validar
        cTexto($nombre,"nombre",$errores,requerido:true);
        if(empty($pass)) $errores["pass"]="Porfavor ingrese una contraseña";
        
        if(fechaValida($fecha,"Y-m-d",$errores)){
            cDate($fecha,"Date",$errores,true);
        }

        cCheck($idiomas,"idiomas",$errores,["espanol","frances","ingles"]);
        cCorreo($correo,"correo",$errores);
        if(empty($errores)){
            $imagenSubida=cFile("imagen",$errores,$extensionesValidas,$dir,2000000);
        }

        if(!empty($errores)){
            include("../templates/formRegistro.php");

        }else{
            $_SESSION["nombre"]=recoge("nombre"); 
            $_SESSION["correo"]=recoge("correo");
            $_SESSION["pass"] = recoge("pass");
            $_SESSION["imagen"] = $imagenSubida;
            $_SESSION["idiomas"] = implode(",",recogeArray("idioma"));
            $_SESSION["info"] = recoge("info");

            //vamos a escribir en el fichero
            escrituraTexto($_SESSION,"usuarios.txt");

            //redireccionamos a la pagina principal
            header("Location: ../php/sesion.php");
            exit();
        }

    }
    pie();
?>
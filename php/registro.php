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
    $errores=[]; //Falta agregar la imagen
    if(!isset($_REQUEST["bAceptar"])){
        include("../templates/formRegistro.php");
    }else{
        $nombre=recoge("nombre");
        $correo=recoge("correo");
        $pass=recoge("pass");
        $fecha=recoge("fecha");
        $idiomas=recogeArray("idioma");
        $info=recoge("info");
        //falta agregar imagen

        //vamos a validar
        cTexto($nombre,"nombre",$errores,espacios:false,requerido:true);
        if(empty($pass)) $errores["pass"]="Porfavor ingrese una contraseña";
        if(empty($fecha)){
           $errores["fecha"]="Porfavor ingrese una fecha de nacimiento";
        }else{
            $fechaAux=explode("-",$fecha);
            $edad= date("Y")- $fechaAux[0];
            if($edad>=18){
                fechaValida($fecha,"d-m-Y");
            }else{
                $errores["fecha"] = "Para registrarse debe ser mayor de edad";
            }
        }
        cCheck($idiomas,"idiomas",$errores,["espanol","frances","ingles"]);
        cCorreo($correo,"correo",$errores);
        if(empty($errores)){
            $imagenSubida=cFile("imagen",$errores,$extensionesValidas,$dir,2000000);
        }
        //no hace falta con info
        if(!empty($errores)){
            include("../templates/formRegistro.php");

        }else{
            print_r($_REQUEST);
            $_SESSION["correo"]=recoge("correo");
            $_SESSION["pass"] = recoge("pass");
            $_SESSION["imagen"] = $imagenSubida;
            $_SESSION["idiomas"] = recogeArray("idioma");
            $_SESSION["info"] = recoge("info");
            echo "<hr>";
            print_r($_SESSION);
        }


    }
    pie();
?>
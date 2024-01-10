<?php
session_start();
if(!empty($_SESSION)){
    session_unset();
    session_destroy();
}

include("../libs/bGeneral.php");
cabecera("inicio de sesion","../style/sesion.css");
    $errores=[];
    $correousu="";
    $passusu="";
    $color="";
    if(!isset($_REQUEST["enviar"])){
        include("../templates/formSesion.php");
    }else{
        $correousu=recoge("correo");
        $passusu=recoge("pass");
        $color=recoge("color");
        

        if(!empty($errores)){
            $stream=fopen("../files/errorLogs.txt","a+");
            fwrite($stream,recoge("correo")."//");
            fwrite($stream,recoge("pass")."//");
            fwrite($stream,date("Y-m-d H:i:s")."//\n");
            include("../templates/formSesion.php");
        }else{
            try {
                include ('../modelo/conexion.php');
                include_once("../modelo/consultas.php");
                if($userData=IniciarSesion($pdo,$correousu,$passusu)){
                    $_SESSION["idUser"] = ($userData["id_user"]);
                    $_SESSION["nombre"]=($userData["nombre"]);
                    $_SESSION["foto"] = ($userData["foto_perfil"]);
                    $_SESSION["nivel"] = ($userData["nivel"]);
                    setcookie("color",$color,time()+20,"/");
                    header("location:../templates/index.php");
                    
                }else{
                    $errores["inicioSesion"] = "usuario o contraseña incorrectos";
                    include("../templates/formSesion.php");
                }
            }catch (PDOException $e) {
    
                // En este caso guardamos los errores en un archivo de errores log
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../files/logBD.txt");
                // guardamos en ·errores el error que queremos mostrar a los usuarios
                $errores['datos'] = "Ha habido un error <br>";
                header("location:../php/sesion.php");
            }
            /*
            
            }*/
            
        }
    }
pie();
?>
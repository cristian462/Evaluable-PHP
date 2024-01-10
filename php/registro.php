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

        cCheck($idiomas,"idiomas",$errores,["1","2","3"]);
        cCorreo($correo,"correo",$errores);
        if(empty($errores)){
            $imagenSubida=cFile("imagen",$errores,$extensionesValidas,$dir,2000000);
        }

        if(!empty($errores)){
            include("../templates/formRegistro.php");

        }else{
            try {
                include ('../modelo/conexion.php');
                include_once("../modelo/consultas.php");
                if(crearUsuario($pdo,$nombre,$correo,$pass,$fecha,$imagenSubida,$info)){
                    if(agregarIdiomas($pdo,$idiomas,$correo)){
                        header("location:sesion.php");
                    }else{
                        $errores["errorRegistro"] = "Error en el registro de usuario";
                        include("../templates/formRegistro.php");
                    }
                   
                }else{
                    $errores["crearUsuario"] = "error en la creacion del usuario";
                    include("../templates/formRegistro.php");
                }
            }catch (PDOException $e) {
    
                // En este caso guardamos los errores en un archivo de errores log
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
                // guardamos en ·errores el error que queremos mostrar a los usuarios
                $errores['datos'] = "Ha habido un error <br>";
                include("../templates/formRegistro.php");
            }
            
        }

    }
    pie();
?>
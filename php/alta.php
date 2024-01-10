<?php
    session_start();
    if(empty($_SESSION)){
        header("location:sesion.php");
    }
    include ("../libs/bGeneral.php");
    cabecera("Alta","../style/alta.css");
    $errores=[];
    $titulo="";
    $servicio="";
    $desc="";
    $pago="";
    $precio="";
    $ubi="";
    $disponible="";
    $foto="";

    if(!isset($_POST["enviar"])){
        include("../templates/formAlta.php");
    }else{
        $titulo=recoge("titulo");
        $servicio=recoge("servicio");
        $desc=recoge("desc");
        $pago=recoge("pago");
        $precio=recoge("precio");
        $ubi=recoge("ubi");
        $disponible=recoge("disponible");

        cTexto($titulo,"titulo",$errores,40,3,true,true,true);
        
        if(empty($servicio)){
            $errores["emptyServicio"]= "El servicio no está seleccionado";
        }
        if(empty($desc)){
            $errores["emptyDescripcion"]= "La descripción está vacía";
        }
        if(empty($pago)){
            $errores["emptyPago"]= "El pago no está seleccionado";
        }
            if(empty($precio)&& $pago=="pago"){
                cNum($precio,"CantidadPago",$errores,true);
            }

        if(empty($ubi)){
            $errores["emptyUbi"]="La ubicación no está establecida";
        }
        if(empty($disponible)){
            $errores["emptyDisponibilidad"]= "La disponibilidad no está seleccionada";
        }
        if(empty($errores)){
            $foto=cFile("foto", $errores , ["jpg","jpeg","png"],"../img/",2000000);//CONFIG.PHP
        }

        if(!empty($errores)){
            include("../templates/formAlta.php");
        }else{
            try {
                include ('../modelo/conexion.php');
                include("../modelo/consultas.php");
                if(agregarServicio($pdo,$titulo,$_SESSION["idUser"],$desc,$precio,$pago,$foto)){
                    if(agregarDispServ($pdo,$disponible)){
                        header("location:../templates/index.php");
                    }else{
                        $errores["darAlta"] = "Error a la hora de cargar el servicio";
                        include("../templates/formAlta.php");
                    }
                }
            }catch (PDOException $e) {
    
                // En este caso guardamos los errores en un archivo de errores log
                error_log($e->getMessage() . "##Código: " . $e->getCode() . "  " . microtime() . PHP_EOL, 3, "../logBD.txt");
                // guardamos en ·errores el error que queremos mostrar a los usuarios
                $errores['datos'] = "Ha habido un error <br>";
                include("../templates/formRegistro.php");
            }
            
            /*
            $sesion["titulo"]=recoge("titulo");
            $sesion["servicio"]=recoge("servicio");
            $sesion["desc"]=recoge("desc");
            $sesion["pago"]=recoge("pago");
            $sesion["ubi"]=recoge("ubi");
            $sesion["disponible"]=recoge("disponible");
            */
            //escrituraTexto($sesion,"alta.txt");      
        }
        
    }
    pie();
?>
<?php
    session_start();
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
            cFile("foto", $errores , ["jpg","jpeg","png"],"../img/",2000000);//CONFIG.PHP
        }

        if(!empty($errores)){
            include("../templates/formAlta.php");
        }else{
            $sesion["titulo"]=recoge("titulo");
            $sesion["servicio"]=recoge("servicio");
            $sesion["desc"]=recoge("desc");
            $sesion["pago"]=recoge("pago");
            $sesion["ubi"]=recoge("ubi");
            $sesion["disponible"]=recoge("disponible");

            escrituraTexto($sesion,"alta.txt");      
        }
        
    }
    pie();
?>
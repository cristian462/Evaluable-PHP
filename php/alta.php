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

        if(empty($titulo)){
            $errores["emptyTitulo"]="El titulo está vacío";
        }else{
            cTexto($titulo,"titulo",$errores,40,3,true,true);
        }
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
                $errores["emptyPrecio"]= "Si el tipo de pago no es en intercambio debe especificarse el importe";
            }else{
                if(cNum($precio,"numericoPago",$errores,true,PHP_INT_MAX)==true){
                    $_SESSION["precio"]=recoge("precio");
                    cNum($precio,"numericoPago",$errores,true,PHP_INT_MAX);
                }
            }

        if(empty($ubi)){
            $errores["emptyUbi"]="La ubicación no está establecida";
        }
        if(empty($disponible)){
            $errores["emptyDisponibilidad"]= "La disponibilidad no está seleccionada";
        }
        if(empty($errores)){
            cFile("foto", $errores , ["jpg","jpeg","png"],"../img/",2000000);
        }

        if(!empty($errores)){
            include("../templates/formAlta.php");
        }else{
            print_r($_REQUEST);
            $_SESSION["titulo"]=recoge("titulo");
            $_SESSION["servicio"]=recoge("servicio");
            $_SESSION["desc"]=recoge("desc");
            $_SESSION["pago"]=recoge("pago");
            $_SESSION["ubi"]=recoge("ubi");
            $_SESSION["disponible"]=recoge("disponible");
        }
        include("../templates/formAlta.php");
    }
    pie();
?>
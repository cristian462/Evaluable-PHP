<?php
    include ("../libs/bGeneral.php");
    cabecera("Alta","../style/alta.css");
    $errores=[];
    $erroresfoto=[];
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
        cFile("foto", $erroresfoto , ["jpg","jpeg","png"],"../img/",2000000);

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
        if($pago=="pago"){
            if(empty($precio)){
                $errores["emptyPrecio"]= "Si el tipo de pago no es en intercambio 
                debe especificarse el importe";
            }else{
                cNum($precio,"numericoPago",$errores,true,PHP_INT_MAX);
            }
        }
        if(empty($ubi)){
            $errores["emptyUbi"]="La ubicación no está establecida";
        }
        if(empty($disponible)){
            $errores["emptyDisponibilidad"]= "La disponibilidad no está seleccionada";
        }

        if(!empty($errores)){
            include("../templates/formAlta.php");
        }else{
            print_r($_REQUEST);
        }
    }
?>
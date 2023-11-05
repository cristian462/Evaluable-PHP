<?php
session_start();
include("../libs/bGeneral.php");
cabecera("Usuario","../style/usuario.css");
$errores =[];
$oldPass ="";
$newPass = "";
$idiomas ="";
$info= "";
$extensionesValidas=["jpeg","jpg","png"];
$dir=__DIR__.DIRECTORY_SEPARATOR."../img".DIRECTORY_SEPARATOR;

if(!isset($_REQUEST["bAceptar"])){
    include ("../templates/formUsuario.php");
}else{
    //aqui modificamos la contraseña
    $oldPass=recoge("oldPass");
    if(!empty($oldPass)){
        $newPass=recoge("newPass");
        if(empty($newPass)){
            $errores["newPass"]= "Si desea cambiar a una nueva contraseña deba ingresar una";
        }else if($oldPass !=$_SESSION["pass"]){
            $errores["oldPass"]= "La contraseña actual no es correcta";
        }else{
            $_SESSION["pass"]= $newPass;
        }
    }
    //aqui modificamos la foto de perfil
    
    if($_SESSION["imagen"]!=($imagenNueva=(cFile("imagen",$errores,$extensionesValidas,$dir,2000000)))&&$_FILES["imagen"]["name"]!=""){
        if (file_exists("../img/".$_SESSION["imagen"])) { //hacemos esto si queremos borrar de la base de datos la imagen anterior
            unlink("../img/".$_SESSION["imagen"]);
        }
        $_SESSION["imagen"]=$imagenNueva;
    } //esto va al final

    //aqui modificamos los idiomas
    $idiomas = recogeArray("idioma");
    if(!empty($idiomas)){
        if(cCheck($idiomas,"idiomas",$errores,["espanol","frances","ingles"])){
            $_SESSION["idiomas"]=$idiomas;
        }
    }
    //aqui modificamos info
    $info = recoge("info");
    if(!empty($info)){
        $_SESSION["info"]= recoge("info");
    }
    //aqui enviamos el formulario
    if(!empty($errores)){
        include("../templates/formUsuario.php");
    }else{
        print_r($_FILES);
        echo "<hr>";
        print_r($_REQUEST);
        echo "<hr>";
        print_r($_SESSION);
    }
}
pie();
?>
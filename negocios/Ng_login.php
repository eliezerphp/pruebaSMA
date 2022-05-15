<?php
if (($_POST["lusuario"] == '') && ($_POST["lcontraseña"] == '')) {

    header("location:../login.php");

} else {
    
        require_once("../datos/Dt_login.php");

        $validar = new Login();
        $validar->validarAcceso($_POST["lusuario"], $_POST["lcontraseña"]);
}
    
?>
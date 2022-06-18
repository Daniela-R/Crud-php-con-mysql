<?php 
    if(isset($_POST['cerrar'])){
        session_start();
        session_destroy();
        header("Location:http://localhost/Ejercicios/CRUD_FINAL/Ingresar.php");
    }
?>
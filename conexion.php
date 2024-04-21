<?php
include('php/models/clases.php');

$check_log = Usuario::checkLog($_POST['email'], $_POST['passwd']); 

if($check_log){
    session_start();
    $_SESSION['check_log'] = $check_log;
    header('Location: home.php'); 
    exit();
}else{
    var_dump("Entrando en este bucle elese");
    error_log("Error conexion.php checklog es $check_log \n",3,'log/error.log');
    header('Location: index.php');
    exit();
}
?>
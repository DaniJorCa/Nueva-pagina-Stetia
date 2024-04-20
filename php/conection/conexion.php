<?php
include('php/models/usuario_model.php');

$logueado = checkLog($_POST['email'], $_POST['passwd']); 

if($logueado){
    session_start();
    $_SESSION['logueado'] = $logueado;
    header('Location: home.php'); 
}else{
    header('Location: index.php');
}
?>
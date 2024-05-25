
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="es">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon_stetia.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous">
        <link href="bootstrap_css/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/spinner.css" rel="stylesheet">
    </head>
    
<body class="body-spinner d-flex align-items-center flex-column">
<?php
include('php/models/clases.php');

include('spinner.html');
var_dump($_POST['passwd']);

$check_log = Usuario::checkLog($_POST['email'], $_POST['passwd']); 

if($check_log){
    session_start();
    $_SESSION['check_log'] = $check_log;
    header('Location: home.php'); 
    exit();
}else{
    error_log("Error conexion.php checklog erroneo\n",3,'log/error.log');
    header('Location: index.php');
    exit();   
}
?>
<script>
        // Redirigir a la página de inicio después de 2 segundos
        setTimeout(function() {
            window.location.href = 'home.php';
        }, 2000);
</script>
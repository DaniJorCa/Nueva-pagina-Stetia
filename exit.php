
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
<h3 class='display-3 text-center'>Hasta Pronto!!</h3>   
<?php
include('spinner.html');

session_start();
session_unset();
$_SESSION = array();
session_destroy();
?>
<script>
        // Redirigir a la página de inicio después de 2 segundos
        setTimeout(function() {
            window.location.href = 'login.php';
        }, 2000);
</script>
</body>
</html>
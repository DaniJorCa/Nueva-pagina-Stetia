<html>
    <head>
        <meta charset="UTF-8" lang="es">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon_stetia.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous">
        <link href="bootstrap_css/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/generic.css" rel="stylesheet">
    </head>
    <body class="row d-flex justify-content-center">
<?php
    include ('php/controllers/tratamientos_controller.php');
    include ('php/views/header.html');
    include ('php/views/slider.html');
?>    
    <main class="p-4 col-8 my-3">
<?php        
   include('php/views/peeling_quimico.html');
?>
    </main>
<?php    
    include ('php/views/footer.html');
?>
        <script src="bootstrap_css/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
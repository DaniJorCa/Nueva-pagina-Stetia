<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" lang="es">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon_stetia.ico">
        <link href="css/footer.css" rel="stylesheet">
        <link href="bootstrap_css/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/generic.css" rel="stylesheet">
        <link href="css/home.css" rel="stylesheet">
        <link href="css/call_to_action.css" rel="stylesheet">
        <link href="css/aside.css" rel="stylesheet">
        <link href="css/formulario_user_data.css" rel="stylesheet">
        <link href="css/tablas.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    </head>
    <body class="row d-flex justify-content-center fadeIn" id="content" >
<?php
    include('php/pagination/artsXpag.php');
    include('php/models/clases.php');
    include ('php/views/header.html');
    include ('php/views/slider.html');   
    ?>
    <div class='div-flex-nocolumn'>

<main class="p-4  my-3">
<?php        
   include('php/views/tratamientos_facial.php');
?>
</div>
</main>
<?php    
    include ('php/views/footer.html');
?>
        <script src="js/transition.js"></script>
        <script src="js/tablas.js"></script>
        <script src="js/upload_img.js"></script>
        <script src="bootstrap_css/js/bootstrap.bundle.min.js"></script>
        <script src="js/validity_form.js"></script>
        <script src="js/busqueda_selectiva.js"></script>
    </body>
</html>
<!DOCTYPE html>
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
        <link href="css/home.css" rel="stylesheet">
        <link href="css/call_to_action.css" rel="stylesheet">
        <link href="css/aside.css" rel="stylesheet">
        <link href="css/formulario_user_data.css" rel="stylesheet">
        
    </head>
    <body class="row d-flex justify-content-center" >
    
<?php
    require_once('php/security/security.php');
    require_once ('php/controllers/tratamientos_controller.php');
    require_once  ('php/controllers/form_controller.php');
    include ('php/views/header.html');
?> 
    <div class='div-flex-nocolumn'>
<?php
    include  ('php/views/aside_bar.php');
?>
    
   
    <main class="p-4  my-3">
        
<?php
    
    //Control de mensajes

    if(isset($_GET['msg']) ? $message = $_GET['msg']: '');

    if(isset($message)){
       switch ($message) {
            case 'len_err';
                print("Error en longitudes en el formulario");
            default: 
                print("");
        } 
    }
        



    if(isset($_GET['type']) ? $_GET = $_GET['type']: '');
    
        switch ($_GET) {
            case '_modificar_datos';
                include('php/views/modificar_mis_datos.php');
                break;
            case '_personal_corner';
                include('php/views/personal_corner.php');
                break;
            default: 
                include ('php/views/tratamientos_facial.html');
        }
    


?>    
    </div>
    </main>
<?php   

    include ('php/views/footer.html');
?>
        <script src="bootstrap_css/js/bootstrap.bundle.min.js"></script>
        <script src="js/validity_form.js"></script>
    </body>
</html>
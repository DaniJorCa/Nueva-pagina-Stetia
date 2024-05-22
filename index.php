<?php
require_once ('php/controllers/tratamientos_controller.php');
require_once  ('php/controllers/form_controller.php');
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
        

    if(isset($_GET['type']) ? $choose = $_GET['type']: '');
    if(isset($choose)){
        switch ($choose) {
            case '_new_user';
                check_register_form();
                break;
            case '_contact';
                check_contact_form();
                break;
            default: 
                main_index();
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/chatBot.css">
        <meta charset="UTF-8" lang="es">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon_stetia.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous">
        <link href="bootstrap_css/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/generic.css" rel="stylesheet">
        <link href="css/call_to_action.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    </head>

<?php
    require_once  ('php/views/header.html');
    require_once  ('php/views/slider.html');
     
?>
    <body class="row d-flex justify-content-center">

    <main>
<?php
    include('php/views/call_to_action.html');
    include ('php/views/numeros_stetia.html');
    include ('php/views/testimonial.html');
    include ('php/views/personal_stetia.html');
    include ('php/views/form_contacto.html');
    include ('php/views/chat_bot.html');
?>

   
    </main>
<?php   

    include ('php/views/footer.html');
?>
        <script src="bootstrap_css/js/bootstrap.bundle.min.js"></script>
        <script src="js/validity_form.js"></script>

        <!-- cookies JS File -->
        <script type="text/javascript" src="js/generic.js"></script>

        <!-- chatBot JS File -->
        <script type="text/javascript" src="js/chatBot.js"></script>

         <!-- Vendor JS Files -->
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>
</html>

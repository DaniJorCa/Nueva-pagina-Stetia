<?php
require_once('php/models/clases.php');
require_once('php/security/security.php');
require_once ('php/controllers/tratamientos_controller.php');
require_once  ('php/controllers/form_controller.php');
require_once  ('php/controllers/superUser_controller.php');
require_once  ('php/controllers/user_controller.php');


//Funciones que redirigen
if(isset($_GET['type'])){
    $type = $_GET['type'];
    switch ($type) {
        case '_delete_user';
            delete_user();
            break;
        case '_send_message':
            send_message();
            break;
        case '_del_correo':
            delete_mail();
            break;
    }
}


?>



<!DOCTYPE html>
<html lang='es'>
    <head>
        <title>Centros estéticos Stetia</title>
        <meta charset="UTF-8" lang="es">
        <link rel="stylesheet" href="css/chatBot.css">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon_stetia.ico">
        <link href="css/footer.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous">
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

        <link href="assets/css/style.css" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        
    </head>
    <body class="row d-flex justify-content-center fadeIn" id="content" >
<?php

include_once ('php/views/header.php');
?>
<div class='div-flex-nocolumn'>
<?php
include  ('php/views/aside_bar.php');

?>
<main class="p-3 d-flex justify-content-start flex-column align-items-center">
<?php
//Control de mensajes
    if(isset($_GET['msg']) ? $message = $_GET['msg']: '');
    if(isset($message)){
       switch ($message) {
            case '_err_mail_deleted';
                print("<h3 class='text-danger fs-2 my-3 col-12 text-center'>Ha ocurrido un error al eliminar el mensaje</h3>");
                break;
            case '_mail_deleted';
                print("<h3 class='text-success fs-2 my-3 col-12 text-center'>Mensaje eliminado de la bandeja de entrada</h3>");
                break;
            case '_err_message_sent';
                print("<h3 class='text-danger fs-2 my-3 col-12 text-center'>Ha ocurrido un error al enviar el mensaje</h3>");
                break;
            case '_message_sent';
                print("<h3 class='text-success fs-2 my-3 text-center'>Mensaje enviado con éxito</h3>");
                break;
            case '_err_json_eliminado';
                print("<h3 class='text-danger fs-2 my-3 text-center'>Error al intentar eliminar el historial</h3>");
                break;
            case '_json_eliminado';
                print("<h3 class='text-success fs-2 my-3 text-center'>Historial eliminado con éxito</h3>");
                break;
            case '_del_err';
                print("Error al eliminar el usuario");
                break;
            case '_del_success';
                print("<h3 class='text-success fs-2 my-3 text-center'>Usuario eliminado con éxito</h3>");
                break;
            case 'len_err';
                print("<h3 class='text-success fs-2 my-3 text-center'>Error en longitudes en el formulario</h3>");
                break;
            default: 
                print("");
        }
    }

    if(isset($_GET['type'])){
        $type = $_GET['type'];
        switch ($type) {
            case '_my_messages':
                show_my_messages($mensajes_usuario);
                break;
            case '_status_chatbot':
                status_chatbot();
                break;
            case '_status_global':
                status_global();
                break;
            case '_update_articulo':
                update_articulos();
                break;
            case '_mostrar_articulos':
                mostrar_articulos();
                break;
            case '_users_maiteinance':
                show_users();
                break; 
            case '_mis_puntos':
                my_score();
                break; 
            case '_update_treatment':
                update_treatment();
                break; 
            case '_editar_tratamiento':
                edit_treatment();
                break;
            case '_upload_treatment':
                upload_treatment();
                break;
            case '_upload_articulo':
                upload_articulo();
                break;
            case '_nuevo_articulo':
                nuevo_articulo();
                break;     
            case '_nuevo_tratamiento':
                new_treatment();
                break;
            case '_mostrar_tratamientos':
                mostrar_tratamientos();
                break;
            case '_goods_maiteinance':
                mostrar_menu_mantenimiento();
                break;
            case '_mis_tratamientos':
                include('php/views/mis_tratamientos.php');
                break;
            case '_edit_user_info':
                modificar_datos_usuario_regitrado();
                break;
            case '_personal_corner':
                include('php/views/personal_corner.php');
                break;
            default:
                include('php/views/tratamientos_facial.html');
        }  
    }
    
include ('php/views/chat_bot.html');  
?>
</div>

</main>
<?php
    include ('php/views/footer.html');
?>
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>

        <!-- cookies JS File -->
        <script type="text/javascript" src="js/generic.js"></script>
        <!--chatBot JS File -->
        <script type="text/javascript" src="js/chatBot.js"></script>

        <script src="js/transition.js"></script>
        <script src="js/tablas.js"></script>
        <script src="js/upload_img.js"></script>
        <script src="bootstrap_css/js/bootstrap.bundle.min.js"></script>
        <script src="js/validity_form.js"></script>
        <script src="js/busqueda_selectiva.js"></script>

        <script src="assets/js/main.js"></script>
    </body>
</html>
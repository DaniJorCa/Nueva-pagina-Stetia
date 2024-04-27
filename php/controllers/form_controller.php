<?php
function check_contact_form(){
    require_once ('php/models/form_model.php');
    require_once('php/models/clases.php');
    check_contact_form_fields($_POST);
} 

function check_register_form(){
    require_once ('php/models/form_model.php');
    require_once('php/models/clases.php');
    check_register_form_fields($_POST);
} 


function modificar_datos_usuario_regitrado(){
    require_once ('php/models/form_model.php');
    require_once('php/models/clases.php');
    $registro_exitoso = modificar_usuario_registrado($_POST);
    if($registro_exitoso){
        echo "<h3 class='text-center text-success'>Actualizacion realizada con éxito</h3>";
    }else{
        echo "<h3 class='text-center text-success'>Error inesperado actualizando los datos</h3>";
    }
    include_once('php/views/personal_corner.php');
}
?>
<?php
require_once('php/models/clases.php');
//Buscamos los mensajes del usuario
$all_messages = Mensaje::get_all_messages();
$mensajes_usuario = [];
    foreach($all_messages as $message){
        if($message->getIdUser() == $_SESSION['user_log']->getId()){
            array_push($mensajes_usuario, $message);
        }
    }


function my_score(){
    require_once('php/models/clases.php');
    $con = Conexion::conectar_db();
    $usuario = Usuario::get_object_user_by_value($con, 'id', $_SESSION['user_log']->getId());

    include('php/views/mi_puntuacion.php');
}

function show_my_messages($mensajes_usuario){
    $con = Conexion::conectar_db();
    require_once('php/models/clases.php');

    if(isset($mensajes_usuario) && (count($mensajes_usuario)) != 0){
        $any_messages = true;
    }else{
        $any_messages = false;
    }

    if(isset($_GET['user_view'])){
        $id_mensaje_consultado = $_GET['user_view'];
        $show_message = show_message($id_mensaje_consultado);
        update_field_in_BBDD($con, 'mensajes', 'leido', 1, 'id', $id_mensaje_consultado);
    }else{
        $maxID = get_max_value_of_field('mensajes', 'id');
        $id_mensaje_consultado = $maxID['max_field'];
        $show_message = show_message($id_mensaje_consultado);
    }
    include('php/views/mis_mensajes.php');
}

function delete_mail(){
    $con = Conexion::conectar_db();

    $is_deleted = delete_object_from_table_by_value($con, 'mensajes', 'id', $_GET['id']);
    if($is_deleted){
        header('Location: home.php?type=_my_messages&msg=_mail_deleted');
        exit();
    }else{
        header('Location: home.php?type=_my_messages&msg=_err_mail_deleted');
        exit();
    }
    
}

function show_message($id){
    $con = Conexion::conectar_db();
    $show_message = Mensaje::get_object_good_by_value($con, 'id', $id);
    return $show_message;
}

function show_treatments(){
    require_once('php/models/clases.php');
    $jsonFilePath = 'utils/json/tratamientos_realizados.json';

    if (file_exists($jsonFilePath)) {
        // Leer el contenido del archivo JSON
        $jsonContent = file_get_contents($jsonFilePath);
        $all_treatments = Tratamiento::get_all_treatments();

        // Verificar si el contenido está vacío
        if (empty($jsonContent)) {
            $tratamientos = []; // Si el archivo está vacío, tratarlo como un array vacío
        } else {
            // Decodificar el contenido JSON en un array asociativo
            $tratamientos = json_decode($jsonContent, true);
            $tratamiento_usuario = [];
            // Verificar si la decodificación fue exitosa
            if (json_last_error() == JSON_ERROR_NONE) {
                foreach($tratamientos as $tratamiento){
                    if($tratamiento['user'] == $_SESSION['user_log']->getId()){
                        array_push($tratamiento_usuario, $tratamiento);
                    }
                }
            }
        }

    }
    
    include('php/views/mis_tratamientos.php');
}





?>
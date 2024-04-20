<?php

//Limpia los datos del formulario y comprueba si el email existe en la BBDD
function check_contact_form_fields(){
    $con = Conexion::conectar_db();
    require_once('php/models/clases.php');

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $p_apellido = filter_input(INPUT_POST, 'p_apellido', FILTER_SANITIZE_STRING);
    $s_apellido = filter_input(INPUT_POST, 's_apellido', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $consulta = filter_input(INPUT_POST, 'consultas', FILTER_SANITIZE_STRING);

    if (!exist_object_in_BBDD($con, 'usuarios', 'email', $email)){
        $any_max_len_values = len_values($_POST, 'usuarios');
        if($any_max_len_values == false){
            var_dump("<p class='text-center>Ha habido un error! Intente de nuevo <p>");
        }else{
            $tabla = "usuarios";
            $max_id = get_max_value_of_field('usuarios', 'id');
            $last_id = $max_id['max_field'] + 1;
            $usuario = new Usuario($last_id, $email, $nombre, $p_apellido, $s_apellido, $consulta);
            $id_insertado = insert_object_in_BBDD($con, $tabla, $usuario);
            if ($id_insertado){
                echo("<p class='text-center fs-4'>En breve nos pondremos en contacto contigo ". $usuario->getNombre(). "<p>");
            }else{
                echo("UUps!! Ha habido un error");
            }  
        }
        
    }else{
        $usuario = Usuario::get_object_user_by_value($con, 'consultas', $email);
        $value_updated = update_field_in_BBDD($con, 'usuarios', 'consultas', $consulta, 'email', $usuario->getEmail());
        var_dump("Consulta actualizada");
    }
}
?>
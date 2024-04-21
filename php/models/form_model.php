<?php

//Limpia los datos del formulario y comprueba si el email existe en la BBDD
function check_contact_form_fields(){
    if(!isset($con)){
        $con = Conexion::conectar_db();
    }
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
            var_dump($id_insertado);
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


function check_register_form_fields(){
    //limpiamos las variables del formulario
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $passwd = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_STRING);
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $p_apellido = filter_input(INPUT_POST, 'p_apellido', FILTER_SANITIZE_STRING);
    $s_apellido = filter_input(INPUT_POST, 's_apellido', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);

    //Validamos los datos sensibles como email
    $email_is_valid = Usuario::boolean_check_email($email);
       
    
    //Creamos el id y establecemos un nuevo usuario
    $max_id = get_max_value_of_field('usuarios', 'id');
    $last_id = $max_id['max_field'] + 1;
    $new_user = new Usuario($last_id, $email, $nombre, $p_apellido, $s_apellido, null, $passwd, null, $telefono, null, null, null, null, 0, null);

    if(!isset($con)){
        $con = Conexion::conectar_db();
    }

    if($email_is_valid){
        //comprobamos si existe el email en la BBDD
        $exist_email = exist_object_in_BBDD($con, 'usuarios', 'email', $email);
        if($exist_email){
            //nos traemos el usuario de la base de datos 
            $usuario = Usuario::get_object_user_by_value($con, 'email', $email);
            //comprobamos los datos que tiene rellenos en la base de datos para saber si hizo una consulta en su momento
            if($usuario->getPasswd() !== null){
                header('Location: login.php?msg=_user_exist');
                exit();
            }else{
                $update_user = new Usuario($usuario->getId(), $usuario->getEmail(),$usuario->getNombre(), $usuario->getP_apellido(), 
                                $usuario->getS_apellido(), null, $passwd, null, $telefono, null, null, null, null, 0, null);
                $is_update = update_object_in_BBDD($con, 'usuarios', $update_user, 'id', $usuario->getId());
                if($is_update){
                    header("Location: login.php?msg=_user_update");
                    exit();
                }else{
                    header("Location: login.php?msg=_err_update");
                    exit();
                }
            }
        }else{
            //Si todo esta bien introducimos el usuario en la base de datos
            insert_object_in_BBDD($con, 'usuarios', $new_user);
            header("Location: login.php?msg=_register_success");
            exit();
        }
    }else{
        header("Location: login.php?msg=_bad_email");
        exit();
    }    

}
?>
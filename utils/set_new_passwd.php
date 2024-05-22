<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

include_once('../php/models/clases.php');

if(isset($_POST['new_passwd']) && isset($_POST['repeat_new_passwd']) && isset($_SESSION['email_user_forgot_passwd'])){
    //Realizamos la conexion con la bbdd
    $con = Conexion::conectar_db();
    //Creamos un objeto usuario con el correo del usuario que hace la peticion de cambio de contrasenya
    $usuario = Usuario::get_object_user_by_value($con, 'email', $_SESSION['email_user_forgot_passwd']) ;
    //Seteamos el nuevo password al nuevo usuario creado
    $password_hash = password_hash($_POST['new_passwd'], PASSWORD_DEFAULT);
    $usuario->setPasswd($password_hash);
    //actualizamos el usuario en la base de datos
    $isUpdate = update_object_in_BBDD($con, 'usuarios', $usuario, 'email', $_SESSION['email_user_forgot_passwd']);
    if($isUpdate){
        $file_name = 'json/tokens.json';
        //abrimos de nuevo el json
        $json_data = file_get_contents($file_name);
        //Cremos un array con los datos
        $data_array = json_decode($json_data, true);
        //recorremos el array en busca del usuario que acaba de cambiar su contrasenya 
        foreach ($data_array as $user_data) {
            if (isset($user_data['email']) && $user_data['email'] !== $_SESSION['email_user_forgot_passwd']) {
                $nuevo_array[] = array('token' => $user_data['token'], 'email' => $user_data['email']);
            }
        }
        // Convertimos el nuevo array a JSON
        $nuevo_json_data = json_encode($nuevo_array, JSON_PRETTY_PRINT);

        // Escribimos el JSON de nuevo al archivo
        if (file_put_contents($file_name, $nuevo_json_data)) {
            header('Location ../login.php?msg=_new_passwd_updated')
        } else {
            echo "Hubo un error al actualizar el archivo JSON.";
        }
    }

}else{
    error_log("Error al modificar la contrasenya del usuario. \n",3,'../log/error.log'); 
}

?>
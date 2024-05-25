<?php
include_once('php/models/clases.php');
include_once('php/functions/generic_functions.php');


$con = Conexion::conectar_db();
//Buscamos el correo del usuario en la base de datos
$user_in_bbdd = Usuario::get_object_user_by_value($con, 'email', $_POST['email_new_passwd']);

if($user_in_bbdd){

   if(isset($_POST['email_new_passwd'])){

    //Preparamos el cuerpo del correo
        $image_url  = 'https://i.imgur.com/wF60JLO.png';
        $header = 'Recuperación de contraseña';
        $cuerpo = '
                <html>
                    <head>
                        <title>Recuperacion de contraseña Stetia</title>
                    </head>
                    <body>
                        
                        <h2 class="text-center">No sufras un despiste lo puede tener cualquiera</h2>
                        <img src="' . $image_url . '"style=height: 20px; width: 20px; alt="Imagen"/>
                        <p>ATENCIÓN: Si no has sido tu la que ha solicitado este cambio de contraseña puedes ignorar este mensaje</p>
                        <p>Pincha en el enlace para introducir una nueva contraseña</p>
                        <p class="text-center">Enlace --> <a href="http://localhost/Nueva%20Pagina%20Stetia/forgot_passwd.php?tkn=' . $token .'">aquí</a>.</p>
                    </body>
                </html>';
       
            
        $cabeceras = "MIME-Version: 1.0\r\n"; 
        $cabeceras .= "Content-type: text/html; charset=utf-8\r\n"; 
        $cabeceras .= "From: stetia@prueba.com"; 

        //Correo del destinatario
        $to = $_POST['email_new_passwd'];

        //Generamos un nuevo token
        $token = generar_new_token();

        //Alojamos la info del usuario en un Json
        $user_data = array(
            "token" => $token,
            "email" => $_POST['email_new_passwd']
        );

        $file_name = 'utils/json/tokens.json';
        
        /// Leer el contenido existente del archivo JSON
        if (file_exists($file_name)) {
            $json_data = file_get_contents($file_name);
            $data_array = json_decode($json_data, true);
            
            // Verificar si la decodificación fue exitosa
            if (json_last_error() !== JSON_ERROR_NONE) {
                $data_array = array(); // Iniciar como array vacío si hay un error en el JSON
            }
        } else {
            $data_array = array(); // Iniciar como array vacío si el archivo no existe
        }

        // Agregar la nueva información al array
        $data_array[] = $user_data;

        // Codificar el array actualizado a JSON
        $json_data = json_encode($data_array, JSON_PRETTY_PRINT);

        // Verificar si la codificación fue exitosa
        if (json_last_error() === JSON_ERROR_NONE) {
            // Guardar el JSON actualizado en el archivo
            if (file_put_contents($file_name, $json_data)) {
                echo "Datos guardados correctamente en $file_name";
            } else {
                echo "Error al guardar los datos";
            }
        } else {
            echo "Error al codificar los datos a JSON";
        }

        if(isset($_POST['email_new_passwd'])){
            
            $cuerpo .= $token;

            if($token != ""){
                $email = mail($to, $header, $cuerpo, $cabeceras);
                
                if ($email) { 
                    echo "Tus datos han sido enviados!";
                    header("Location: login.php?msg=_new_passwd_sent");
                    exit(); 
                } 
                else { 
                echo "Error al enviar formulario.";
                }
            }
        } 
    }else{
        header('Location: index.php');
        exit();
    } 

//si el usuario no existe en la bbdd no se le envia el correo
}else{
    header('Location: login.php?msg=_user_doesnt_exist');
    exit();
}




?>

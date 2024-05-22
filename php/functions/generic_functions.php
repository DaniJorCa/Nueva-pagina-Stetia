<?php
function generar_new_token($length = 20) {
    // Caracteres que se pueden utilizar en el token
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    // Longitud del conjunto de caracteres
    $chars_length = strlen($chars);
    // Inicializar el token
    $token = '';
    // Generar el token
    for ($i = 0; $i < $length; $i++) {
        $token .= $chars[rand(0, $chars_length - 1)];
    }
    return $token;
}



?>

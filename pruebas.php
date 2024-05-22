<?php
require_once('php/models/clases.php');
$con = Conexion::conectar_db();

$user = Usuario::get_object_user_by_value($con, 'email', 'madagajor@gmail.com');

var_dump($user);

?>
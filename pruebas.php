<?php
require_once('php/models/clases.php');
$con = Conexion::conectar_db();

$objeto_actual = Articulo::get_object_good_by_value($con, 'id', 1);
var_dump($objeto_actual);

?>
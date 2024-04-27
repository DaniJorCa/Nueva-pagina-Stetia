<?php
function mostrar_menu_mantenimiento(){
    require_once('php/models/clases.php');

    include('php/views/mtto_articulos.php');  
}

function mostrar_tratamientos(){
    require_once('php/models/clases.php');

    include('php/views/tratamientos_stetia.php');
}

function mostrar_articulos(){
    require_once('php/models/clases.php');

    include('php/views/productos_stetia.php');
}

function new_treatment(){
    require_once('php/models/clases.php');

    include('php/views/nuevo_tratamiento.php');
}

?>
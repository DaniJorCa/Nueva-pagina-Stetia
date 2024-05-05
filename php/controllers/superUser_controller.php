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

    include('php/views/articulos_stetia.php');
}

function new_treatment(){
    require_once('php/models/clases.php');

    include('php/views/nuevo_tratamiento.php');
}

function upload_treatment(){
    require_once('php/models/clases.php');

    $con = Conexion::conectar_db();
    $id = get_max_value_of_field('tratamientos', 'id')['max_field'];
    $precio_format = formatear_precio($_POST['precio']);
    if (!boolean_img_is_too_size($_FILES['imagen'])){
        if(check_and_compressed_image($_FILES['imagen'], 'img/treatments/'.$_FILES['imagen']['name'] , $calidad_compresion = 75)){
            $tratamiento = new Tratamiento($id + 1, $_POST['nombre'],$_POST['descripcion'],$precio_format,$_POST['zona_corp'], 'img/treatments/'.$_FILES['imagen']['name']);
            $registro_exitoso = insert_object_in_BBDD($con, 'tratamientos', $tratamiento);
            if($registro_exitoso){
                echo "<h3 class='text-center text-success'>Articulo creado con exito</h3>";
            }else{
                echo "<h3 class='text-center text-danger'>Error inesperado al crear el tratamiento</h3>";
            }
        }else{
            echo "<h3 class='text-center text-danger'>Solo aceptadas imagenes jpg / jpeg / png / gif</h3>";
        }
    }else{
        echo "<h3 class='text-center text-danger'>Archivo demasiado grande</h3>";
    }
    include('php/views/nuevo_tratamiento.php');
}

function edit_treatment(){
    require_once('php/models/clases.php');
    $con = Conexion::conectar_db();

    include('php/views/editar_tratamiento.php');
}

function update_treatment(){
    require_once('php/models/clases.php');
    $con = Conexion::conectar_db();
    //var_dump($_FILES['imagen']);
    //var_dump($_POST['precio']);
    $precio_format = formatear_precio($_POST['precio']);
    //var_dump($precio_format);
    if($_FILES['imagen']['name'] == ""){
        $img = $_SESSION['img_treatment_to_modify'];
        $tratamiento_editado = new Tratamiento($_SESSION['id_treatment_to_modify'], $_POST['nombre'],$_POST['descrip'], $precio_format ,$_POST['zona_corp'], $img, $_POST['baja']);
        //var_dump($tratamiento_editado);
        $actualizacion_exitosa = update_object_in_BBDD($con, 'tratamientos', $tratamiento_editado, 'id', $_SESSION['id_treatment_to_modify']);
        error_log("No existe $ files img. \n",3,'log/error.log');
    }else{
        $img = 'img/treatments/'.$_FILES['imagen']['name'];
        if (!boolean_img_is_too_size($_FILES['imagen'])){
            if(check_and_compressed_image($_FILES['imagen'], 'img/treatments/'.$_FILES['imagen']['name'] , $calidad_compresion = 30)){
                $tratamiento_editado = new Tratamiento($_SESSION['id_treatment_to_modify'], $_POST['nombre'],$_POST['descrip'], $precio_format ,$_POST['zona_corp'], $img, $_POST['baja']);
                $actualizacion_exitosa = update_object_in_BBDD($con, 'tratamientos', $tratamiento_editado, 'id', $_SESSION['id_treatment_to_modify'] );
                if($actualizacion_exitosa){
                    echo "<h3 class='text-center text-success'>Articulo modificado con exito</h3>";
                }else{
                    echo "<h3 class='text-center text-danger'>Error inesperado al modificar el tratamiento</h3>";
                }
            }else{
                echo "<h3 class='text-center text-danger'>Solo aceptadas imagenes jpg / jpeg / png / gif</h3>";
            }
        }else{
            echo "<h3 class='text-center text-danger'>Archivo demasiado grande</h3>";
        }
    }
    include('php/views/tratamientos_stetia.php');
}
?>
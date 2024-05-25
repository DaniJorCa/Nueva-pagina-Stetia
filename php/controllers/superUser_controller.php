<?php
function mostrar_menu_mantenimiento(){
    require_once('php/models/clases.php');

    include('php/views/mtto_articulos.php');  
}

function mostrar_tratamientos(){
    require_once('php/models/clases.php');
    require_once('php/pagination/tratXpag.php');
    $con = Conexion::conectar_db();
    $_SESSION['header'] = 'home.php?type=_mostrar_tratamientos&';
    $tratamientos = get_array_all_objects($con, 'tratamientos', 'Tratamiento', $inicio, $artXpag);

    include('php/views/tratamientos_stetia.php');
    require_once('php/pagination/pagination_control.php');
}

function mostrar_articulos(){
    require_once('php/models/clases.php');
    require_once('php/pagination/artsXpag.php');
    $_SESSION['header'] = 'home.php?type=_mostrar_articulos&';

    if($_SESSION['user_log']->getPerfil() == 1){
        $con = Conexion::conectar_db();
    
        if(isset($_GET['search_type']) && isset($_GET['search'])){
            $column = $_GET['search_type'];
            $value = $_GET['search'];
            $table = 'articulos';
            $obj_type = 'Articulo';
            $array_articulos = get_object_from_table_by_value($con, $obj_type, $table, $column, $value, $inicio, $artXpag);
        }else{
            $array_articulos = Articulo::get_all_articles($inicio, $artXpag);
        }
    }else{
        echo "<h4 class='fs-3 text-center'>OOOOppss!! Quizas esta seccion no es para ti..... Te invitamos a ir a nuestra sección de los tratamientos mas realizados</h4>";
    }

    if(isset($_GET['master_view_art']) && $_GET['master_view_art'] !== ""){
        $_SESSION['id_art_to_modify'] = $_GET['master_view_art'];
        $id = $_GET['master_view_art'];
        $articulo_consultado = Articulo::get_object_good_by_value($con, 'id', $id);
    }else{
        $id = get_max_value_of_field('articulos', 'id');
        $articulo_consultado = Articulo::get_object_good_by_value($con, 'id', $id['max_field']);
    }
 
      

      if(isset($_GET['baja'])){
        $usuario_consultado->setBaja(1);
        update_field_in_BBDD($con, 'usuarios', 'baja', 1, 'id', $usuario_consultado->getId());
      }
      if(isset($_GET['alta'])){
        $usuario_consultado->setBaja(0);
        update_field_in_BBDD($con, 'usuarios', 'baja', 0, 'id', $usuario_consultado->getId());
      }
      if(isset($_GET['superuser'])){
        $usuario_consultado->setPerfil(1);
        update_field_in_BBDD($con, 'usuarios', 'perfil', 1, 'id', $usuario_consultado->getId());
      }
      if(isset($_GET['not-superuser'])){
        $usuario_consultado->setPerfil(0);
        update_field_in_BBDD($con, 'usuarios', 'perfil', 0, 'id', $usuario_consultado->getId());
      }

    if(isset($_GET['show_lows'])){
        $array_articulos = get_object_from_table_by_dinamic_condition($con, 'Articulo', 'articulos', 'baja = 1', $inicio, $artXpag);
    }

    include('php/views/articulos_stetia.php');
    require_once('php/pagination/pagination_control.php');
}

function new_treatment(){
    require_once('php/models/clases.php');

    include('php/views/nuevo_tratamiento.php');
}

function nuevo_articulo(){
    require_once('php/models/clases.php');

    include('php/views/nuevo_articulo.php');
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

function upload_articulo(){
    require_once('php/models/clases.php');

    $con = Conexion::conectar_db();
    $id = get_max_value_of_field('articulos', 'id')['max_field'];
    $precio_format = formatear_precio($_POST['precio']);
    if($_FILES['imagen']['name'] !== ""){
      if (!boolean_img_is_too_size($_FILES['imagen'])){
        if(check_and_compressed_image($_FILES['imagen'], 'img/goods/'.$_FILES['imagen']['name'] , $calidad_compresion = 90)){
            $articulo = new Articulo($id + 1, $_POST['nombre'],$_POST['descrip'],$precio_format,$_POST['iva'],$_POST['dto'], 'img/treatments/'.$_FILES['imagen']['name']);
            $registro_exitoso = insert_object_in_BBDD($con, 'articulos', $articulo);
            if($registro_exitoso){
                echo "<h3 class='text-center text-success'>Articulo creado con exito</h3>";
            }else{
                echo "<h3 class='text-center text-danger'>Error inesperado al crear el articulo</h3>";
            }
        }else{
            echo "<h3 class='text-center text-danger'>Solo aceptadas imagenes jpg / jpeg / png / gif</h3>";
        }
        }else{
            echo "<h3 class='text-center text-danger'>Archivo demasiado grande</h3>";
        }  
    }else{
        $articulo = new Articulo($id + 1, $_POST['nombre'],$_POST['descrip'], $precio_format, $_POST['iva'], $_POST['dto'], "");
        //var_dump($articulo);
        $registro_exitoso = insert_object_in_BBDD($con, 'articulos', $articulo);
        if($registro_exitoso){
            echo "<h3 class='text-center text-success'>Articulo creado con exito</h3>";
        }else{
            echo "<h3 class='text-center text-danger'>Error inesperado al crear el articulo</h3>";
        }
    }
    mostrar_articulos();
}

function edit_treatment(){
    require_once('php/models/clases.php');
    $con = Conexion::conectar_db();
    $tratamiento_a_editar = Tratamiento::get_object_treatment_by_value($con, 'id', $_GET['id']);
    $_SESSION['id_treatment_to_modify'] = $_GET['id'];
    $_SESSION['img_treatment_to_modify'] = $tratamiento_a_editar->getImg();
    $id =  $id = get_max_value_of_field('tratamientos', 'id')['max_field'];
    include('php/views/editar_tratamiento.php');
}

function update_treatment(){
    require_once('php/models/clases.php');
    require_once('php/pagination/tratXpag.php');
    $con = Conexion::conectar_db();
    $_SESSION['header'] = 'home.php?type=_mostrar_tratamientos&';
    $tratamientos = get_array_all_objects($con, 'tratamientos', 'Tratamiento', $inicio, $artXpag);
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
    require_once('php/pagination/pagination_control.php');
}


function update_articulos(){
    error_log("Entrando en la funcion update_articulos. " .$_SESSION['id_art_to_modify']."\n",3,'log/error.log');

    require_once('php/models/clases.php');
    $con = Conexion::conectar_db();
    $objeto_actual = Articulo::get_object_good_by_value($con, 'id', $_SESSION['id_art_to_modify']);

    $precio_format = formatear_precio($_POST['precio']);
    error_log("Usuario actual ".$precio_format. "\n",3,'log/error.log');
    if($_FILES['imagen']['name'] == ""){
        $img = $objeto_actual->getImg();
        $articulo_editado = new Articulo($_SESSION['id_art_to_modify'], $_POST['nombre'],$_POST['descrip'], $precio_format ,$_POST['iva'], $_POST['dto'], $img, $_POST['baja']);
        //var_dump($tratamiento_editado);
        $actualizacion_exitosa = update_object_in_BBDD($con, 'articulos', $articulo_editado, 'id', $_SESSION['id_art_to_modify']);
        error_log("No existe $ files img. \n",3,'log/error.log');
    }else{
        $img = 'img/art/'.$_FILES['imagen']['name'];
        if (!boolean_img_is_too_size($_FILES['imagen'])){
            if(check_and_compressed_image($_FILES['imagen'], 'img/art/'.$_FILES['imagen']['name'] , $calidad_compresion = 30)){
                $articulo_editado = new Articulo($_SESSION['id_art_to_modify'], $_POST['nombre'],$_POST['descrip'], $precio_format , $_POST['iva'], $_POST['dto'], $img, $_POST['baja']);
                $actualizacion_exitosa = update_object_in_BBDD($con, 'articulos', $articulo_editado, 'id', $_SESSION['id_art_to_modify'] );
                if($actualizacion_exitosa){
                    echo "<h3 class='text-center text-success'>Articulo modificado con exito</h3>";
                }else{
                    echo "<h3 class='text-center text-danger'>Error inesperado al modificar el articulo</h3>";
                }
            }else{
                echo "<h3 class='text-center text-danger'>Solo aceptadas imagenes jpg / jpeg / png / gif</h3>";
            }
        }else{
            echo "<h3 class='text-center text-danger'>Archivo demasiado grande</h3>";
        }
    }
    mostrar_articulos();
}


function show_users(){
    $_SESSION['header'] = 'home.php?type=_users_maiteinance&';
    require_once 'php/pagination/artsXpag.php';
    require_once('php/models/clases.php');
    if($_SESSION['user_log']->getPerfil() == 1){
        $con = Conexion::conectar_db();
    
        if(isset($_GET['search_type']) && isset($_GET['search'])){
            $column = $_GET['search_type'];
            $value = $_GET['search'];
            $table = 'usuarios';
            $obj_type = 'Usuario';
            $array_usuarios = get_object_from_table_by_value($con, $obj_type, $table, $column, $value, $inicio, $artXpag);
        }else{
            $array_usuarios = get_array_all_objects($con, 'usuarios', 'Usuario', $inicio, $artXpag);
        }


        if(isset($_GET['master_view_user']) && $_GET['master_view_user'] !== ""){
                $id = $_GET['master_view_user'];
            }else{
                $id = $_SESSION['user_log']->getId();
            }
            
            $usuario_consultado = Usuario::get_object_user_by_value($con, 'id', $id);

            if(isset($_GET['baja'])){
                $usuario_consultado->setBaja(1);
                update_field_in_BBDD($con, 'usuarios', 'baja', 1, 'id', $usuario_consultado->getId());
            }
            if(isset($_GET['alta'])){
                $usuario_consultado->setBaja(0);
                update_field_in_BBDD($con, 'usuarios', 'baja', 0, 'id', $usuario_consultado->getId());
            }
            if(isset($_GET['superuser'])){
                $usuario_consultado->setPerfil(1);
                update_field_in_BBDD($con, 'usuarios', 'perfil', 1, 'id', $usuario_consultado->getId());
            }
            if(isset($_GET['not-superuser'])){
                $usuario_consultado->setPerfil(0);
                update_field_in_BBDD($con, 'usuarios', 'perfil', 0, 'id', $usuario_consultado->getId());
            }

                if(isset($_GET['show_masters']) && isset($_GET['show_lows'])){
                    $array_usuarios = get_object_from_table_by_dinamic_condition($con, 'Usuario', 'usuarios', 'perfil = 1 and baja = 1', $inicio, $artXpag);
                }elseif(isset($_GET['show_masters'])){
                    $array_usuarios = get_object_from_table_by_value($con, 'Usuario', 'usuarios', 'perfil', 1, $inicio, $artXpag);
                }elseif(isset($_GET['show_lows'])){
                    $array_usuarios = get_object_from_table_by_value($con, 'Usuario', 'usuarios', 'baja', 1, $inicio, $artXpag);  
                }
                
                include('php/views/mto_usuarios.php');
                if(!isset($_GET['viewer'])){
                    include ('php/pagination/pagination_control.php');
                }
    }else{
        echo "<h4 class='fs-3 text-center'>OOOOppss!! Quizas esta seccion no es para ti..... Te invitamos a ir a nuestra sección de los tratamientos mas realizados</h4>";
    }

    

    }
    function delete_user(){
        try{
            $con = Conexion::conectar_db();
            $id_delete = $_GET['id'];
            if(delete_object_from_table_by_value($con, 'usuarios', 'id', $id_delete )){
                header('Location: home.php?type=_users_maiteinance&msg=_del_success');
                exit();
            }else{
                header('Location: home.php?type=_users_maiteinance&msg=_del_err');
                exit();
            }
        }catch (PDOException $e){
            error_log("Error al eliminar el usuario superUser_Controller fn->delete_user. \n". $e,3,'log/error.log');
            header('Location: home.php?type=_users_maiteinance&msg=_del_err');
            exit();
        }
    }

    function status_global(){
        require('php/views/status_global.php');
    }

    function status_chatbot(){


        require('php/views/status_chatbot.html');
    }

function send_message(){
    $con = Conexion::conectar_db();
    $mensaje = new Mensaje($_POST['id_user'], $_POST['user_message']);
    $is_inserted = insert_object_in_BBDD($con, 'mensajes', $mensaje);

    if($is_inserted){
        header('Location: home.php?type=_users_maiteinance&msg=_message_sent');
        exit();
    }else{
        header('Location: home.php?type=_users_maiteinance&msg=_err_message_sent');
        exit();
    }

}
?>
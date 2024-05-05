<?php
function my_score(){
    require_once('php/models/clases.php');

    include('php/views/mi_puntuacion.php');
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
    }else{
        echo "<h4 class='fs-3 text-center'>OOOOppss!! Quizas esta seccion no es para ti..... Te invitamos a ir a nuestra sección de los tratamientos mas realizados</h4>";
    }

    if(isset($_GET['master_view_user'])){
        $id = $_GET['master_view_user'];
      }else{
        $id = 1;
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

    
    
}


?>
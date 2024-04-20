<?php

include('php/models/clases.php');
function insertar_usuario_en_BD($usuario) {
    try {
        require_once('php/conection/conectar_BD.php');
        $con = conexion_BD();
        $stmt = $con->prepare('INSERT INTO usuarios (id, email, passwd, nombre, p_apellido, s_apellido, dni, telefono, direccion, provincia, localidad, cod_postal, perfil, consultas) 
                        VALUES (:id, :email, :passwd, :nombre, :primer_apellido, :segundo_apellido, :dni, :telefono, :direccion, :provincia, :localidad, :cod_postal, :perfil, :consultas)');
        
        // Obtener propiedades del objeto Usuario
        $id = $usuario->getId();
        $email = $usuario->getEmail();
        $passwd = $usuario->getPasswd();
        $nombre = $usuario->getNombre();
        $primer_apellido = $usuario->getP_apellido(); 
        $segundo_apellido = $usuario->getS_apellido(); 
        $dni = $usuario->getDni();
        $telefono = $usuario->getTelefono();
        $direccion = $usuario->getDireccion();
        $provincia = $usuario->getProvincia();
        $localidad = $usuario->getLocalidad();
        $cod_postal = $usuario->getCodPostal();
        $perfil = $usuario->getPerfil();
        $consultas = $usuario->getConsultas();
        
        // Ejecutar la consulta preparada
        $stmt->execute(array(
            ':id' => $id,
            ':email' => $email,
            ':passwd' => $passwd,
            ':nombre' => $nombre,
            ':primer_apellido' => $primer_apellido,
            ':segundo_apellido' => $segundo_apellido,
            ':dni' => $dni,
            ':telefono' => $telefono,
            ':direccion' => $direccion,
            ':provincia' => $provincia,
            ':localidad' => $localidad,
            ':cod_postal' => $cod_postal,
            ':perfil' => $perfil,
            ':consultas' => $consultas
        ));

        // Verificar si se insertó correctamente
        if ($stmt->rowCount() == 1) {
            return 'Inserción correcta';
        } else {
            return 'Error al insertar usuario';
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}



//$dani = new Usuario(4, 'daniel.jorca@gmail.com', 'Perico', 'Sancho','To Eso',null ,null ,null ,null ,null ,null ,null ,0, 'Prueba de');
//$nombre = $dani->getNombre();

//var_dump(insertar_usuario_en_BD($dani));

        //$id_insertado = insert_object_in_BBDD($con, $tabla, $usuario);



        $con = Conexion::conectar_db();
        var_dump(update_field_in_BBDD($con, 'usuarios', 'consultas', 'Ahora cambio el valor', 'consultas', "Prueba de"));

?>
<?php

include "utils.php";
$con = conectar_db();

if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    print_r($_SERVER['REQUEST_METHOD']);

    if (isset($_GET['id'])){
      //Mostrar una entrada
      $sql = $con->prepare("SELECT * FROM usuarios where id=:id");
      $sql->bindValue(':id', $_GET['id']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC));
      exit();
	  }
    else {
      //Mostrar todas las entradas
      $sql = $con->prepare("SELECT * FROM usuarios");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit();
	  }
}

// Crear una entrada
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{if ($con) {
    $input = $_POST;
    $sql = "INSERT INTO usuarios
          (id, nombre, p_apellido, s_apellido,
          email, dni, direccion, provincia,
          localidad, perfil)
          VALUES
          (:id, :nombre, :p_apellido, :s_apellido,
          :email, :dni, :direccion, :provincia,
          :localidad, :perfil)";
    $statement = $con->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $con->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
    }
	 }
}

//Borrar una entrada
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    $id = $_GET['id'];
    $statement = $con->prepare("DELETE FROM usuarios where id=:id");
    $statement->bindValue(':id', $id);
    $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}

//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);
    $sql = " UPDATE usuarios
          SET $fields
          WHERE id='$postId'
           ";

    $statement = $con->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>
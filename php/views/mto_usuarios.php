<div id="spinner" style="display: none; height: 100vh; justify-content: center; align-items: center;">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Cargando</span>
    </div>
</div>
<div id='table_hidden_spinner'>
<div class='d-flex justify-content-center'>
  <img src="img/icons/clientela.png" class="icon">
  <h1 class="text-center titulo_h1">Listado de Usuarios</h1>
</div>
<h3 class="text-center mb-3">Aqui puedes modificar los usuarios registrados</h3>
  <div class='row d-flex container-fluid justify-content-end align-center align-items-center mb-4'>
      <div class= 'col-12 align-middle d-flex justify-content-between align-items-center'>
        <div class='row col-1'>
          <button class='btn btn-white col-1 align-middle mx-1s mx-2' id='show_detail'><i class="fa-solid fa-expand" style="color: #831959; font-size: 1.3em;"></i></button>
          <button class='btn btn-white col-1 align-middle mx-1s mx-2' id='show_list'><i class="fa-solid fa-table-list" style="color: #831959; font-size: 1.3em;"></i></button>
        </div>
        <div class='row col-10 align-items-center'>
          <select id='type-select' class="custom-select custom-select-sm col-2 form-select-sm">
              <option value='dni' selected>DNI</option>
              <option value='nombre'>Nombre</option>
              <option value='primer_apellido'>Primer Apellido</option>
              <option value='telefono'>Teléfono</option>
              <option value='email'>Email</option>
          </select>
          <input class='col-3 mx-2 bg-white border border-success align-middle form-control-sm' id='search' placeholder='¿Buscas algo en concreto?'>
          <a id='btn_search' class='btn btn-primary col-3 align-middle mx-1 btn-cta'>Búsqueda Selectiva</a>
          <a class='btn btn-primary col-3 align-middle mx-1s btn-cta' href='home.php?type=_users_maiteinance'>Mostrar Todos</a>
        </div>
      </div>
      <div class='d-flex justify-content-end flex-row'>
        <label class='me-3'>
            <input type="checkbox" id="checkboxMaster"> Usuarios Master
        </label>
        <br>
        <label class='mx-4'>
            <input type="checkbox" id="checkboxBaja"> Usuarios de Baja
        </label>
      </div>
  </div>

<?php
if(!isset($_GET['viewer'])){
?>
<div class="table-responsive my-4" id='table-usuarios'>
  <table class="table table-striped table-hover" id='table'>
  <caption>Listado de usuarios</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">P. apellido</th>
      <th scope="col">DNI</th>
      <th scope="col">Telefono</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
<?php
  foreach ($array_usuarios as $usuario) {
      echo '<tr>';
      echo '<th scope="row">'.$usuario->getId().'</th>';
      echo '<td>'.$usuario->getNombre(). '</td>';
      echo '<td>'.$usuario->getP_apellido(). '</td>';
      echo '<td>' .$usuario->getDni().'</td>';
      echo '<td>'.$usuario->getTelefono(). '</td>';
      echo '<td>' .$usuario->getEmail().'</td>';
      echo '</tr>';
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
}
?>
</div>

<?php
if(isset($_GET['viewer']) && $_GET['viewer'] == 'detail'){
?>
<div id='card-usuario' class='row col-12' >
  <div class="row col-12">
      <div id = "formulario_home">
          <div class="contact-form-container row">
              <div class="contact-us row">
                  <div class="contact-header row d-flex flex-column">
                      <div class="my-5 row col-12" id="user_picture" style="padding-right: 0px;">
                          <?php if (!empty($usuario_consultado->getImg())): ?>
                              <img class="upload_img" src="<?php echo $usuario_consultado->getImg(); ?>" alt="Imagen actual" id="current-image" style="padding-right: 0px;" >
                          <?php else: ?>
                              <img id="preview" class="upload_img" src="img/background/home_user.png" alt="Vista Previa de Imagen" >
                          <?php endif; ?>
                      </div>
                      <div class='pers-corner col-12'>
                          <h1>&#9135;&nbsp;&nbsp;Consulta de usuario</h1>
                      </div>
                  </div>
                  <div class="social-bar">
                      <ul>
                          <li>
                              <img src="img/logo_stetia.png" style="width: 90px; height= 90px; position: relative; right: 45px; bottom: 15px;"></img>
                          </li>
                      </ul>
                  </div>
              </div>
              <div class="contact-form">
                  <div class="header">
                      <h1>Hola Administrador</h1>
                      <h2 class="text-center">Consulta de usuarios</h2>
                  </div>
                          <h3>Información del usuario</h3>
                          <ul class="list-group">
                          <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">ID</div>
                                <?php if($usuario_consultado->getId() !== ''){ echo $usuario_consultado->getId(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Nombre</div>
                                <?php if($usuario_consultado->getNombre() !== ''){ echo $usuario_consultado->getNombre(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Primer Apellido</div>
                                <?php if($usuario_consultado->getP_apellido() !== ''){ echo $usuario_consultado->getP_apellido(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Segundo Apellido</div>
                                <?php if($usuario_consultado->getS_apellido() !== null){ echo $usuario_consultado->getS_apellido(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Email</div>
                                <?php if($usuario_consultado->getEmail() !== null){ echo $usuario_consultado->getEmail(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">DNI</div>
                                <?php if($usuario_consultado->getDni() !== null){ echo $usuario_consultado->getDni(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Teléfono</div>
                                <?php if($usuario_consultado->getTelefono() !== null){ echo $usuario_consultado->getTelefono(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Dirección</div>
                                <?php if($usuario_consultado->getDireccion() !== null){ echo $usuario_consultado->getDireccion(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Provincia</div>
                                <?php if($usuario_consultado->getProvincia() !== null){ echo $usuario_consultado->getProvincia(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Localidad</div>
                                <?php if($usuario_consultado->getLocalidad() !== null){ echo $usuario_consultado->getLocalidad(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Código Postal</div>
                                <?php if($usuario_consultado->getCodPostal() !== null){ echo $usuario_consultado->getCodPostal(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Puntos</div>
                                <?php if($usuario_consultado->getPuntos() !== null){ echo $usuario_consultado->getPuntos(); }else{ echo "*************";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Baja</div>
                                <?php if($usuario_consultado->getBaja() === 0){ echo "Usuario activo"; } else{ echo "Usuario de baja";} ?>
                              </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <div class="fw-bold">Perfil Usuario</div>
                                <?php if($usuario_consultado->getPerfil() === 0){ echo "Normal"; } else{ echo "Usuario Master";} ?>
                              </div>
                            </li>
                          </ul>
                          <?php if($usuario_consultado->getId() !== $_SESSION['user_log']->getId()) {?>
                            <div>
                              <button class='btn btn-danger col-4 align-middle mx-1 my-3 ' type="button" id="delete_user"><i class="fa-regular fa-trash-can mx-2" style="color: #ffffff;" ></i>Eliminar Usuario</button>
                              <?php
                              if(isset($usuario_consultado) && $usuario_consultado->getPerfil() === 0){
                                echo '<button class="btn  col-4 align-middle mx-1 my-3 btn-cta" type="button" id="superuser"><i class="fa-solid fa-mask mx-2" style="color: #ffffff;"></i>Superusuario</button>';
                              }else{
                                echo '<button class="btn  col-4 align-middle mx-1 my-3 btn-cta" type="button" id="not-superuser"><i class="fa-solid fa-bomb mx-2" style="color: #ffffff;"></i>Usuario</button>';
                              }
                              ?>
                              <?php
                              if(isset($usuario_consultado) && $usuario_consultado->getBaja() === 0){
                                echo "<button type='button' class='btn  col-3 align-middle mx-1 my-3 btn-warning' id='user_baja'><i class='fa-solid fa-ghost mx-2' style='color: #000000;'></i>Dar de Baja</button>";
                              }else{
                                echo "<button type='button' class='btn btn-outline-warning col-3 align-middle mx-1 mx-3' id='user_alta'><i class='fa-solid fa-heart-pulse mx-2' style='color: #000000;'></i>Dar de Alta</button>";
                              }
                              ?>
                            </div>
                          <?php } ?>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="row col-12 justify-content-center" id='eliminar_usuario'>
  <div class='col-8 border d-flex flex-column'>
    <p class="fs-2 text-center col-12">Realmente desea eliminar el usuario <?php echo $usuario_consultado->getNombre() ?></p>
    <span class="d-flex col-12 justify-content-center">
      <button type='button' class='btn  col-3 align-middle mx-1 my-3 btn-warning' id='del_user'><i class="fa-solid fa-skull-crossbones mx-3" style='color: #000000;'></i></i>Eliminar</button>
      <button type='button' class='btn  col-3 align-middle mx-1 my-3 btn-success' id='save_life_user'><i class="fa-solid fa-heart-pulse mx-3" style='color: #ffffff;'></i></i>Cancelar</button>
    </span>                         
  </div>
</div>
<?php
}
?>


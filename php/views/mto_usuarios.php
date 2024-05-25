<div id="ocultar_generico">
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
        <h3 class="text-center mb-3">Aquí puedes modificar los usuarios registrados</h3>
        <div class='row d-flex container-fluid justify-content-end align-center align-items-center mb-4'>
            <div class='col-12 align-middle d-flex justify-content-between align-items-center'>
                <div class='row col-1'>
                    <button class='btn btn-white col-1 align-middle mx-1s mx-2' id='show_detail'>
                        <i class="fa-solid fa-expand" style="color: #831959; font-size: 1.3em;"></i>
                    </button>
                    <button class='btn btn-white col-1 align-middle mx-1s mx-2' id='show_list'>
                        <i class="fa-solid fa-table-list" style="color: #831959; font-size: 1.3em;"></i>
                    </button>
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
                        <th scope="col">Teléfono</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($array_usuarios as $usuario) {
                        if($usuario->getID() != $_SESSION['user_log']->getID()){
                            echo '<tr>';
                            echo '<th scope="row">'.$usuario->getId().'</th>';
                            echo '<td>'.$usuario->getNombre(). '</td>';
                            echo '<td>'.$usuario->getP_apellido(). '</td>';
                            echo '<td>' .$usuario->getDni().'</td>';
                            echo '<td>'.$usuario->getTelefono(). '</td>';
                            echo '<td>' .$usuario->getEmail().'</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        }
        ?>
    </div>

    <?php
    if(isset($_GET['viewer']) && $_GET['viewer'] == 'detail'){
    ?>
    <div class="flex-column flex-lg-row" id="div_especification_user">
        <div id='card-usuario' class='d-flex flex-column col-12 col-lg-8 justify-content-center'>
            <div class="row col-12 formulario_home">
                <div id="formulario_home" class="contact-form-container d-flex col-12 flex-column flex-lg-row">
                    <div class="contact-form-container d-flex col-12 flex-column flex-lg-row">
                        <div class="contact-us col-12 col-lg-4 d-flex flex-row justify-content-evenly">
                            <div class="contact-header row d-flex flex-column col-lg-4">
                                <div class="m-3 row col-12 d-flex justify-content-center" id="user_picture" style="padding-right: 0px;">
                                    <?php if (!empty($usuario_consultado->getImg())): ?>
                                        <img class="upload_img" src="<?php echo $usuario_consultado->getImg(); ?>" alt="Imagen actual" id="current-image" style="padding-right: 0px;">
                                    <?php else: ?>
                                        <img id="preview" class="upload_img" src="img/background/home_user.png" alt="Vista Previa de Imagen">
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
                        <div class="contact-form row col-12 col-lg-8 m-2 d-flex flex-column">
                            <div class="header">
                                <h1>Hola Administrador</h1>
                                <h2 class="text-center">Consulta de usuarios</h2>
                            </div>
                            <h3>Información del usuario</h3>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">ID</div>
                                        <?php echo $usuario_consultado->getId() !== '' ? $usuario_consultado->getId() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Nombre</div>
                                        <?php echo $usuario_consultado->getNombre() !== '' ? $usuario_consultado->getNombre() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Primer Apellido</div>
                                        <?php echo $usuario_consultado->getP_apellido() !== '' ? $usuario_consultado->getP_apellido() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Segundo Apellido</div>
                                        <?php echo $usuario_consultado->getS_apellido() !== null ? $usuario_consultado->getS_apellido() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Email</div>
                                        <?php echo $usuario_consultado->getEmail() !== null ? $usuario_consultado->getEmail() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">DNI</div>
                                        <?php echo $usuario_consultado->getDni() !== null ? $usuario_consultado->getDni() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Teléfono</div>
                                        <?php echo $usuario_consultado->getTelefono() !== null ? $usuario_consultado->getTelefono() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Dirección</div>
                                        <?php echo $usuario_consultado->getDireccion() !== null ? $usuario_consultado->getDireccion() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Provincia</div>
                                        <?php echo $usuario_consultado->getProvincia() !== null ? $usuario_consultado->getProvincia() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Localidad</div>
                                        <?php echo $usuario_consultado->getLocalidad() !== null ? $usuario_consultado->getLocalidad() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Código Postal</div>
                                        <?php echo $usuario_consultado->getCodPostal() !== null ? $usuario_consultado->getCodPostal() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Puntos</div>
                                        <?php echo $usuario_consultado->getPuntos() !== null ? $usuario_consultado->getPuntos() : "*************"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Baja</div>
                                        <?php echo $usuario_consultado->getBaja() === 0 ? "Usuario activo" : "Usuario de baja"; ?>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">Perfil Usuario</div>
                                        <?php echo $usuario_consultado->getPerfil() === 0 ? "Normal" : "Usuario Master"; ?>
                                    </div>
                                </li>
                            </ul>
                            <?php if($usuario_consultado->getId() !== $_SESSION['user_log']->getId()) { ?>
                                <div>
                                    <button class='btn btn-danger col-12 align-middle mx-1 my-3' type="button" id="delete_user">
                                        <i class="fa-regular fa-trash-can mx-2" style="color: #ffffff;"></i>Eliminar Usuario
                                    </button>
                                    <?php if(isset($usuario_consultado) && $usuario_consultado->getPerfil() === 0) { ?>
                                        <button class="btn col-12 align-middle mx-1 my-3 btn-cta" type="button" id="superuser">
                                            <i class="fa-solid fa-mask mx-2" style="color: #ffffff;"></i>Superusuario
                                        </button>
                                    <?php } else { ?>
                                        <button class="btn col-12 align-middle mx-1 my-3 btn-cta" type="button" id="not-superuser">
                                            <i class="fa-solid fa-bomb mx-2" style="color: #ffffff;"></i>Usuario
                                        </button>
                                    <?php } ?>
                                    <?php if(isset($usuario_consultado) && $usuario_consultado->getBaja() === 0) { ?>
                                        <button type='button' class='btn col-12 align-middle mx-1 my-3 btn-warning' id='user_baja'>
                                            <i class='fa-solid fa-ghost mx-2' style='color: #000000;'></i>Dar de Baja
                                        </button>
                                    <?php } else { ?>
                                        <button type='button' class='btn btn-outline-warning col-12 align-middle mx-1 mx-3' id='user_alta'>
                                            <i class='fa-solid fa-heart-pulse mx-2' style='color: #000000;'></i>Dar de Alta
                                        </button>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center col-12 col-lg-3">
            <div class="row justify_content-center col-12">
                <button type='button' class='fs-3 btn btn-outline-dark col-12 align-middle mx-1 mx-3 my-2'>
                    <i class='fa-solid fa-gifts mx-2 fs-2' style='color: #831959;'></i>Asignar puntos
                </button>
                <button type='button' class='fs-3 btn btn-outline-dark col-12 align-middle mx-1 mx-3 my-2'>
                    <i class='fa-solid fa-hand-holding-medical mx-2 fs-2' style='color: #831959;'></i>Asignar Tto. Realizado
                </button>
                <button type='button' class='fs-3 btn btn-outline-dark col-12 align-middle mx-1 mx-3 my-2' id='btn_send_user_message'>
                    <i class='fa-solid fa-envelope mx-2 fs-2' style='color: #831959;'></i>Enviar Mensaje
                </button>
            </div>
        </div>
    </div>

    <div class="row col-12 justify-content-center" id='eliminar_usuario'>
        <div class='col-8 border d-flex flex-column'>
            <p class="fs-2 text-center col-12">Realmente desea eliminar el usuario <?php echo $usuario_consultado->getNombre() ?></p>
            <span class="d-flex col-12 justify-content-center">
                <button type='button' class='btn col-3 align-middle mx-1 my-3 btn-warning' id='del_user'>
                    <i class="fa-solid fa-skull-crossbones mx-3" style='color: #000000;'></i>Eliminar
                </button>
                <button type='button' class='btn col-3 align-middle mx-1 my-3 btn-success' id='save_life_user'>
                    <i class="fa-solid fa-heart-pulse mx-3" style='color: #ffffff;'></i>Cancelar
                </button>
            </span>
        </div>
    </div>
</div>
    <?php
    } 
    
    include_once('php/views/window_send_user_message.php');
    echo '</div>';
    ?>

 
<div class="d-flex flex-column col-12 col-xl-10 justify-content-center">
    <div id = "formulario_home">
        <div class="contact-form-container d-flex col-12 flex-column flex-lg-row">
            <div class="contact-us col-12 col-lg-3 d-flex flex-row justify-content-evenly">
                <div class="contact-header row d-flex flex-column col-lg-4">
                    <div class="m-3 row col-12 d-flex justify-content-center" id="personal_picture">
                        <?php if (!empty($_SESSION['user_log']->getImg())): ?>
                            <img class="upload_img" id="preview" src="<?php echo $_SESSION['user_log']->getImg(); ?>" alt="Imagen actual" id="current-image" >
                        <?php else: ?>
                            <img id="preview" class="upload_img col-12" src="img/background/home_user.png" alt="Vista Previa de Imagen">
                        <?php endif; ?>

                        <div class="row col-12 d-flex justify-content-end align-items-end flex-column">
                        <form id="form_edit_personal_userFields" class="needs-validation" method="POST" action ="home.php?type=_edit_user_info" enctype="multipart/form-data" novalidate>
                        
                        <!-- Input de tipo file para cargar una nueva imagen -->
                        <input type="file" name="imagen" id="imagen" style="display: none;" onchange="showPreview()">
                        <label for="imagen">
                            <i class="fa-solid fa-upload" data-toggle="tooltip" data-placement="bottom" title="Subir imágen" style="color: #0c8494;"></i>
                        </label>
                        </div>
                    </div>
                    <div class='pers-corner col-12 justify-content-center'>
                        <h1>&#9135;&nbsp;&nbsp;Personal corner</h1>
                    </div>
                </div>
                <div class="social-bar col-12 d-flex justify-content-center">
                    <ul>
                        <li>
                            <img src="img/logo_stetia.png" style="width: 90px; height= 90px; position: relative; right: 45px; bottom: 15px;"></img>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="contact-form row col-12 col-lg-9 m-2 d-flex flex-column">
                <div class="header col-12">
                    <h1>Ponte cómoda</h1>
                    <h2 class="text-center">Este es tu rinconcito en Stetia</h2>
                </div>
                        <h3>Modifica tus datos personales</h3>
                        <div class="input-group input-group-md my-3 row">
                            <label for="validationCustom01" class="form-label col-12">Nombre</label>
                            <input class="form-control" type="name" name="nombre" aria-label="default input example" value="<?php if($_SESSION['user_log']->getNombre() != ''){ echo $_SESSION['user_log']->getNombre(); }else{ null;} ?>"/>
                        </div>
                        <div class="input-group input-group-md my-3 row">  
                        <label for="validationCustom01" class="form-label col-12">Primer Apellido</label>  
                        <input class="form-control" type="text" name="p_apellido" value="<?php if($_SESSION['user_log']->getP_apellido() != ''){ echo $_SESSION['user_log']->getP_apellido(); }else{ null;} ?>" />
                        </div>
                        <div class="input-group input-group-md my-3 row">
                        <label for="validationCustom01" class="form-label col-12">Segundo Apellido</label>
                        <input class="form-control" type="text" name="s_apellido" value="<?php if($_SESSION['user_log']->getS_apellido() != null){ echo $_SESSION['user_log']->getS_apellido(); }else{ null;} ?>" type="text" />
                        
                        </div>
                        <div class="input-group input-group-md my-3 row">
                        <label for="validationCustom01" class="form-label col-12">Dni</label>
                        <input class="form-control" pattern="[0-9]{8}[A-Za-z]" type="text" name="dni" value="<?php if($_SESSION['user_log']->getDni() != null){ echo $_SESSION['user_log']->getDni(); }else{ null;} ?>" type="email" />
                        <div class="valid-feedback">
                                DNI válido
                            </div>
                            <div class="invalid-feedback">
                                DNI inválido 8 numeros y 1 letra
                            </div>
                        </div>
                        <div class="input-group input-group-md my-3 row">
                        <label for="validationCustom01" class="form-label col-12">Teléfono</label>
                        <input class="form-control" pattern="[0-9]{9}" type="text" name="telefono" value="<?php if($_SESSION['user_log']->getTelefono() != null){ echo $_SESSION['user_log']->getTelefono(); }else{ null;} ?>" type="text" />
                        <div class="valid-feedback">
                                Telefono válido
                            </div>
                            <div class="invalid-feedback">
                                Telefono inválido introduce uno de 9 digitos
                            </div>
                        </div>
                        <div class="input-group input-group-md my-3 row">
                        <label for="validationCustom01" class="form-label col-12">Dirección</label>
                        <input class="form-control" type="text" name="direccion" value="<?php if($_SESSION['user_log']->getDireccion() != null){ echo $_SESSION['user_log']->getDireccion(); }else{ null;} ?>"/>
                       
                        </div>
                        <div class="input-group input-group-md my-3 row">
                        <label for="validationCustom01" class="form-label col-12">Provincia</label>
                        <input class="form-control" type="text" name="provincia" value="<?php if($_SESSION['user_log']->getProvincia() != null){ echo $_SESSION['user_log']->getProvincia(); }else{ null;} ?>"/>
                      
                        </div>
                        <div class="input-group input-group-md my-3 row">
                        <label for="validationCustom01" class="form-label col-12">Localidad</label>
                        <input class="form-control" type="text" name="localidad" value="<?php if($_SESSION['user_log']->getLocalidad() != null){ echo $_SESSION['user_log']->getLocalidad(); }else{ NULL;} ?>"/>
                        
                        </div> 
                        <div class="input-group input-group-md my-3 row">
                        <label for="validationCustom01" class="form-label col-12">Código Postal</label>
                        <input class="form-control" type="text" name="cod_postal" pattern="[0-9]{5}" value="<?php if($_SESSION['user_log']->getCodpostal() != null){ echo $_SESSION['user_log']->getCodPostal(); }else{ NULL;} ?>"/>
                        <div class="valid-feedback">
                                Código postal válido
                            </div>
                            <div class="invalid-feedback">
                                Código inválido introduce 5 dígitos
                            </div>
                        </div>
                        <div class="input-group input-group-md my-3 row justify-content-center abajo mt-3">
                            <button class="btn btn-secondary btn-md btn-cta" type="submit">Modificar mis datos</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
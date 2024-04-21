<?php
if(isset($_GET['info']) && $_GET['info'] === 'empty_fields'){
    echo "<h3 class='text-center' text-danger>Edicion no realizada</h3>";
    echo "<h3 class='text-center text-danger'>No se admiten campos vacios en el formulario</h3>";
}
?>
<h5 class="display-4 text-center">Rincon de <?php if(isset($_SESSION['nombre_log'])? $_SESSION['nombre_log']:"")?></h5>
<h5 class="text-center mb-5">En este apartado puedes consultar y modificar tus datos personales</h5>


<form id="formulario_edit_datos_usuario" class="container-fluid" method="POST" action="index.php?view=_mod_datos_usuario">
   <div class="d-flex justify-content-end mr-2">
    <div class="d-flex flex-column-reverse align-items-end justify-content-end text-center">
        <a href='#'><i class="fa-solid fa-pen-fancy mx-auto" style="color: #831959;"></i></a>
        <p class='fs-6 font-weight-light'>Modificar</p>
    </div>
</div>

        <div class="row text-dark m-0 justify-content-center">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 ">
                    <label for="exampleInputPassword1" class="form-label" >DNI</label>
                    <input name="dni_edit" type="text" class="editar_dni input-group-text" id="disabledTextInput" value= '<?php if(isset($_SESSION['dni_log'])? $_SESSION['dni_log']:"")?>' readonly>
                </div>
              
                </div>
                <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 ">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email_edit" type="text" class="editar_email input-group-text" id="disabledTextInput" value= '<?php if(isset($_SESSION['email_log'])? $_SESSION['email_log']:"")?>' readonly>
                </div>
            </div>
        </div>
        <div class="row text-dark m-0 justify-content-center">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input name="nombre_edit" type="text" class="editar_nombre input-group-text" id="disabledTextInput"  value= '<?php if(isset($_SESSION['nombre_log'])? $_SESSION['nombre_log']:"")?>'  readonly>
                </div>
                </div>
                <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8">
                    <label for="exampleInputPassword1" class="form-label" >Apellidos</label>
                    <input name="apellidos_edit" type="text" class="editar_apellidos input-group-text" id="disabledTextInput" value='<?php if(isset($_SESSION['p_apellido_log'])? $_SESSION['p_apellido_log']:"")?>' readonly>
                </div>
            </div>
        </div>
        <div class="row text-dark m-0 justify-content-center">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 ">
                    <label for="exampleInputEmail1" class="form-label">Dirección</label>
                    <input name="direccion_edit" type="text" class="editar_direccion input-group-text" id="disabledTextInput" aria-describedby="emailHelp" value='<?php if(isset($_SESSION['direccion_log'])? $_SESSION['direccion_log']:"")?>'  readonly>
                </div>
               
                </div>
                <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 ">
                    <label for="exampleInputPassword1" class="form-label" >Provincia</label>
                    <input name="provincia_edit" type="text" class="editar_provincia input-group-text" id="disabledTextInput" value='<?php if(isset($_SESSION['provincia_log'])? $_SESSION['provincia_log']:"")?>'  readonly>
                </div>
               
            </div>
        </div>
        <div class="row text-dark m-0 justify-content-center">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 m-0">
                    <label for="exampleInputEmail1" class="form-label">Población</label>
                    <input name="poblacion_edit" type="text" class="editar_poblacion input-group-text" id="disabledTextInput" aria-describedby="emailHelp" value='<?php if(isset($_SESSION['localidad_log'])? $_SESSION['localidad_log']:"")?>'  readonly>
                </div>
               
                </div>
                <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 mr-0">
                    <label for="exampleInputPassword1" class="form-label" >Telefono</label>
                    <input name="telefono_edit" type="text" class="editar_telefono input-group-text" id="disabledTextInput" value='<?php if(isset($_SESSION['telefono_log'])? $_SESSION['telefono_log']:"")?>'  readonly>
                </div>
                
            </div>
        </div>
        <div class="row text-dark ms-4 justify-content-start">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 m-0">
                    <label for="exampleInputEmail1" class="form-label">Codigo Postal</label>
                    <input name="cod_postal_edit" type="text" class="editar_poblacion input-group-text" id="disabledTextInput" aria-describedby="emailHelp" value='<?php if(isset($_SESSION['cod_postal_log'])? $_SESSION['cod_postal_log']:"")?>'  readonly>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex flex-column justify-content-center align-items-center my-4">
    <button type="submit" class="btn btn-dark col-7 col-md-4 m-2"><i class="fa-solid fa-check mx-2"></i>Validar Cambios</button>
    <button class="btn btn-danger col-7 col-md-4 m-2 modify_passwd"><i class="fa-solid fa-key mx-2"></i>Modificar contraseña</button>
</div>

    </div>
</form>




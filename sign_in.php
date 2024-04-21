<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" lang="es">
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon_stetia.ico">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous">
        <link href="bootstrap_css/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/generic.css" rel="stylesheet">
        <link href="css/call_to_action.css" rel="stylesheet">

    </head>
    <body class="row d-flex justify-content-center">
<?php
    require_once ('php/controllers/tratamientos_controller.php');
    require_once  ('php/controllers/form_controller.php');
    require_once  ('php/views/header.html');
?>    
    <main class="p-4  my-3">

<?php
    if(isset($_GET['msg']) ? $message = $_GET['msg']: '');

        if(isset($message)){
        switch ($message) {
                
                default: 
                    print("");
            } 
        }
?>
 
<div id="div-formulario">
    <img src="img/logo_stetia.png" class="form-logo-stetia"></img>
    <h5 class="display-5 text-center">Registro en STETIA</h5>
    <h5 class="fs-6 text-center">Ya queda menos para ser usuario</h5>
    <form class="row g-3 col-12 col-md-6 my-2 needs-validation" method="POST" action="index.php?type=_new_user" novalidate>
    <div class="col-lg-5 input-group input-group-md mb-1">
        <label for="validationCustom01" class="form-label col-12">Email</label>
        <input class="form-control col-12 col-md-5" name="email" type="email" id="validationCustom01" aria-label="default input example" required>
        <div class="valid-feedback">
            Email válido
        </div>
        <div class="invalid-feedback">
            Email incorrecto
        </div>
    </div>
    <div class="col-lg-5 input-group input-group-md mb-1">
        <label for="validationCustom01" class="form-label col-12">Password</label>
        <input class="form-control col-12" name="passwd" type="password" id="validationCustom01" aria-label="default input example" required>
        <div class="valid-feedback">
            Password válido
        </div>
        <div class="invalid-feedback">
            Password inválido
        </div>
    </div>
    <div class="col-lg-5 input-group input-group-md mb-1">
        <label for="validationCustom01" class="form-label col-12">Nombre</label>
        <input class="form-control col-12" name="nombre" type="text" id="validationCustom01" aria-label="default input example" required>
        <div class="valid-feedback">
            Nombre válido
        </div>
        <div class="invalid-feedback">
            Nombre inválido
        </div>
    </div>
    <div class="col-lg-5 input-group input-group-md mb-1">
        <label for="validationCustom01" class="form-label col-12">Primer apellido</label>
        <input class="form-control col-12" name="p_apellido" type="text" id="validationCustom01" aria-label="default input example" required>
        <div class="valid-feedback">
            Apellido válido
        </div>
        <div class="invalid-feedback">
            Apellido inválido
        </div>
    </div>

    <div class="col-lg-5 input-group input-group-md mb-1">
        <label for="validationCustom01" class="form-label col-12">Segundo apellido</label>
        <input class="form-control col-12 col-md-5" name="s_apellido" type="text" id="validationCustom01" aria-label="default input example" required>
        <div class="valid-feedback">
            Apellido válido
        </div>
        <div class="invalid-feedback">
            Apellido inválido
        </div>
    </div>  

    <div class="col-lg-5 input-group input-group-md mb-1">
        <label for="validationCustom01" class="form-label col-12">Teléfono</label>
        <input class="form-control col-12 col-md-5" name="telefono" type="text" id="validationCustom01" aria-label="default input example" required>
        <div class="valid-feedback">
            Teléfono válido
        </div>
        <div class="invalid-feedback">
            Teléfono inválido
        </div>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
        Acepto los términos de licencia
        </label>
        <div class="invalid-feedback">
        Debes aceptar los términos antes de enviar el formulario
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit" name="form_register">Enviar formulario de registro</button>
    </div>
    </form>
</div>

</main>
<?php
include ('php/views/footer.html');
?>
        <script src="bootstrap_css/js/bootstrap.bundle.min.js"></script>
        <script src="js/validity_form.js"></script>
    </body>
</html>
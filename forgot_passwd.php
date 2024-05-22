<?php

//include_once('js/form_pers_passwd.js');

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#0093A2">
<link href="bootstrap_css/css/bootstrap.min.css" rel="stylesheet">
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
        <link href="bootstrap_css/css/signin.css" rel="stylesheet">
        <link rel="canonical" href="https://bootstrap21.org/es/docs/5.2/examples/sign-in/">
        <link rel="alternate" hreflang="x-default" href="https://bootstrap21.org">
        <link rel="stylesheet" href="bootstrap_css/css/bootstrap.css">
        <link href="css/call_to_action.css" rel="stylesheet">
        <script async="" src="https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js"></script><script>const globals = {domain: "bootstrap21.org"}</script>
        <script src="https://yandex.ru/ads/system/context.js" crossorigin="anonymous" async=""></script><link rel="preconnect" href="https://yastatic.net/"><link rel="preconnect" href="https://avatars.mds.yandex.net/"><link rel="preconnect" href="https://mc.yandex.ru/"><link rel="preconnect" href="https://ads.adfox.ru"><link rel="preload" href="https://yastatic.net/s3/home/fonts/ys/3/text-variable-full.woff2" type="font/woff2" as="font" crossorigin="anonymous"><style id="ysTextCssRule">@font-face {
        font-family: "YS Text Variable";
        src: url("https://yastatic.net/s3/home/fonts/ys/3/text-variable-full.woff2") format("woff2");
        font-weight: 400 700;
        font-display: optional;
    }</style><script async="" crossorigin="anonymous" src="https://yastatic.net/safeframe-bundles/0.83/host.js"></script><style> .j380b2b86{position:fixed !important;margin:0 auto !important;-webkit-box-shadow:0 0 16px rgba(0,21,64,.15) !important;box-shadow:0 0 16px rgba(0,21,64,.15) !important;-webkit-box-sizing:border-box !important;box-sizing:border-box !important;border-style:solid !important} .j380b2b86.n7a3a47c5{border-radius:0 !important} .j380b2b86.b9b0037d8{background-color:#d1d6e0 !important;border-color:#d1d6e0 !important} .j380b2b86.b9b0037d8.n2079dd13{background-color:#fff !important} .j380b2b86.k2b197fa{background-color:#111 !important;border-color:#111 !important} .j380b2b86.ta0058137{top:0 !important} .j380b2b86.v28db3824{bottom:0 !important;--safe-area-inset-bottom:env(safe-area-inset-bottom,0) !important;padding-bottom:0 !important;padding-bottom:var(--safe-area-inset-bottom,0) !important} .j380b2b86.v28db3824.n2079dd13{padding:4px 18px !important} .j380b2b86.n2079dd13{border-radius:12px 12px 0 0 !important} .mdc3dfef7{min-width:320px !important} .b1ef157c6{position:relative !important;max-width:100% !important;margin:0 auto !important;pointer-events:auto !important} .gc95420ae{position:absolute !important;right:8px !important} .gc95420ae.d15efbde5{top:-25.5px !important} .gc95420ae.d15efbde5.hbedb7b2d{top:-24.5px !important} .gc95420ae.a4fb8d3f6{bottom:-25.5px !important;-webkit-transform:rotate(180deg) !important;transform:rotate(180deg) !important} .kea93a1b7 svg path:first-child{fill:#d1d6e0 !important} .kea93a1b7 svg path:last-child{fill:#575c66 !important} .n838475d5 svg path:first-child{fill:#111 !important} .n838475d5 svg path:last-child{fill:hsla(0,0%,100%,.87) !important} .g785b98c6{position:absolute !important;height:26px !important;width:50px !important;left:5px !important;top:-1px !important;pointer-events:auto !important;cursor:pointer !important}</style><style nonce="">#761ca20af5{width:1px;height:1px;position:relative;}</style><style nonce="">#id9958{width:1px;height:1px;top:0px;left:0px;position:absolute;}</style></head>



<main class="form-signin w-100 m-auto " style="max-width: 330px; ">  

<?php
//Control de mensajes
if(isset($_GET['msg']) ? $message = $_GET['msg']: '');

if(isset($message)){
   switch ($message) {
        case '_user_exist';
            echo "<p class='text-center text-danger' >Email ya existe. ¿Olvidaste la contraseña? <p>";
            error_log("Error email exist && passwd. \n",3,'log/error.log');
            break;
        case '_err_update';
            echo("<p class='text-center text-danger'>Ha ocurrido un error al actualizar</p>");
            error_log("Error al actualizar el usuario \n",3,'log/error.log');
            break;
        case '_user_update';
            echo("<p class='text-center'>Usuario actualizado</p>");
            break;
        case '_bad_email';
            echo("<p class='text-center'>Error! Email incorrecto</p>");
            error_log("Email incorrecto. \n",3,'log/error.log');
            break;
        case '_register_success';
            echo("<p class='text-center'>Usuario registrado con exito!</p>");
            break;
        default: 
            print("");
    } 
}


//Si existe la variable GET tkn accedemos a los datos de correo del json, mostramos la recuperacion de la contrasenya
if(isset($_GET['tkn']) && $_GET['tkn'] != ""){

//Abrimos el JSON en busca del token para acceder al usuario concreto
$file_name = 'utils/json/tokens.json';

if (file_exists($file_name)) {
    $json_data = file_get_contents($file_name);
    $data_array = json_decode($json_data, true);
    foreach ($data_array as $user_data) {
      if (isset($user_data['token']) && $user_data['token'] === $_GET['tkn']) {
          $_SESSION['email_user_forgot_passwd'] = $user_data['email'];
          $token_found = true;
          break; // Salir del bucle una vez que se encuentra el token
      }
  }
} else {
      //TODO: capturar error
}

if($token_found){
?>
    <form class="row g-3 .needs_validate" id='form-new-passwd' method="POST" action="utils/set_new_passwd.php" novalidate>
        <img class="mb-4" src="img/logo_stetia.png" alt="Logo Stetia" width="25%" height="25%">
        <img class="mb-4 ms-3" src="img/letras_stetia.png" alt="Letras Stetia" width="60%" height="60%">
        <h1 class="h3 mb-3 fw-normal">Establece tu nueva contraseña</h1>
        <div class="form-floating my-3">
            <input type="password" name="new_passwd" class="form-control" id="new_passwd" placeholder="Nueva Contraseña" required>
            <label for="new_passwd">Nueva Contraseña</label>
            <div class="valid-feedback">
              Contraseñas iguales
            </div>
            <div class="invalid-feedback">
              Las contraseñas deben de ser identicas
            </div>
        </div>
        <div class="form-floating my-3">
            <input type="password" name="repeat_new_passwd" class="form-control" id="repeat_passwd" placeholder="Repite la Contraseña" required>
            <label for="repeat_passwd">Repite la Contraseña</label>
            <div class="valid-feedback">
              Contraseñas iguales
            </div>
            <div class="invalid-feedback">
              Las contraseñas deben de ser identicas
            </div>
        </div>
        <button class="w-100 btn btn-lg btn-cta m-0" id='btn-form_new_passwd' type="submit">Solicitar nueva contraseña</button>
        <div class="d-flex justify-content-center align-items-center flex-column mt-2">
            <a href='sign_in.php' class='text-center my-2'>¿Todavía no eres usuario? Regístrate</a>
        </div>
        <p class="mt-5 mb-3 text-muted text-center">© 2023–2024</p>
    </form>

    <script>
    let form = document.getElementById("form-new-passwd");
    form.addEventListener("submit", function(event) {
    input1 = document.getElementById("new_passwd");
    input2 =  document.getElementById("repeat_passwd") ;   
    if (input1.value != input2.value && input1.value != "" & input2.value != "" ) {
        alert("Las contraseñas no coinciden");
        event.preventDefault();
        event.stopPropagation();
    } else if (form.checkValidity() == false) {
        event.preventDefault();
        event.stopPropagation();
    }
    form.classList.add("was-validated");
    }, false);
    </script>


<?php
//else de tokenfound == true
  }else{
    //TODO: capturar error
  }
}else{
?>

<body cz-shortcut-listen="true">

<form method="POST" action="utils/send_email_new_passwd.php">
    <img class="mb-4" src="img/logo_stetia.png" alt="" width="25%" height="25%">
    <img class="mb-4 ms-3" src="img/letras_stetia.png" alt="" width="60%" height="60%">
    <h1 class="h3 mb-3 fw-normal">Recuperar contraseña</h1>
    <div class="form-floating my-3">
    <input type="email" name="email_new_passwd" class="form-control" id="floatingInput" placeholder="nombre@ejemplo.com">
    <label for="floatingInput">Dirección de correo electrónico</label>
    </div>
    
    <button class="w-100 btn btn-lg btn-cta m-0" type="submit">Solicitar nueva contraseña</button>
    <div class="d-flex justify-content-center align-items-center flex-column mt-2">
    <a href='sign_in.php' class='text-center my-2'>¿Todavia no eres usuario? Regístrate</a>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">© 2023–2024</p>
</form>

<?php
}
?>

</main>
<script src="bootstrap_css/js/bootstrap.min.js"></script>
</body>
</html>
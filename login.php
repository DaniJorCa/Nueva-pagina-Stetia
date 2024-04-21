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
<link rel="alternate" hreflang="az" href="https://bootstrap21.org/az/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ay" href="https://bootstrap21.org/ay/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sq" href="https://bootstrap21.org/sq/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="am" href="https://bootstrap21.org/am/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="en" href="https://bootstrap21.org/en/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ar" href="https://bootstrap21.org/ar/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="hy" href="https://bootstrap21.org/hy/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="as" href="https://bootstrap21.org/as/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="af" href="https://bootstrap21.org/af/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="bm" href="https://bootstrap21.org/bm/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="eu" href="https://bootstrap21.org/eu/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="be" href="https://bootstrap21.org/be/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="bn" href="https://bootstrap21.org/bn/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="my" href="https://bootstrap21.org/my/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="bg" href="https://bootstrap21.org/bg/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="bs" href="https://bootstrap21.org/bs/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="bho" href="https://bootstrap21.org/bho/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="cy" href="https://bootstrap21.org/cy/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="hu" href="https://bootstrap21.org/hu/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="vi" href="https://bootstrap21.org/vi/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="haw" href="https://bootstrap21.org/haw/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="gl" href="https://bootstrap21.org/gl/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="el" href="https://bootstrap21.org/el/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ka" href="https://bootstrap21.org/ka/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="gn" href="https://bootstrap21.org/gn/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="gu" href="https://bootstrap21.org/gu/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="da" href="https://bootstrap21.org/da/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="doi" href="https://bootstrap21.org/doi/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="zu" href="https://bootstrap21.org/zu/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="iw" href="https://bootstrap21.org/iw/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ig" href="https://bootstrap21.org/ig/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="yi" href="https://bootstrap21.org/yi/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ilo" href="https://bootstrap21.org/ilo/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="id" href="https://bootstrap21.org/id/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ga" href="https://bootstrap21.org/ga/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="is" href="https://bootstrap21.org/is/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="es" href="https://bootstrap21.org/es/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="it" href="https://bootstrap21.org/it/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="yo" href="https://bootstrap21.org/yo/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="kk" href="https://bootstrap21.org/kk/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="kn" href="https://bootstrap21.org/kn/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ca" href="https://bootstrap21.org/ca/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="qu" href="https://bootstrap21.org/qu/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ky" href="https://bootstrap21.org/ky/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="zh-TW" href="https://bootstrap21.org/zh-TW/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="zh-CN" href="https://bootstrap21.org/zh-CN/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="gom" href="https://bootstrap21.org/gom/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ko" href="https://bootstrap21.org/ko/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="co" href="https://bootstrap21.org/co/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="xh" href="https://bootstrap21.org/xh/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ht" href="https://bootstrap21.org/ht/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="kri" href="https://bootstrap21.org/kri/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ku" href="https://bootstrap21.org/ku/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ckb" href="https://bootstrap21.org/ckb/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="km" href="https://bootstrap21.org/km/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="lo" href="https://bootstrap21.org/lo/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="la" href="https://bootstrap21.org/la/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="lv" href="https://bootstrap21.org/lv/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ln" href="https://bootstrap21.org/ln/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="lt" href="https://bootstrap21.org/lt/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="lg" href="https://bootstrap21.org/lg/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="lb" href="https://bootstrap21.org/lb/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="mai" href="https://bootstrap21.org/mai/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="mk" href="https://bootstrap21.org/mk/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="mg" href="https://bootstrap21.org/mg/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ms" href="https://bootstrap21.org/ms/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ml" href="https://bootstrap21.org/ml/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="dv" href="https://bootstrap21.org/dv/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="mt" href="https://bootstrap21.org/mt/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="mi" href="https://bootstrap21.org/mi/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="mr" href="https://bootstrap21.org/mr/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="mni-Mtei" href="https://bootstrap21.org/mni-Mtei/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="lus" href="https://bootstrap21.org/lus/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="mn" href="https://bootstrap21.org/mn/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="de" href="https://bootstrap21.org/de/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ne" href="https://bootstrap21.org/ne/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="nl" href="https://bootstrap21.org/nl/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="no" href="https://bootstrap21.org/no/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="or" href="https://bootstrap21.org/or/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="om" href="https://bootstrap21.org/om/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="pa" href="https://bootstrap21.org/pa/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="fa" href="https://bootstrap21.org/fa/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="pl" href="https://bootstrap21.org/pl/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="pt" href="https://bootstrap21.org/pt/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ps" href="https://bootstrap21.org/ps/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="rw" href="https://bootstrap21.org/rw/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ro" href="https://bootstrap21.org/ro/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ru" href="https://bootstrap21.org/ru/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sm" href="https://bootstrap21.org/sm/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sa" href="https://bootstrap21.org/sa/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ceb" href="https://bootstrap21.org/ceb/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="nso" href="https://bootstrap21.org/nso/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sr" href="https://bootstrap21.org/sr/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="st" href="https://bootstrap21.org/st/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="si" href="https://bootstrap21.org/si/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sd" href="https://bootstrap21.org/sd/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sk" href="https://bootstrap21.org/sk/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sl" href="https://bootstrap21.org/sl/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="so" href="https://bootstrap21.org/so/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sw" href="https://bootstrap21.org/sw/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="su" href="https://bootstrap21.org/su/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="tg" href="https://bootstrap21.org/tg/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="th" href="https://bootstrap21.org/th/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ta" href="https://bootstrap21.org/ta/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="tt" href="https://bootstrap21.org/tt/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="te" href="https://bootstrap21.org/te/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ti" href="https://bootstrap21.org/ti/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ts" href="https://bootstrap21.org/ts/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="tr" href="https://bootstrap21.org/tr/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="tk" href="https://bootstrap21.org/tk/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="uz" href="https://bootstrap21.org/uz/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ug" href="https://bootstrap21.org/ug/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="uk" href="https://bootstrap21.org/uk/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ur" href="https://bootstrap21.org/ur/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="fl" href="https://bootstrap21.org/fl/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="fi" href="https://bootstrap21.org/fi/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="fr" href="https://bootstrap21.org/fr/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="fy" href="https://bootstrap21.org/fy/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ha" href="https://bootstrap21.org/ha/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="hi" href="https://bootstrap21.org/hi/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="hmn" href="https://bootstrap21.org/hmn/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="hr" href="https://bootstrap21.org/hr/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ak" href="https://bootstrap21.org/ak/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ny" href="https://bootstrap21.org/ny/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="cs" href="https://bootstrap21.org/cs/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sv" href="https://bootstrap21.org/sv/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="sn" href="https://bootstrap21.org/sn/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="gd" href="https://bootstrap21.org/gd/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ee" href="https://bootstrap21.org/ee/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="eo" href="https://bootstrap21.org/eo/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="et" href="https://bootstrap21.org/et/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="jw" href="https://bootstrap21.org/jw/docs/5.2/examples/sign-in/">
<link rel="alternate" hreflang="ja" href="https://bootstrap21.org/ja/docs/5.2/examples/sign-in/">
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
        case '_new_passwd_sent';
            echo "<p class='text-center text-danger' >En breve recibirás un correo para modificar la contraseña. <p>";
            break;
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
?>


<body cz-shortcut-listen="true">

<form method="POST" action="conexion.php">
<img class="mb-4" src="img/logo_stetia.png" alt="" width="25%" height="25%">
<img class="mb-4 ms-3" src="img/letras_stetia.png" alt="" width="60%" height="60%">
<h1 class="h3 mb-3 fw-normal">Por favor, registrese</h1>
<div class="form-floating">
<input type="email" name="email" class="form-control" id="floatingInput" placeholder="nombre@ejemplo.com">
<label for="floatingInput">Dirección de correo electrónico</label>
</div>
<div class="form-floating">
<input type="password" name="passwd" class="form-control" id="floatingPassword" placeholder="Clave">
<label for="floatingPassword">Contraseña</label>
</div>
<div class="checkbox mb-3">
<label> <input type="checkbox" value="remember-me">Recordar mi contraseña</label>
</div>
<button class="w-100 btn btn-lg btn-cta m-0" type="submit">Iniciar sesión</button>
<div class="d-flex justify-content-center align-items-center flex-column mt-2">
  <a href='sign_in.php' class='text-center my-2'>¿Todavia no eres usuario? Regístrate</a>
  <a href='forgot_passwd.php' class='text-center'>Olvidé mi contraseña</a>
</div>
<p class="mt-5 mb-3 text-muted">© 2023–2024</p>
</form>
</main>
<script src="bootstrap_css/js/bootstrap.min.js"></script>
</body>
</html>
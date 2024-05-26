
<div class="header row">
    <div class='row d-flex justify-content-center'>
        <h1 class='col-4'>Mis Stetipuntos</h1>
        <i class="fa-solid fa-certificate col-1" style="color: #FFD43B; font-size: 3.1em;"></i>
    </div>
    <h2 class="text-center">Consigue puntos por ser socio Stetia y consigue descuentos</h2>
</div>

<div class="progress col-8" role="progressbar" aria-label="Danger striped example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" style="width:<?php echo($usuario->getPuntos())?>%"></div>
</div>
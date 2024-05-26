<h2 class="text-center mb-3">Mis tratamientos realizados</h2>
<?php
if(count($tratamiento_usuario) == 0){
  echo '<div class="container mt-5 text-center">';
  echo '    <h2><i class="fas fa-spa mx-3"></i>No hay tratamientos realizados</h2>';

  // Botones para redirigir a distintos tipos de tratamientos
  echo '    <div class="row mt-4">';
  echo '     <h4 class="text-center mb-3">Quizás quieras ver nuestros tratamientos</h4>';
  echo '        <div class="col-12 offset-md-3 ms-0">';
  echo '            <a href="tratamientos_facial_elche_alicante_orihuela.php" class="col-12 col-md-5 btn btn-lg btn-cta my-2 mx-0">Tratamientos faciales</a>';
  echo '            <a href="#" class="btn btn-lg btn-cta my-2 col-12 col-md-5 mx-0">Tratamientos corporales</a>';
  echo '        </div>';
  echo '    </div>';

  echo '</div>';
}else{

  foreach ($tratamiento_usuario as $jsonTratamientosUsuario) {
    foreach ($all_treatments as $tratamiento) {
        if ($tratamiento['id'] == $jsonTratamientosUsuario['idTratamiento']) {
          echo '<div class="col-md-6">';
          echo '  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">';
          echo '    <div class="col p-4 d-flex flex-column position-static">';
          echo '      <strong class="d-inline-block mb-2 text-success">Tratamiento realizado</strong>';
          echo '      <h3 class="mb-0">'.$tratamiento['nombre'].'</h3>';
          echo '      <div class="mb-1 text-muted">'.$tratamiento['zona_corp'].'</div>';
          echo '      <p class="mb-auto">'.$tratamiento['descrip'].'</p>';
          echo '    </div>';
          echo '    <div class="col-auto d-none d-lg-block">';
          echo '      <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><image href="'.$tratamiento['img'].'" width="200" height="250" />  </svg>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
        }
    }
  }
}
?>
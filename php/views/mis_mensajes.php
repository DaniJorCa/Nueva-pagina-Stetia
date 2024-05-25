<div id="spinner" style="display: none; height: 100vh; justify-content: center; align-items: center;">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Cargando</span>
    </div>
</div>
<?php
//Si hay mensajes los mostramos
if($any_messages){
?>
    <div class="container mt-5" id='div-show-messages'>
        <h2 class="text-center mb-4">Bandeja de Entrada</h2>
        <div class="list-group d-flex col-12 align-items-center">
            <!-- Enlaces a correos -->
            <?php
          $contador = 1;
          foreach ($mensajes_usuario as $mensaje) {
              $preview = substr($mensaje->getMensaje(), 0, 50);
              if ($mensaje->getLeido() == 0) {
                  $negrita = 'font-weight: bold;';
              } else {
                  $negrita = '';
              }
            echo '<div class="d-flex col-10 align-items-center">';
            echo '  <label class="sr-only" for="inlineFormInputGroup">Username</label>';
            echo '  <div class="input-group mb-2">';
            echo '    <div class="input-group-prepend">';
            echo '      <div class="input-group-text">Correo ' . $contador . '</div>';
            echo '    </div>';
            echo '    <input type="text" class="form-control col-8" id="inlineFormInputGroup" style= "'.$negrita.'" value="' . htmlspecialchars($preview) . '" placeholder="Username">';
            echo '<button type="button" class="btn btn-danger col-2 mx-2 btn-del-correo" data-id='.$mensaje->getId().'><i class="fas fa-trash"></i></button>';
                // Botón para visualizar el correo
            echo '<button type="button" class="btn btn-primary col-2 btn-read-correo" data-id='.$mensaje->getId().'><i class="far fa-envelope-open"></i></button>';          
            echo '  </div>';
            echo '</div>';
            $contador += 1;
          }
          ?>
          
 
        </div>
    </div>

    <div class="container mt-5 " id="div-read-message">
    <h2 class="text-center">Visualizar Correo</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
        <?php
            echo '<textarea class="form-control" rows="10" readonly>' . (isset($show_message) ? htmlspecialchars($show_message->getMensaje()) : '') . '</textarea>';
        ?>
        <button type="button" class="btn btn-danger col-2 mx-2" id="btn_show_all_messages">Mostrar bandeja de entrada</button>
        </div>
    </div>
    </div>
<?php
//Si no hay mensajes 
}else{
?>
<div class="container mt-5 text-center">
    <h2><i class="fas fa-inbox mx-3"></i>No hay mensajes en tu bandeja de entrada</h2>
</div>
<?php
}
?>
<div class="col-12 row justify-content-center" id="div_send_user_message">
    <div class="d-flex justify-content-center col-8">
        <div class='row col-12'>
          <h1 class="text-center titulo_h1">Enviar mensaje</h1>
            <?php
            echo '<form class="needs-validation" method="POST" action="home.php?type=_send_message" novalidate>';
            include_once('php/controllers/superUser_controller.php');
            if(isset($usuario_consultado)){
            echo '<div class="col-12 d-flex justify-content-between" >';
              if($usuario_consultado->getBaja() == 0){
                echo '<button type="button" class="btn btn-success my-3 col-5">';
                  echo '<span class="badge badge-success">Actualmente de Alta</span>';
                echo '</button>';
              }else{
                echo '<button type="button" class="btn btn-danger my-3 col-1">';
                  echo '<span class="badge badge-success">Actualmente de Alta</span>';
                echo '</button>';
              }
            echo '<div class="form-group col-3">';
            echo '<label for="id_user">ID Usuario</label>';
            echo '<input class="col-12" name="id_user" value="'. $id .'">';
            echo '</div>';
            echo '</div>';
            ?>

            <div class="form-group col-12">
                <label for="name_message">Nombre</label>
                <input type="email" class="form-control" id="name_message" aria-describedby="emailHelp" placeholder="Nombre" value='<?php echo $usuario_consultado->getNombre();?>' disabled>
                <div class="form-group col-6">
                      <label for="email_message">Email</label>
                      <input type="email" class="form-control" id="email_message" aria-describedby="emailHelp" placeholder="Nombre" value='<?php echo $usuario_consultado->getEmail();?>' disabled>
                </div>
                <div class="form-group col-12">
                  <label for="textarea_message">Example textarea</label>
                  <textarea class="form-control" id="mensaje_user_textarea" name="user_message" rows="7" required></textarea>
                  <div class="invalid-feedback">
                      Debes escribir un mensaje
                  </div>
                </div>
                <div>
                  <button class="btn col-12 align-middle mx-1 my-2 btn-cta" type="submit" id="send_user_message"><i class="fa-solid fa-paper-plane mx-2" style="color: #ffffff;"></i>Enviar Mensaje</button>
                  <button class="btn col-12 align-middle mx-1 my-2 btn-danger" type="button" id="cancel-send-message"><i class="fa-solid fa-square-xmark mx-2" style="color: #ffffff;"></i>Cancelar</button>
                </div>
              </form>
            </div>

            <!--Fin de la condicion isset $usuario_consultado-->
            <?php
            }
            ?>

        <!--div general-->
        </div>
    </div>
</div>

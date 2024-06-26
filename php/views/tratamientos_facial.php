

<div class="div-flex-column">
  <h5 class="display-5 my-4 text-center">TRATAMIENTOS FACIALES</h5>
<div class="row d-flex justify-content-center">

<?php
$con = Conexion::conectar_db();
$tratamientos = get_array_all_objects($con, 'tratamientos', 'Tratamiento', $inicio, $artXpag);

foreach ($tratamientos as $tratamiento){

echo '<div class="card col-12 col-md-3 m-4">';
echo '<img src="img/cards_facial/card_arrugas.jpg" class="card-img-top" alt="...">';
echo '<div class="card-body">';
echo '<h5 class="card-title text-center">Arrugas</h5>';
echo '<p class="card-text"> Elimina las arrugas en frente, entrecejo, patas de gallo y cuello.</p>';
echo '<a href="quitar_arrugas.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información eliminar arrugas</a>';
echo '</div>';
echo '</div>';

}
?>
  
  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_acido_hialuronico.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Ácido hialurónico</h5>
      <p class="card-text">Relleno de arrugas, surco nasogeniano, código de barras y pómulos.</p>
      <a href="acido_hialuronico.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información ácido hialurónico</a>
    </div>
  </div>

  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/hilos_tensores.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Hilos tensores</h5>
      <p class="card-text"> Corrige la flacidez en mejillas, perfil mandibular y cuello.</p>
      <a href="hilos_tensores.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información hilos tensores</a>
    </div>
  </div>
  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_mini_lifting.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Mini Lifting de rostro</h5>
      <p class="card-text">Mini lifting para pacientes con descolgamiento de los pómulos, llevado a cabo con hilos tensores.</p>
      <a href="hilos_tensores.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información mini lifting</a>
    </div>
  </div>

  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_plasma.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">PRP rico en plaquetas</h5>
      <p class="card-text"> Rejuvenecimiento general de tu piel. Obtén resultados en tan solo 1 mes.</p>
      <a href="tratamiento_prp.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información PRP</a>
    </div>
  </div>
  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_lunares.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Eliminacion de verrugas y lunares</h5>
      <p class="card-text">Elimina los lunares y verrugas mediante laser de plasma sin dejar marca algunal.</p>
      <a href="eliminacion_verrugas_y_lunares.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información eliminacion verrugas y lunares</a>
    </div>
  </div>

  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_xantelasma.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Eliminacion xantelasmas o siringomas</h5>
      <p class="card-text">Los xantelasmas son lesiones de color amarillo que aparecen en los párpados. Eliminalos de forma definitiva.</p>
      <a href="eliminacion_verrugas_y_lunares.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información xantelasmas</a>
    </div>
  </div>
  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_blefaroplastia.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Blefaroplastia sin cirugía</h5>
      <p class="card-text">Elimina las arrugas de los párpados con un tratamiento de láser de plasma PLEXR. Resultados tan pronto se recupere la piel, algo menos de dos semanas.</p>
      <a href="blefaroplastia.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información blefaroplastia</a>
    </div>
  </div>

  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_lobuloplastia.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Lobuloplastia</h5>
      <p class="card-text">Microcirugía para reconstruir el lóbulo rasgado o partido</p>
      <a href="lobuloplastia.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información lobuloplastia</a>
    </div>
  </div>
  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_papada.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Eliminacion papada</h5>
      <p class="card-text">Posibilidad de aplicar 2 tratamientos como son la mesoterapia, o bien, Belkyra.</p>
      <a href="eliminar_papada.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información eliminación papada</a>
    </div>
  </div>
  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_envejecida.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Pieles Envejecidas</h5>
      <p class="card-text">Tratamiento con ácido poliláctico suele dar muy buenos resultados en pieles envejecidas y finas.</p>
      <a href="#" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información piel envejecida</a>
    </div>
  </div>

  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_acne.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Eliminacion acné</h5>
      <p class="card-text">Tratamiento que permite disimular las marcas de acné en el rostro. El tratamiento con acido hialurónico permite reducir las cicatrices del acné.</p>
      <a href="acido_hialuronico.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información marcas acné</a>
    </div>
  </div>
  <div class="card col-12 col-md-3 m-3">
    <img src="img/cards_facial/card_peeling_quimico.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title text-center">Peeling químico</h5>
      <p class="card-text">Eliminación de las manchas de la piel.</p>
      <a href="peeling_quimico.php" class="btn btn-primary col-12 align-middle mx-1s btn-cta">Información peeling químico</a>
    </div>
  </div>
</div>
</div>
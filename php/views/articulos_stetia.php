<h1 class="text-center">Listado de articulos</h1>

<div class='row col-5 d-flex justify-content-center flex-center ms-5 mt-5'>
    <a href="home.php?type=_nuevo_tratamiento" class='col-12'><button class="w-70 btn btn-lg btn-cta m-0"><i class="fa-solid fa-plus mx-2" style="color: #FFA88B;"></i>Alta nuevo articulo</button></a>
</div>

<?php
//include_once('php/models/clases.php');
$articulos = Articulo::get_all_articles();
echo "<span class='edit-treatments'>";
if($articulos !== null){
    foreach ($articulos as $articulo) {
        echo "<div class='card mb-5'>";
        echo "<img src='".$articulo['img']."'></img>";
        echo "<div class='multi-button'>";
        echo "<a href='home.php?type=_editar_tratamiento&id=".$articulo['id']."'><button class='fa-solid fa-pencil'></button></a></div>";
        echo "<p class='text-center my-2'>".$articulo['nombre']."</p>";
        echo "<div class='container'></div>";
        echo "</div>";
    }
        echo "</span>";  
}else{
    echo "<h4>No hay articulos en la base de datos</h4>";
}

?>
<div class='d-flex justify-content-center'>
    <img src='img/icons/facial.png' class='icon'>
    <h1 class="text-center titulo_h1">Listado de tratamientos</h1>
</div>
<h3 class="text-center">Aqui puedes modificar los tratamientos</h3>
<div class='row col-5 d-flex justify-content-center flex-center ms-5 mt-5'>
    <a href="home.php?type=_nuevo_tratamiento" class='col-12'><button class="w-70 btn btn-lg btn-cta m-0"><i class="fa-solid fa-plus mx-2" style="color: #FFA88B;"></i>Alta nuevo tratamiento</button></a>
</div>

<?php
echo "<span class='edit-treatments'>";
foreach ($tratamientos as $tratamiento) {
    echo "<div class='card mb-5'>";
    echo "<img src='".$tratamiento->getImg()."'></img>";
    echo "<div class='multi-button'>";
    echo "<a href='home.php?type=_editar_tratamiento&id=".$tratamiento->getId()."'><button class='fa-solid fa-pencil'></button></a></div>";
    echo "<p class='text-center my-2'>".$tratamiento->getNombre()."</p>";
    echo "<div class='container'></div>";
    echo "</div>";
}
echo "</span>";
?>

    
        
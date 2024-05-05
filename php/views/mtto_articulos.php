<h1 class="text-center">Hola <?php echo $_SESSION['user_log']->getNombre()?></h1>
<h3 class="text-center">¿Que tipo de articulos quieres modificar?</h3>

<span class='dinamic-cards'>
    <a href="home.php?type=_mostrar_tratamientos">
        <figure style="--c:#fff5">
            <img src="img/happy-girl.jpg" alt="happy-girl">
            <figcaption>Tratamientos</figcaption>
        </figure>
    </a>    
    <a href="home.php?type=_mostrar_articulos">
        <figure style="--c:#fff5">
            <img src="img/productos.jpg" alt="Mountains">
            <figcaption>Articulos</figcaption>
        </figure>
    </a>
<span>
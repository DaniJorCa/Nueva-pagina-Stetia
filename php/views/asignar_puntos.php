<div class="container mt-5 col-8">
    <div class="d-flex flex-row">
        <h2 class="text-center mb-4 col-10">Asignar Puntos</h2>
        <div class="d-flex flex-column justify-content-center align-items-center bg-primary text-white rounded-circle col-2" style="width: 100px; height: 100px;">
            <h1 class="m-0"><?php echo $usuario->getPuntos(); ?></h1>
            <p>Puntos</p>
        </div>
    </div>
        <form method="POST" class='d-flex flex-column justify-content-center'action="home.php?type=_set_points&id=<?php echo $_SESSION['id_asignar_puntos']; ?>">
            <div class="form-group text-center">
                <img src="<?php echo $usuario->getImg() ? $usuario->getImg() : 'img/background/home_user.png'; ?>" alt="User Image" class="user-img">
                
            </div>
            <div class="form-group my-3 col-12 d-flex flex-column justify-content-center">
                <label for="puntos">Asignar Puntos</label>
                <input name="puntos" type="text" class="form-control" id="puntos" pattern="[0-9]{0-5}" required>
                <div class="invalid-feedback">Por favor, introduce un número entero de máximo 5 cifras.</div>
                <button type="submit" class="btn btn-secondary btn-md btn-cta">Asignar Puntos</button>
            </div>
        </form>
    </div>
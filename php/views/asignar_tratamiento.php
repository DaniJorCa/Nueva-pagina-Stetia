<div class="container mt-5 col-8">
        <h2 class="text-center mb-4">Asignar Tratamiento</h2>
        <form method="POST" action="home.php?type=_set_treatment&id=<?php echo $_SESSION['id_asignar_tratamiento']; ?>">
            <div class="form-group text-center">
            <img src="<?php echo $usuario->getImg() ? $usuario->getImg() : 'img/background/home_user.png'; ?>" alt="User Image" class="user-img">

            </div>
            <div class="form-group my-3">
                <label for="options">Seleccionar tratamiento</label>
                <select class="form-control" id="treatment" name="treatment">
<?php
    foreach($tratamientos as $tratamiento){
        echo '<option value="'.$tratamiento['id'].'">'.$tratamiento['nombre'].'</option>';
    }
?>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary btn-md btn-cta">Asignar Tratamiento</button>
        </form>
    </div>
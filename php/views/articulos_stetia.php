

<div id="spinner" style="display: none; height: 100vh; justify-content: center; align-items: center;">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Cargando</span>
    </div>
</div>
<div id='table_hidden_spinner'>
<div class="d-flex justify-content-center">
    <img src="img/icons/productos.png" class="icon">
    <h1 class="text-center titulo_h1">Listado de articulos</h1>
</div>
<h3 class="text-center">Aqui puedes modificar los articulos</h3>
<div class='row d-flex container-fluid justify-content-end align-center align-items-center mb-4'>
    <div class= 'col-12 align-middle d-flex justify-content-between align-items-center'>
      <div class='row col-1'>
        <button class='btn btn-white col-1 align-middle mx-1s mx-2' id='show_detail_art'><i class="fa-solid fa-expand" style="color: #831959; font-size: 1.3em;"></i></button>
        <button class='btn btn-white col-1 align-middle mx-1s mx-2' id='show_list_art'><i class="fa-solid fa-table-list" style="color: #831959; font-size: 1.3em;"></i></button>
      </div>
      <div class='row col-10 align-items-center'>
        <select id='type-select' class="custom-select custom-select-sm col-2 form-select-sm">
            <option value='nombre'>Nombre</option>
            <option value='descrip'>Descripcion</option>
            <option value='iva'>Iva</option>
            <option value='dto'>Dto</option>
            <option value='precio'>Precio</option>
        </select>
        <input class='col-3 mx-2 bg-white border border-success align-middle form-control-sm' id='search' placeholder='¿Buscas algo en concreto?'>
        <a id='btn_search' class='btn btn-primary col-3 align-middle mx-1 btn-cta'>Búsqueda Selectiva</a>
        <a class='btn btn-primary col-3 align-middle mx-1s btn-cta' href='home.php?type=_mostrar_articulos'>Mostrar Todos</a>
      </div>
    </div>
    <div class='d-flex justify-content-end flex-row'>
      <label class='mx-4'>
          <input type="checkbox" id="checkboxArtBaja"> Artículos de Baja
      </label>
    </div>
</div>

<?php
if(!isset($_GET['viewer'])){
?>
<div class="table-responsive my-4" id='table-usuarios'>
  <table class="table table-striped table-hover" id='table_art'>
  <caption>Listado de articulos</caption>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio</th>
      <th scope="col">iva</th>
      <th scope="col">Dto</th>
      <th scope="col">Imagen</th>
    </tr>
  </thead>
  <tbody>
<?php
//include_once('php/models/clases.php');
  foreach ($array_articulos as $articulo) {
      echo '<tr>';
      echo '<th scope="row">'.$articulo->getId().'</th>';
      echo '<td>'.$articulo->getNombre(). '</td>';
      echo '<td>'.$articulo->getDescrip(). '</td>';
      echo '<td>' .$articulo->getPrecio().'</td>';
      echo '<td>'.$articulo->getIva(). '</td>';
      echo '<td>' .$articulo->getDto().'</td>';
      echo '<td><img src="' .$articulo->getImg().'" style="width: 30px; height: 30px;"></td>';
      echo '</tr>';
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
?>
<div class='row col-12 d-flex justify-content-end flex-end'>
    <a href="home.php?type=_nuevo_articulo" class='col-12'><button class="btn btn-md btn-cta m-0"><i class="fa-solid fa-plus mx-2" style="color: #FFA88B;"></i>Nuevo Artículo</button></a>
</div>
<?php
}
?>
</div>

<?php
if(isset($_GET['viewer']) && $_GET['viewer'] == 'detail'){
?>



<form class="row col-12 container-fluid mt-3 needs-validation" method="POST" action='home.php?type=_update_articulo' enctype='multipart/form-data' novalidate>
    <div class="card mb-3 col-12 col-md-4">
    <div class="row g-0"style="overflow: hidden;">
        <img src="<?php echo $articulo_consultado->getImg() ?>">
        <div class="col-12 col-md-4">
        <input type='file' name='imagen' id='imagen' style="display: none; " onchange="showPreview()">
        <div class="valid-feedback">
                Imagen válida
            </div>
            <div class="invalid-feedback">
                Imagen necesaria.
            </div>
        <img id="preview" src="#"  style="max-width: 350px; height: 380px;">
        <label for="imagen" >
            <i class="fa-solid fa-upload" style="color: #831959;"></i>
        </label>
        </div>
    </div>
    </div>
    <div class="col-12 col-md-8">
        <div class="mb-3">
            <label for="id_tratamiento" class="form-label" name="id">Id Articulo</label>
            <input type="text" value='<?php  echo $articulo_consultado->getId()?>' name='id' class="form-control" id="id_tratamiento" aria-describedby="id_articulo" disabled>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label" name="nombre">Nombre</label required>
            <input type="text" value='<?php  echo $articulo_consultado->getNombre()?>' class="form-control" id="nombre" name='nombre'>
        </div>
        <div class="mb-3 form_floating">
            <div class="form-floating">
            <textarea class="form-control" name="descrip" id="floatingTextarea" required><?php  echo $articulo_consultado->getDescrip()?></textarea>
            <label for="floatingTextarea">Descripcion</label>
            </div>
            <div class="mb-3">
                <label for="validationCustom01" class="form-label">Precio</label>
                <input type="number" value='<?php  echo $articulo_consultado->getPrecio()?>' id="validationCustom01" class="form-control" step="0.01" placeholder="29.99" name="precio" id="precio" required>
                <div class="valid-feedback">
                    Precio válido
                </div>
                <div class="invalid-feedback">
                    Precio inválido. Formato enteros y 2 decimales.
                </div>
            </div>

            <div class="mb-3">
                <label for="iva" class="form-label" name="iva">IVA</label required>
                <input type="number" value='<?php  echo $articulo_consultado->getIva()?>' class="form-control" id="iva" name='iva'>
                <div class="valid-feedback">
                    Iva valido.
                </div>
                <div class="invalid-feedback">
                    Iva inválido. Formato 2 numeros enteros.
                </div>
            </div>

            <div class="mb-3">
                <label for="dto" class="form-label" name="dto">Descuento</label required>
                <input type="number" value='<?php echo $articulo_consultado->getDto()?>' class="form-control" id="dto" name='dto'>
                <div class="valid-feedback">
                    Descuento válido
                </div>
                <div class="invalid-feedback">
                    Descuento inválido. Formato enteros y 2 decimales.
                </div>
            </div>
            <div class="form-floating">
                <select class="form-select" id="baja" aria-label="Floating label select example" name='baja' required>
                    <option value="0" <?php if ($articulo_consultado->getBaja() == 0) echo "selected"; ?>>Dar de alta</option>
                    <option value="1" <?php if ($articulo_consultado->getBaja() == 1) echo "selected"; ?>>Dar de baja</option>
                </select>
                <?php
                    if ($articulo_consultado->getBaja() == 0){
                        echo '<label for="baja"> Articulo actualmente de alta. Quieres darlo de baja? </label>';
                    }else{
                        echo '<label for="baja"> Articulo actualmente de baja. Quieres darlo de alta? </label>';
                    }
        
                ?>
            </div>
           
        </div>
        <div class="col-12 d-flex justify-content-center">
        <button class="w-70 btn btn-md btn-cta m-0" type="submit" name="form_contact">Modicar articulo</button>
    </div>
    </div>
</form>
<?php
}
?>
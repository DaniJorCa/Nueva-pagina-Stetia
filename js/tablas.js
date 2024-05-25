document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar la tabla
    let table = document.getElementById('table');
    let id = "";

    // Agregar un event listener para hacer clic en la tabla
    if(table){
      table.addEventListener('click', function(event) {
        // Verificar si el clic ocurrió en una fila (tr)
        var target = event.target;
        if (target.tagName.toLowerCase() === 'td') {
            // Obtener la fila (tr) correspondiente al clic
            var row = target.parentNode;
            
            // Obtener el ID de la primera celda (th) en la fila
            id = row.firstElementChild.textContent;

            // Hacer algo con el ID (por ejemplo, mostrarlo en la consola)
            console.log('ID capturado:', id);
        }
        });  
    }
    

    let button_detail = document.getElementById('show_detail');
    let button_list = document.getElementById('show_list');

    if(button_detail){
      button_detail.addEventListener("click", function() {
        // Asigna la URL a la que quieres redirigir
        let url = "home.php?type=_users_maiteinance&viewer=detail&master_view_user=" + id;
        // Redirige a la URL especificada
        window.location.href = url;
        });  
    }
    
    if(button_list){
    button_list.addEventListener("click", function() {
        // Asigna la URL a la que quieres redirigir
        let url = "home.php?type=_users_maiteinance";
        // Redirige a la URL especificada
        window.location.href = url;
    });
}


    let boton_baja = document.getElementById('user_baja');
    let boton_alta = document.getElementById('user_alta');
    let boton_superuser = document.getElementById('superuser');
    let boton_not_superuser = document.getElementById('not-superuser');
    var urlActual = window.location.href;
    // Crear un nuevo objeto URLSearchParams con la URL actual
    var parametrosURL = new URLSearchParams(urlActual);
    // Obtener el valor del parámetro "master_view_user"
    var numeroUsuario = parametrosURL.get('master_view_user');

    if (urlActual.includes('&baja=') || urlActual.includes('&alta=') || urlActual.includes('&superuser=') || urlActual.includes('&not-superuser=')) {
        // Eliminar los parámetros 'baja' y 'alta' junto con sus valores
        url_limpia = urlActual.replace(/([&?]baja=)[^&]+/g, ''); // Elimina el parámetro 'baja'
        url_limpia = urlActual.replace(/([&?]alta=)[^&]+/g, ''); // Elimina el parámetro 'alta'
        url_limpia = urlActual.replace(/([&?]superuser=)[^&]+/g, ''); // Elimina el parámetro 'superuser'
        url_limpia = urlActual.replace(/([&?]not-superuser=)[^&]+/g, ''); // Elimina el parámetro 'not-superuser'
        url_limpia = urlActual.replace(/([&?]showMasters=)[^&]+/g, ''); // Elimina el parámetro 'showMasters'
        // Elimina los caracteres '&' y '?' sobrantes
        url_final = url_limpia.replace(/&+/g, '&').replace('?&', '?').replace(/&$/, '').replace(/\?$/, '');
    }else{
        url_final = urlActual;
    }

    // Imprimir la URL modificada
    console.log(url_final);


    if(boton_baja){
      boton_baja.addEventListener("click", function() {
        // Asigna la URL a la que quieres redirigir
        let url = url_final + '&baja=' + numeroUsuario;
        // Redirige a la URL especificada
        window.location.href = url;
    });  
    }
    
    if(boton_alta){
       boton_alta.addEventListener("click", function() {
        // Asigna la URL a la que quieres redirigir
        let url = url_final + '&alta=' + numeroUsuario;
        // Redirige a la URL especificada
        window.location.href = url;
    });
    }

    if(boton_superuser){
        
    boton_superuser.addEventListener("click", function() {

        if (url_limpia.includes('&not-superuser=')) {
        // Eliminar los parámetros 'baja' y 'alta' junto con sus valores
        url_limpia = url_limpia.replace(/([&?]not-superuser=)[^&]+/g, ''); // Elimina el parámetro 'not-superuser'
        // Elimina los caracteres '&' y '?' sobrantes
        url_final = url_limpia.replace(/&+/g, '&').replace('?&', '?').replace(/&$/, '').replace(/\?$/, '');
    }else{
        url_final = urlActual;
    }
         // Asigna la URL a la que quieres redirigir
         let url = url_final + '&superuser=' + numeroUsuario;
         // Redirige a la URL especificada
         window.location.href = url;
     });
     }

     if(boton_not_superuser){
        boton_not_superuser.addEventListener("click", function() {
            if (url_limpia.includes('&superuser=')) {
            // Eliminar los parámetros 'baja' y 'alta' junto con sus valores
            url_limpia = url_limpia.replace(/([&?]superuser=)[^&]+/g, ''); // Elimina el parámetro 'not-superuser'
            // Elimina los caracteres '&' y '?' sobrantes
            url_final = url_limpia.replace(/&+/g, '&').replace('?&', '?').replace(/&$/, '').replace(/\?$/, '');
        }else{
            url_final = urlActual;
        }
         // Asigna la URL a la que quieres redirigir
         let url = url_final + '&not-superuser=' + numeroUsuario;
         // Redirige a la URL especificada
         window.location.href = url;
     });
     }
     var urlMaster = window.location.href;
     let url_limpiaMaster = "";

     var partesURL = urlMaster.split('?');

    // La primera parte de la URL contiene la ruta y el dominio, la segunda parte contiene los parámetros
    var ruta = partesURL[0];
    var parametros = partesURL[1];

    if (parametros && parametros.includes('show_masters')) {
        // Divide los parámetros utilizando el carácter '&' y filtra aquellos que no contengan 'showMasters'
        var parametrosFiltrados = parametros.split('&').filter(function(parametro) {
            return !parametro.includes('show_masters');
        });

        // Reconstructa la URL sin el parámetro 'showMasters' y sus valores
        url_limpiaMaster = ruta + '?' + parametrosFiltrados.join('&');
    } else {
        url_limpiaMaster = urlMaster;
    }


    let checkboxMaster = document.getElementById('checkboxMaster');
    let checkboxBaja = document.getElementById('checkboxBaja');
    let estadoCheckboxBaja = localStorage.getItem('miCheckboxBajaEstado');
    let estadoCheckboxMaster = localStorage.getItem('miCheckboxMasterEstado');


   
    
    if(checkboxMaster){
        checkboxMaster.addEventListener("change", function() {
        localStorage.setItem('miCheckboxMasterEstado', checkboxMaster.checked);
         // Redirige a la URL especificada
         if (checkboxMaster.checked) {
                // Si el checkboxMaster está seleccionado, borra '&showMasters' de la URL
                window.location.href = url_limpiaMaster + '&show_masters';
            } else {
                // Si el checkboxMaster no está seleccionado, eliminar '&showMasters' de la URL
                window.location.href = url_limpiaMaster ;
            }
     });
     }

     var urlBaja = window.location.href;
     let url_limpiaBaja = "";

    // La primera parte de la URL contiene la ruta y el dominio, la segunda parte contiene los parámetros
   
     if (parametros && parametros.includes('show_lows')) {
        // Divide los parámetros utilizando el carácter '&' y filtra aquellos que no contengan 'showMasters'
        var parametrosFiltrados = parametros.split('&').filter(function(parametro) {
            return !parametro.includes('show_lows');
        });

        // Reconstructa la URL sin el parámetro 'showMasters' y sus valores
        url_limpiaBaja = ruta + '?' + parametrosFiltrados.join('&');
    } else {
        url_limpiaBaja = urlBaja;
    }

    if (checkboxMaster) {
        if (estadoCheckboxMaster === 'true' && estadoCheckboxBaja === 'true') {
            checkboxMaster.checked = true;
            checkboxBaja.checked = true;
            // Ambos checkboxes están activados
            if (!window.location.href.includes('&show_masters')) {
                // Si no está presente, agregar el parámetro '&show_masters' a la URL
                url_a_redirigir = url_limpiaBaja + '&show_masters' + '&show_lows';
                mostrarSpinnerYRedirigir(url_a_redirigir);
            }
            if (!window.location.href.includes('&show_lows')) {
                // Si no está presente, agregar el parámetro '&show_lows' a la URL
                window.location.href = url_limpiaBaja + '&show_lows';
            }
        } else if (estadoCheckboxMaster === 'true') {
            // Solo el checkbox Master está activado
            checkboxMaster.checked = true;
            if (!window.location.href.includes('&show_masters')) {
                // Si no está presente, agregar el parámetro '&show_masters' a la URL
                url_a_redirigir = url_limpiaBaja + '&show_masters';
                mostrarSpinnerYRedirigir(url_a_redirigir);
            }
        } else if (estadoCheckboxBaja === 'true') {
            checkboxBaja.checked = true;
            if (!window.location.href.includes('&show_lows')) {
                // Si no está presente, agregar el parámetro '&show_lows' a la URL
                url_a_redirigir = url_limpiaBaja + '&show_lows';
                mostrarSpinnerYRedirigir(url_a_redirigir);
            }
        }
    }
    
    
  

    if(checkboxBaja){
        checkboxBaja.addEventListener("change", function() {
        localStorage.setItem('miCheckboxBajaEstado', checkboxBaja.checked);
         // Redirige a la URL especificada
         if (checkboxBaja.checked) {
                // Si el checkboxMaster está seleccionado, borra '&showMasters' de la URL
                window.location.href = url_limpiaBaja + '&show_lows';
            } else {
                // Si el checkboxMaster no está seleccionado, eliminar '&showMasters' de la URL
                window.location.href = url_limpiaBaja ;
            }
     });
     }


     function mostrarSpinnerYRedirigir(url) {
        // Oculta la tabla
        document.getElementById('table_hidden_spinner').style.display = 'none';
        // Muestra el spinner
        document.getElementById('spinner').style.display = 'flex';
        
        // Espera un momento antes de redirigir (opcional, para que el spinner sea visible)
        setTimeout(function() {
            // Redirige a la URL especificada
            window.location.href = url;
        }, 1000); // Espera 1 segundo (ajusta este valor según sea necesario)
    }

}); 

document.addEventListener('DOMContentLoaded', function() {

    function mostrarSpinnerYRedirigir(url) {
        // Oculta la tabla
        document.getElementById('table_hidden_spinner').style.display = 'none';
        // Muestra el spinner
        document.getElementById('spinner').style.display = 'flex';
        
        // Espera un momento antes de redirigir (opcional, para que el spinner sea visible)
        setTimeout(function() {
            // Redirige a la URL especificada
            window.location.href = url;
        }, 1000); // Espera 1 segundo (ajusta este valor según sea necesario)
    }

    let chek_art_baja = document.getElementById('checkboxArtBaja');
    let estadoCheckboxArtBaja = localStorage.getItem('estadoCheckboxArtBaja');
    let button_detail_art = document.getElementById('show_detail_art');
    let button_list_art= document.getElementById('show_list_art');
    let table_art = document.getElementById('table_art');
    let id_art = "";

    // Agregar un event listener para hacer clic en la tabla
    if(table_art){
        table_art.addEventListener('click', function(event) {
          // Verificar si el clic ocurrió en una fila (tr)
          var target = event.target;
          if (target.tagName.toLowerCase() === 'td') {
              // Obtener la fila (tr) correspondiente al clic
              var row = target.parentNode;
              
              // Obtener el ID de la primera celda (th) en la fila
              id_art = row.firstElementChild.textContent;
  
              // Hacer algo con el ID (por ejemplo, mostrarlo en la consola)
              console.log('ID capturado:', id_art);
          }
          });  
      }


    if(button_detail_art){
        button_detail_art.addEventListener("click", function() {
        // Asigna la URL a la que quieres redirigir
        console.log("boton pulsado");
        let url = "home.php?type=_mostrar_articulos&viewer=detail&master_view_art=" + id_art;
        // Redirige a la URL especificada
        window.location.href = url;
        });
    }  
    
    if(button_list_art){
        button_list_art.addEventListener("click", function() {
            // Asigna la URL a la que quieres redirigir
            let url = "home.php?type=_mostrar_articulos";
            // Redirige a la URL especificada
            window.location.href = url;
        });
    }

    let url_now = window.location.href;
    let url_limpia_de_show_lows = "";

    var partesURL = url_now.split('?');

    // La primera parte de la URL contiene la ruta y el dominio, la segunda parte contiene los parámetros
    var ruta_actual = partesURL[0];
    var parametros_actual = partesURL[1];

    // La primera parte de la URL contiene la ruta y el dominio, la segunda parte contiene los parámetros
   
    if (parametros_actual && parametros_actual.includes('show_lows')) {
        // Divide los parámetros utilizando el carácter '&' y filtra aquellos que no contengan 'showLows'
        var parametrosFiltrados = parametros_actual.split('&').filter(function(parametros_actual) {
            return !parametros_actual.includes('show_lows');
        });

        // Reconstructa la URL sin el parámetro 'showMasters' y sus valores
        url_limpia_de_show_lows = ruta_actual + '?' + parametrosFiltrados.join('&');
    } else {
        url_limpia_de_show_lows = url_now;
    }


    if(chek_art_baja){
        chek_art_baja.addEventListener("change", function() {
            localStorage.setItem('estadoCheckboxArtBaja', chek_art_baja.checked);
            // Redirige a la URL especificada
        if (chek_art_baja.checked) {
            // Si el checkboxArtMaster está seleccionado, borra '&showMasters' de la URL
            window.location.href = url_limpia_de_show_lows + '&show_lows';
        } else {
            // Si el checkboxMaster no está seleccionado, eliminar '&showMasters' de la URL
            window.location.href = url_limpia_de_show_lows ;
        }
        });
    }
    
    if(chek_art_baja){
        console.log("Check art baja es true");
       if(estadoCheckboxArtBaja === 'true'){
            console.log("estadoCheckboxArtBaja es true");
            chek_art_baja.checked = true;
            if (!window.location.href.includes('&show_lows')) {
                // Si no está presente, agregar el parámetro '&show_masters' a la URL
                url_a_redirigir = url_limpia_de_show_lows + '&show_lows';
                mostrarSpinnerYRedirigir(url_a_redirigir);  
            }
        }else{
            chek_art_baja.checked = false;
        } 
    }
    

        
    //Selector de filas de tabla para cambiarles el color a la que esta pulsada

    var filas = document.querySelectorAll('#table-usuarios tbody tr');
    console.log(filas);

  // Agrega un event listener a cada fila
  filas.forEach(function(fila) {
        fila.addEventListener('click', function() {
        // Remueve la clase 'seleccionada' de todas las filas
        filas.forEach(function(f) {
            f.classList.remove('seleccionada');
        });

        // Agrega la clase 'seleccionada' a la fila seleccionada
        fila.classList.add('seleccionada');
        });
  });

  boton_delete_user = document.getElementById('delete_user');
  boton_confirm_delete = document.getElementById('del_user');
  boton_life_user = document.getElementById('save_life_user');
  card_usuario = document.getElementById('card-usuario');
  div_eliminar_usuario = document.getElementById('eliminar_usuario');
  if(div_eliminar_usuario){
    div_eliminar_usuario.style.display = 'none';
  }
  


  if(boton_confirm_delete && boton_life_user){
    
    if(boton_delete_user){
       boton_delete_user.addEventListener('click', function(){
        card_usuario.style.display = 'none';
        div_eliminar_usuario.style.display = 'flex'; 
        }); 
    }
    

    boton_life_user.addEventListener('click', function(){
        card_usuario.style.display = 'flex';
        div_eliminar_usuario.style.display = 'none';
    });

    boton_confirm_delete.addEventListener('click', function(){
        let url = window.location.href;
        let regex = /master_view_user=(\d+)/;
        // Ejecutar la expresión regular en la URL
        var match = url.match(regex);
        if (match && match[1]) {
            var numero = parseInt(match[1]);
            window.location.href = 'home.php?type=_delete_user&id=' + numero;
            console.log(numero);
        } else {
            console.log("No se encontró el número después de 'master_view_user=' en la URL.");
        }


    });

  }

}); 
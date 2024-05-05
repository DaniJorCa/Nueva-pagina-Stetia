document.addEventListener('DOMContentLoaded', function() {
    // Seleccionar la tabla
    let table = document.getElementById('table');
    let id = 1;

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


    button_detail.addEventListener("click", function() {
        // Asigna la URL a la que quieres redirigir
        let url = "home.php?type=_users_maiteinance&viewer=detail&master_view_user=" + id;
        // Redirige a la URL especificada
        window.location.href = url;
    });

    button_list.addEventListener("click", function() {
        // Asigna la URL a la que quieres redirigir
        let url = "home.php?type=_users_maiteinance";
        // Redirige a la URL especificada
        window.location.href = url;
    });


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
         // Asigna la URL a la que quieres redirigir
         let url = url_final + '&superuser=' + numeroUsuario;
         // Redirige a la URL especificada
         window.location.href = url;
     });
     }

     if(boton_not_superuser){
        boton_not_superuser.addEventListener("click", function() {
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


    const checkboxMaster = document.getElementById('checkboxMaster');
    const checkboxBaja = document.getElementById('checkboxBaja');
    const estadoCheckboxBaja = localStorage.getItem('miCheckboxBajaEstado');
    const estadoCheckboxMaster = localStorage.getItem('miCheckboxMasterEstado');


    if (estadoCheckboxMaster === 'true') {
        checkboxMaster.checked = true;
    }else{
        console.log("checkboxmaster apagado");
        
    }
    
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


     if (estadoCheckboxBaja === 'true') {
        checkboxBaja.checked = true;
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

}); 


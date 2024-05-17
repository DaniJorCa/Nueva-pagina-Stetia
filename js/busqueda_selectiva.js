document.addEventListener("DOMContentLoaded", function() {  

    let selectedOption = ""

    let campo_busqueda = document.getElementById('search');
    let boton_busqueda = document.getElementById('btn_search');
    let desplegable_type = document.getElementById('type-select');
    if(desplegable_type){
        let selectedIndex = desplegable_type.selectedIndex; 
        selectedOption = desplegable_type.options[selectedIndex];  
    }
    
    
    if(selectedOption){
        let tipo = selectedOption.value;
    }
 
    let type = '';
    let busqueda = '';
  

    var url = window.location.href;

    // Verificar si la URL contiene la cadena '_users_manteinance' o '_mostrar_articulos'
    if (url.includes('home.php?type=_users_maiteinance')) {
        // La URL contiene '_users_manteinance'
        var regex = /home\.php\?type=(\_users\_maiteinance|\_mostrar\_articulos)/;
        var match = url.match(regex);
        if (match) {
            // Extraer la parte deseada de la URL
            var url_final = match[0];
            console.log("Parte deseada de la URL:", url_final);
        } else {
            console.log("No se encontró la parte deseada en la URL.");
        }
        type = '&search_type=dni&';
        busqueda = 'home.php?type=_users_maiteinance'+ type + 'search=';
        console.log('La URL contiene _users_manteinance');
    } else if (url.includes('home.php?type=_mostrar_articulos')) {
        // La URL contiene '_mostrar_articulos'
        var regex = /home\.php\?type=(\_users\_maiteinance|\_mostrar\_articulos)/;
        var match = url.match(regex);
        if (match) {
            // Extraer la parte deseada de la URL
            var url_final = match[0];
            console.log("Parte deseada de la URL:", url_final);
        } else {
            console.log("No se encontró la parte deseada en la URL.");
        }
        type = '&search_type=nombre&';
        busqueda = 'home.php?type=_mostrar_articulos'+ type + 'search=';
        console.log('La URL no contiene _mostrar_articulos');
    } else {
        // La URL no contiene ninguna de las cadenas especificadas
        console.log('La URL no contiene _users_manteinance ni _mostrar_articulos');
    }


    if(desplegable_type){
      desplegable_type.addEventListener('change', () => {
        let selectedIndex = desplegable_type.selectedIndex;
        let selectedOption = desplegable_type.options[selectedIndex];
        tipo = selectedOption.value;
        type = '&search_type=' + tipo + '&search=';
        busqueda = url_final + type;
    });  


    }
    
    if(campo_busqueda){
        campo_busqueda.addEventListener('input',  () => {
        boton_busqueda.href = busqueda + campo_busqueda.value;
        }); 
    }
    

});
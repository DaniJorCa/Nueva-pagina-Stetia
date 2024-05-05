document.addEventListener("DOMContentLoaded", function() {  

    let campo_busqueda = document.getElementById('search');
    let boton_busqueda = document.getElementById('btn_search');
    let desplegable_type = document.getElementById('type-select');
    let selectedIndex = desplegable_type.selectedIndex;
    let selectedOption = desplegable_type.options[selectedIndex];
    let tipo = selectedOption.value;
    let type = '&search_type=dni&';
    let busqueda = 'home.php?type=_users_maiteinance'+ type + 'search=';
  
  
    desplegable_type.addEventListener('change', () => {
        let selectedIndex = desplegable_type.selectedIndex;
        let selectedOption = desplegable_type.options[selectedIndex];
        tipo = selectedOption.value;
        type = '&search_type=' + tipo + '&search=';
        busqueda = 'home.php?type=_users_maiteinance'+ type;
    });
  
    campo_busqueda.addEventListener('input',  () => {
        boton_busqueda.href = busqueda + campo_busqueda.value;
    }); 

});
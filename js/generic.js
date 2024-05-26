document.addEventListener('DOMContentLoaded', function() {


    function mostrarSpinnerYRedirigir(url, elemento_a_ocultar) {
        // Oculta la tabla
        document.getElementById(elemento_a_ocultar).style.display = 'none';
        // Muestra el spinner
        document.getElementById('spinner').style.display = 'flex';
        
        // Espera un momento antes de redirigir (opcional, para que el spinner sea visible)
        setTimeout(function() {
            // Redirige a la URL especificada
            window.location.href = url;
        }, 1000); // Espera 1 segundo (ajusta este valor según sea necesario)
    }
    
    
//Control de ventanas consulta usuario master

let window_mensaje = document.getElementById('div_send_user_message');
let btn_send_user_message = document.getElementById('btn_send_user_message');
let div_general = document.getElementById('ocultar_generico');
let btn_send_cancel_message = document.getElementById('cancel-send-message');

if(window_mensaje){
 window_mensaje.style.display = 'none';   
}
if(div_general){
   div_general.style.display = 'block';
 
}

if(window_mensaje){
    btn_send_user_message.addEventListener('click', function(){
        div_general.style.display = 'none';
        window_mensaje.style.display = 'flex';
    });

    btn_send_cancel_message.addEventListener('click', function(){
        div_general.style.display = 'block';
        window_mensaje.style.display = 'none';
    });
}


// Seleccionar todos los elementos con la clase 'btn-del-correo'
const botonesBorrar = document.querySelectorAll('.btn-del-correo');

// Iterar sobre todos los botones seleccionados
botonesBorrar.forEach(boton => {
    // Añadir un evento 'click' a cada botón
    boton.addEventListener('click', e => {

        console.log('Se hizo clic en el botón de borrar correo.');
        // Por ejemplo, puedes llamar a una función de eliminación de correo
        eliminarCorreo(boton.dataset.id);
    });
});

// Función para eliminar el correo
function eliminarCorreo(idCorreo) {
    // Redirigir a una nueva página HTML y mandar el idCorreo
    window.location.href = 'home.php?type=_del_correo&id=' + idCorreo;
}

//Buscamos la presencia de user_view en la url

// Obtener la URL actual
let urlActual = window.location.href;

// Crear un nuevo objeto URLSearchParams con la URL actual
let parametrosURL = new URLSearchParams(urlActual);

// Verificar si el parámetro 'user_view' está presente en la URL
if (!parametrosURL.has('user_view')) {
    // El parámetro 'user_view' no está presente en la URL
    // Realiza la acción que deseas hacer cuando el parámetro no está presente
    localStorage.setItem('estado_div_show_messages', 'block');
    localStorage.setItem('estado_div_read_message', 'none');
} else {
    // El parámetro 'user_view' está presente en la URL
    // Realiza la acción que deseas hacer cuando el parámetro está presente
    localStorage.setItem('estado_div_show_messages', 'none');
    localStorage.setItem('estado_div_read_message', 'block');
}




let estado_div_read_message = localStorage.getItem('estado_div_read_message') || 'none';
let estado_div_show_messages = localStorage.getItem('estado_div_show_messages') || 'block';

if(estado_div_read_message !== null && estado_div_show_messages !== null && document.getElementById('div-read-message') && document.getElementById('div-show-messages')){
    document.getElementById('div-read-message').style.display = estado_div_read_message;
    document.getElementById('div-show-messages').style.display = estado_div_show_messages; 
}



const botonesLeer = document.querySelectorAll('.btn-read-correo');


// Iterar sobre todos los botones seleccionados
botonesLeer.forEach(boton => {
    // Añadir un evento 'click' a cada botón
    boton.addEventListener('click', e => {
        document.getElementById('div-show-messages').style.display = 'none';
        document.getElementById('div-read-message').style.display = 'block';

        localStorage.setItem('estado_div_show_messages', 'none');
        localStorage.setItem('estado_div_read_message', 'block');
        leerCorreo(boton.dataset.id);
    });
});

// Función para eliminar el correo
function leerCorreo(idCorreo) {
    url_a_redirigir = 'home.php?type=_my_messages&user_view=' + idCorreo;
    mostrarSpinnerYRedirigir(url_a_redirigir, 'div-show-messages');
}

if(document.getElementById('btn_show_all_messages')){
   document.getElementById('btn_show_all_messages').addEventListener('click', function(){
    url_a_redirigir = 'home.php?type=_my_messages';
    document.getElementById('div-show-messages').style.display = 'block';
    localStorage.setItem('estado_div_show_messages', 'block');
    localStorage.setItem('estado_div_read_message', 'none');
    mostrarSpinnerYRedirigir(url_a_redirigir, 'div-read-message');
}); 
}


if(document.getElementById('btn_set_treatment')){
  document.getElementById('btn_set_treatment').addEventListener('click', function(){
        // Obtener la URL actual
    let urlCompleta = window.location.href;

    // Extraer el número de la URL
    let numero = urlCompleta.match(/master_view_user=(\d+)/);

    // Verificar si se encontró el número en la URL
    if (numero && numero.length > 1) {
        // Obtener el número desde la coincidencia en la expresión regular
        let numeroExtraido = numero[1];
        console.log(numeroExtraido); // Imprimir el número extraído
        localStorage.setItem('id_asignar_tratamiento', numeroExtraido);
        window.location.href = 'home.php?type=_selection_treatment&id=' + numeroExtraido;
    } else {
        console.log("No se encontró ningún número en la URL.");
    }    
});  
}


if(document.getElementById('btn_set_points')){
    document.getElementById('btn_set_points').addEventListener('click', function(){
          // Obtener la URL actual
      let urlCompleta = window.location.href;
  
      // Extraer el número de la URL
      let numero = urlCompleta.match(/master_view_user=(\d+)/);
  
      // Verificar si se encontró el número en la URL
      if (numero && numero.length > 1) {
          // Obtener el número desde la coincidencia en la expresión regular
          let numeroExtraido = numero[1];
          console.log(numeroExtraido); // Imprimir el número extraído
          localStorage.setItem('id_asignar_puntos', numeroExtraido);
          window.location.href = 'home.php?type=_modify_points&id=' + numeroExtraido;
      } else {
          console.log("No se encontró ningún número en la URL.");
      }    
  });  
  }

});
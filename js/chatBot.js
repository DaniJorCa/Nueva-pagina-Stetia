
document.addEventListener('DOMContentLoaded', function() {

//Funcion que envuelve todo, Si el servidor esta caido no funciona nada.
let aviso = document.getElementById('connection_err')
let btnPrompt = document.getElementById("btn-prompt");
let divPrompt = document.getElementById("visible");
let prompt_actual = document.getElementById("actual_prompt");
let newPrompt = document.getElementById('new_prompt')
let btn_send_new_prompt = document.getElementById('btn_new_prompt')
let btn_download_history = document.getElementById('download_history')
let btn_delete_json_history = document.getElementById('delete_json')
let div_chatbot = document.getElementsByClassName('chatbox__button')[0];
let btn_new_embeddings = document.getElementById('btn_embedding')
let btn_download_embeddings = document.getElementById('download_embeddings')
let btn_confirm_delete_knowledge = document.getElementById('del_knowledge')
let btn_cancel_delete_knowledge = document.getElementById('cancel_del_knowledge')
let window_answer_delete_knowledge = document.getElementById('answer_if_delete_knowledge')
let bnt_activate_window_question_delete_knowledge = document.getElementById('bnt_question_embedings')
let longitud_chromaDB = document.getElementById('longitud_BBDD')

//borrado de conocimiento
let btn_cancel_new_knowledge = document.getElementById('cancel_new_knowledge')
let window_upload_new_knowledge = document.getElementById('upload_knowledge_form')

//Declaramos todos los servicios disabled
prompt_actual.disabled = true;
newPrompt.disabled = true;
btn_send_new_prompt.disabled = true;
div_chatbot.style.display = 'none';
aviso.style.display = 'flex';
window_answer_delete_knowledge.style.display = 'none';
window_upload_new_knowledge.style.display = 'none';
btn_new_embeddings.disabled = true;
btn_delete_json_history.disabled = true;
btn_download_embeddings.disabled= true;
bnt_activate_window_question_delete_knowledge.disabled = true;
btn_download_history.disabled = true;
btnPrompt.disabled = true;

get_status();
getLongChromaDb();

//Control del boton eliminar conocimiento
bnt_activate_window_question_delete_knowledge.addEventListener('click', view_window_delete_knowledge)
btn_cancel_delete_knowledge.addEventListener('click', view_window_delete_knowledge)
//Funcion que muestra o oculta la ventana de decision de eliminar knowledge
function view_window_delete_knowledge(){
    estado = window_answer_delete_knowledge.style.display
    if(estado == 'flex'){
        window_answer_delete_knowledge.style.display = 'none';
        div_oculto = document.getElementById('oculto');
        div_oculto.style.display = 'block';
    }else{
        window_answer_delete_knowledge.style.display = 'flex'
        div_oculto = document.getElementById('oculto');
        div_oculto.style.display = 'none';
    }
}

//Control del boton aportar nuevo conocimiento
btn_new_embeddings.addEventListener('click', view_window_new_knowledge)
btn_cancel_new_knowledge.addEventListener('click', view_window_new_knowledge)
//Funcion que muestra o oculta la ventana de decision de eliminar knowledge
function view_window_new_knowledge(){
    estado = window_upload_new_knowledge.style.display
    if(estado == 'flex'){
        window_upload_new_knowledge.style.display = 'none';
        div_oculto = document.getElementById('oculto');
        div_oculto.style.display = 'block';
    }else{
        window_upload_new_knowledge.style.display = 'flex'
        div_oculto = document.getElementById('oculto');
        div_oculto.style.display = 'none';
    }
}


btn_confirm_delete_knowledge.addEventListener('click', delete_knowledge)

//DELETE KNOWLEDGE

function delete_knowledge(){
    view_window_delete_knowledge()
    fetch('http://localhost:8080/delete_knowledge')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if(data['is_deleted'] == true){
            console.log('coleccion eliminada');
        }else{
            console.log('Error al aliminar la coleccion');
        }
        
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error: Error al eliminar los datos');
});
}




async function get_status() {
    try {
        // Realizar la solicitud al servidor para conocer su estado
        const response = await fetch('http://localhost:8080/check_status');
        
        if (!response.ok) {
             // Devuelve false si la respuesta no es exitosa
            btnPrompt.disabled = true;
            btn_download_history.disabled = true;
            bnt_activate_window_question_delete_knowledge.disabled = true;
            aviso.style.display = 'flex';
            prompt_actual.disabled = true;
            newPrompt.disabled = true;
            btn_send_new_prompt.disabled = true;
            div_chatbot.style.display = 'none';
            btn_new_embeddings.disabled = true;
            btn_delete_json_history.disabled = true
            btn_download_embeddings.disabled= true;
        }
        
        // Si la solicitud fue exitosa, devolvemos true
        btnPrompt.disabled = false;
        bnt_activate_window_question_delete_knowledge.disabled = false;
        btn_download_embeddings.disabled= false;
        aviso.style.display = 'none';
        prompt_actual.disabled = false;
        newPrompt.disabled = false;
        btn_send_new_prompt.disabled = false;
        div_chatbot.style.display = 'flex';
        btn_new_embeddings.disabled = false;
        btn_delete_json_history.disabled = false;
        btn_download_history.disabled = false;

    } catch (error) {
        // Si ocurre un error, registramos el error en la consola y devolvemos false
        bnt_activate_window_question_delete_knowledge.disabled = true;
        btn_new_embeddings.disabled = true;
        console.error('Error:', error);
        aviso.style.display = 'flex';
        prompt_actual.disabled = true;
        newPrompt.disabled = true;
        btn_send_new_prompt.disabled = true;
        div_chatbot.style.display = 'none';
        btn_delete_json_history.disabled = true
        btn_download_embeddings.disabled= true;
        btn_download_history.disabled = true;
        btnPrompt.disabled = true;
    }
}



// Control del Master Status Chatbot
if(divPrompt){
    divPrompt.style.display = 'none';
}

function mostrarSpinnerYMostrar(elem_ocultar, elem_visible) {
    //if(aviso.style.display == flex){
        //aviso_is_actived == true;
        //aviso.style.display = 'none';
    //}

    document.getElementById(elem_ocultar).style.display = 'none';
    // Muestra el spinner
    document.getElementById('spinner').style.display = 'flex';
    
    // Espera un momento antes de mostrar el nuevo elemento y ocultar el spinner
    setTimeout(function() {
        document.getElementById(elem_visible).style.display = 'block';
        document.getElementById('spinner').style.display = 'none';
        //if(aviso_is_actived){
            //aviso.style.display = 'flex';
        //} // Oculta el spinner después de mostrar el nuevo elemento
    }, 1500); // Espera 1.5 segundos (ajusta este valor según sea necesario)
}


if(btnPrompt){
    btnPrompt.addEventListener('click',  getPrompt);  
}

if(btn_download_history){
    btn_download_history.addEventListener('click',  getHistorial);  
}




// Controlador de eventos para verificar la URL al cargar la página
document.addEventListener('DOMContentLoaded', checkURL);

// Controlador de eventos para verificar la URL cuando cambia
window.addEventListener('popstate', checkURL);


//GET STATUS

function checkURL() {
    const currentUrl = window.location.href;
    if (currentUrl.includes('home.php?type=_status_chatbot')) {
        // Si la URL actual contiene 'url_especifica', activar la función específica
        let p_conversaciones = document.getElementById('conversaciones');
        // Realizar la solicitud fetch después de actualizar la URL
        fetch('http://localhost:8080/getStatus')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Acceder al valor de 'response' en la respuesta JSON
                    const questions = data.response;
                    // Asignar el valor de 'response' al contenido del párrafo
                    p_conversaciones.textContent = questions;
                })
                .catch(error => {
                    div_chatbot.style.display = 'none';
                    console.error('Error:', error);
                    alert('Error: Servidor inaccesible');
            });
    }
}

checkURL()

btn_delete_json_history.addEventListener('click', delete_json_historial)

//DELETE HISTORIAL
function delete_json_historial(){
    fetch('http://localhost:8080/delete_history')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Acceder al valor de 'response' en la respuesta JSON
                    const isDeleteJSON = data.response;
                    // Asignar el valor de 'response' al contenido del párrafo
                    // Obtener la URL actual
                    let currentUrl = window.location.href;
                    // Verificar si la URL ya tiene parámetros de consulta
                    let delimiter = currentUrl.includes('?') ? '&' : '?';

                    let newUrl
                    if(isDeleteJSON){
                        // Agregar el parámetro 'msg' a la URL actual
                        newUrl = currentUrl + delimiter + 'msg=_json_eliminado';
                    }else{
                        newUrl = currentUrl + delimiter + 'msg=_err_json_eliminado';
                    }
                    window.location.href = newUrl; 
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error: Error al eliminar los datos');
            });
}



//GET PROMPT

function getPrompt(){
    prompt_actual.disabled = true;
    newPrompt.disabled = true;
    btn_send_new_prompt.disabled = true;
    get_status();
    if(get_status){
        console.log("conexion establecida")
        prompt_actual.disabled = false;
        newPrompt.disabled = false;
        btn_send_new_prompt.disabled = false;
    }
        mostrarSpinnerYMostrar('oculto', 'visible');
        var headers = {
            'Content-Type': 'application/json'
        };
        var requestOptions = {
            method: 'GET',
            headers: headers,
        };

        // Solicitamos una peticion para que nos arroje la informacion
        fetch('http://localhost:8080/getPrompt', requestOptions)
        .then(response => response.json()) 
        .then(data => {
            prompt_actual.value = data.response;
        })
        .catch((error) => {
            console.error('Error', error);
        });
}

//GET LONGITUD CHROMADB

function getLongChromaDb(){
    // Solicitamos una peticion para que nos arroje la informacion
    fetch('http://localhost:8080/getLongBBDDChroma')
    .then(response => response.json()) 
    .then(data => {
        longitud_chromaDB.textContent = data['longitud'];
    })
    .catch((error) => {
         console.error('Error', error);
    });
}



//btn_new_embeddings.adddEventListener('click', set_new_embeddings)
//SET NEW EMBEDDINGS
//TODO: por hacer 
function set_new_embeddings(){
    prompt_actual.disabled = true;
    newPrompt.disabled = true;
    btn_send_new_prompt.disabled = true;
    get_status();
    if(get_status){
        console.log("conexion establecida")
        prompt_actual.disabled = false;
        newPrompt.disabled = false;
        btn_send_new_prompt.disabled = false;
    }
        mostrarSpinnerYMostrar('oculto', 'visible');
        var headers = {
            'Content-Type': 'application/json'
        };
        var requestOptions = {
            method: 'GET',
            headers: headers,
        };

        // Solicitamos una peticion para que nos arroje la informacion
        fetch('http://localhost:8080/getPrompt', requestOptions)
        .then(response => response.json()) 
        .then(data => {
            prompt_actual.value = data.response;
        })
        .catch((error) => {
            console.error('Error', error);
        });
}

btn_download_embeddings.addEventListener('click', download_embeddings)

//DOWNLOAD EMBEDDINGS

function download_embeddings() {
    // Realizar la solicitud para obtener los embeddings
    fetch('http://localhost:8080/getEmbeddings')
    .then(response => {
        if (!response.ok) {
            throw new Error('No se pudo obtener los embeddings');
        }
        return response.text(); // Convertir la respuesta a texto
    })
    .then(text => {
        // Eliminar la palabra "response" del texto
        const cleanText = text.replace('"response":', ''); 

        // Convertir el texto limpio en un objeto Blob
        const blob = new Blob([cleanText], { type: 'text/plain' });

        // Crear un enlace para descargar el archivo
        const downloadLink = document.createElement('a');
        downloadLink.href = window.URL.createObjectURL(blob);
        downloadLink.download = 'knowledgeChatbot.txt'; // Nombre del archivo

        // Ocultar el enlace y agregarlo al cuerpo del documento
        downloadLink.style.display = 'none';
        document.body.appendChild(downloadLink);

        // Simular un clic en el enlace para iniciar la descarga
        downloadLink.click();

        // Limpiar después de la descarga
        document.body.removeChild(downloadLink);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error: No se pudo descargar los embeddings');
    });
}




//NEW PROMPT
if(btn_send_new_prompt){
    btn_send_new_prompt.addEventListener('click', () => setNewPrompt())
}


function setNewPrompt(){

    let prompt = newPrompt.value
 
    //Prepare data
    // Specify the request payload
    var data = {
        "prompt": prompt,
        };

    var headers = {
        'Content-Type': 'application/json'
    };

    // Set the request options
    var requestOptions = {
        method: 'POST',
        headers: headers,
        body: JSON.stringify(data),
         // convert the JavaScript object to a JSON string
    };


    // 'http://127.0.0.1:5000/predict
    fetch('http://localhost:8080/prompt', requestOptions)
    .then(response => response.json()) 
    .then(data => {
        window.location.href = 'home.php?type=_status_chatbot';
        mostrarSpinnerYMostrar('oculto', 'visible');
    })
    .catch((error) => {
        console.error('Error', error);
    });

}


// GET HISTORIAL

function getHistorial(){

        var headers = {
            'Content-Type': 'application/json'
        };
        var requestOptions = {
            method: 'GET',
            headers: headers,
        };

        // Solicitamos una peticion para que nos arroje la informacion
        fetch('http://localhost:8080/getHistory', requestOptions)
        .then(response => response.text()) // Convertir la respuesta a texto
        .then(data => {
        // Crear un objeto Blob con los datos recibidos
        const blob = new Blob([data], { type: 'text/plain' });

        // Crear un enlace para descargar el archivo
        const downloadLink = document.createElement('a');
        downloadLink.href = window.URL.createObjectURL(blob);
        downloadLink.download = 'historial.txt'; // Nombre del archivo

        // Ocultar el enlace y agregarlo al cuerpo del documento
        downloadLink.style.display = 'none';
        document.body.appendChild(downloadLink);

        // Simular un clic en el enlace para iniciar la descarga
        downloadLink.click();

        // Limpiar después de la descarga
        document.body.removeChild(downloadLink);
    })
    .catch((error) => {
        console.error('Error', error);
    });

}


//CONTROL DEL CHATBOX

if(!userId){
   const userId = getUserId(); 
}

// Control del ChatBot conexiones a la Api
class ChatBox{
    
    constructor(){
        this.args = {
            openButton: document.querySelector('.chatbox__button'),
            chatBox: document.querySelector('.chatbox__support'),
            sendButton: document.querySelector('.send__button')
        }
        
        this.state = false;
        this.messages = [];
    }


    display() {
        const {openButton, chatBox, sendButton} = this.args;

        openButton.addEventListener('click', () => this.toggleState(chatBox))

        sendButton.addEventListener('click', () => this.onSendButton(chatBox))

        const node = chatBox.querySelector('input'); 
        node.addEventListener("keyup", ({key}) => {
            if(key === "Enter") {
                this.onSendButton(chatBox)
            }
        })  
    }
        


    toggleState(chatbox) {

        this.state = !this.state;

        if(this.state){
            chatbox.classList.add('chatbox--active')
        }else{
            chatbox.classList.remove('chatbox--active')
        }
    }


    onSendButton(chatbox){
        let query = document.getElementById('query');
        let text = query.value
        if(text === "") {
            return;
        }

        let msg1 = { name: "user", message: text }
        this.messages.push(msg1)
        this.updateChatText(chatbox)

        // Show loading indicator
        let loadingMsg = { name: "bot", message: "..." };
        this.messages.push(loadingMsg);
        this.updateChatText(chatbox);

        //Prepare data
        // Specify the request payload
        var data = {
            "message": text,
            'id': userId
            };

        var headers = {
            'Content-Type': 'application/json'
        };

        //Borramos el input de query
        query.value= ""
        // Set the request options
        var requestOptions = {
            method: 'POST',
            headers: headers,
            body: JSON.stringify(data), // convert the JavaScript object to a JSON string
        };
        

        // 'http://127.0.0.1:5000/predict
        fetch('http://localhost:8080/predict', requestOptions)
        .then(response => response.json()) 
        .then(data => {
            let msg2 = { name: "bot", message: data.response };
            this.messages.pop(); // Remove the loading indicator
            this.messages.push(msg2);
            this.updateChatText(chatbox)
            query.value= ""
        })
        .catch((error) => {
            console.error('Error', error);
            this.messages.pop(); 
            this.updateChatText(chatbox)
            query.value = ''
        });

    }

    updateChatText(chatbox) {
        let html = ""
        this.messages.slice().reverse().forEach(function(item, ) {
            if(item.name === "bot")
            {
                html += '<div class="messages__item messages__item--visitor">' + item.message + '</div>'
            }
            else
            {
                html += '<div class="messages__item messages__item--operator">' + item.message + '</div>'

            }
    });

    const chatmessage = chatbox.querySelector('.chatbox__messages');

    chatmessage.innerHTML = html;

    }

}

const chatbox = new ChatBox();
chatbox.display();


});
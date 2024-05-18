//Funcion que envuelve todo, Si el servidor esta caido no funciona nada.
let aviso = document.getElementById('connection_err')
let btnPrompt = document.getElementById("btn-prompt");
let divPrompt = document.getElementById("visible");
let divSpinner = document.getElementById("spinner");
let prompt_actual = document.getElementById("actual_prompt");
let newPrompt = document.getElementById('new_prompt')
let btn_send_new_prompt = document.getElementById('btn_new_prompt')
let btn_download_history = document.getElementById('download_history')


//Declaramos todos los servicios disabled
prompt_actual.disabled = true;
newPrompt.disabled = true;
btn_send_new_prompt.disabled = true;


function get_status(){
   // Solicitamos una peticion al servidor para conocer su estado
    fetch('http://localhost:8080/check_status')
    .then(response => {
        if (!response.ok) {
            throw new Error('Servidor no disponible');
        }
        return response.text();
    })
    .then(data => {
        // Si el servidor responde "OK", muestra un mensaje de éxito
        //Activamos todos los servicios de la pagina
        return true;

    })
    .catch(error => {
        // Si ocurre un error, muestra una alerta indicando que el servidor está caído
        
        console.log('Error: ' + error.message);
        alert('Error: ' + 'Servidor inaccesible');
    }); 
}


// Control del Master Status Chatbot
if(divPrompt){
    divPrompt.style.display = 'none';
}

function mostrarSpinnerYMostrar(elem_ocultar, elem_visible) {
    document.getElementById(elem_ocultar).style.display = 'none';
    // Muestra el spinner
    document.getElementById('spinner').style.display = 'flex';
    
    // Espera un momento antes de mostrar el nuevo elemento y ocultar el spinner
    setTimeout(function() {
        document.getElementById(elem_visible).style.display = 'block';
        document.getElementById('spinner').style.display = 'none'; // Oculta el spinner después de mostrar el nuevo elemento
    }, 1500); // Espera 1.5 segundos (ajusta este valor según sea necesario)
}


if(btnPrompt){
    btnPrompt.addEventListener('click',  getPrompt);  
}

if(btn_download_history){
    btn_download_history.addEventListener('click',  getHistorial);  
}


//GET PROMPT

function getPrompt(){
    prompt_actual.disabled = true;
    newPrompt.disabled = true;
    btnPrompt.disabled = true;
    aviso.style.display = "none";
        get_status();
        if(get_status){
            prompt_actual.disabled = true;
            newPrompt.disabled = true;
            btnPrompt.disabled = true;
            aviso.style.display = "flex";
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
        fetch('http://localhost:8080/getInfo', requestOptions)
        .then(response => response.json()) 
        .then(data => {
            prompt_actual.value = data.response;
        })
        .catch((error) => {
            console.error('Error', error);
        });

}


//NEW PROMPT

btn_send_new_prompt.addEventListener('click', () => setNewPrompt())

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

    console.log(body)

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
        const {openButton, chatBox, sendButton, newPrompt} = this.args;

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

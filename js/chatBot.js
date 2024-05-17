
if(!userId){
   const userId = getUserId(); 
}


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
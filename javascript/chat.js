const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

// prevent the form from submitting by default

form.onsubmit = (e) => {
  e.preventDefault();
}

sendBtn.onclick = () => {
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.open("POST", "php/insert-chat.php", true);

  xmlhttp.onload = () => {
    if(xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200){
      let data = xmlhttp.responseText;
      // Empty the input value once the message in submitted
      inputField.value = "";
      if(!chatBox.classList.contains("active")){
        scrollToBottom();
      }
    }
  }
  // Sending the form data
  const formData = new FormData(form);
  xmlhttp.send(formData);
}

// Prevent the chats from scrolling up automatically when the user is scrolling

chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
}
chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
}

setInterval(() => {
  // starting AJAX 
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.open("POST", "php/get-chat.php", true);

  xmlhttp.onload = () => {
    if(xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200){
      let data = xmlhttp.responseText;

      chatBox.innerHTML = data;
      if(!chatBox.classList.contains("active")){
        scrollToBottom();
      }

    }
  }
  // Sending the form data
  const formData = new FormData(form);
  xmlhttp.send(formData);
}, 500); // This runs after every half a second

function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}
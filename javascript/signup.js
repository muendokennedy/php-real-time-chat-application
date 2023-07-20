const form = document.querySelector(".signup form"),
continueBtn = document.querySelector(".button input"),
errorRequired = document.querySelectorAll(".error"),
errorEmail = document.querySelector(".email"),
errorFile = document.querySelector(".file"),
uniqueEmail = document.querySelector(".unique");

form.onsubmit = (e) => {
  e.preventDefault(); // Prevent the form from submitting
}
continueBtn.onclick = () => {
  // starting AJAX 
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.open("POST", "php/signup.php", true);

  xmlhttp.onload = () => {
    if(xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200){
      let data = xmlhttp.responseText;

      for (let i = 0; i < errorRequired.length; i++) {
        errorRequired[i].style.display = "none";
        errorRequired[i].previousElementSibling.style.borderColor = "#ccc";
      }
      if(data == "success"){
        
      } else if(data == "required"){
          for (let i = 0; i < errorRequired.length; i++) {
            if(errorRequired[i].previousElementSibling.value == ""){
              errorRequired[i].style.display = "block";
              errorRequired[i].textContent = "This field is required";
              errorRequired[i].previousElementSibling.style.borderColor = "red";
            }
          }
        } else if(data == "email_unique"){
          uniqueEmail.style.display = "block";
          uniqueEmail.textContent = "User with this email exists";
          uniqueEmail.previousElementSibling.style.borderColor = "red";
        } else if(data == "email_valid"){
          errorEmail.style.display = "block";
          errorEmail.textContent = "Enter a valid email address";
          errorEmail.previousElementSibling.style.borderColor = "red";
        } else if(data == "file_invalid"){
          errorFile.style.display = "block";
          errorFile.textContent = "Please enter a jpg, jpeg or png file";
          errorFile.previousElementSibling.style.borderColor = "red";
        }
      
    }
  }
  // Sending the form data
  const formData = new FormData(form);
  xmlhttp.send(formData);
}

// Sending the form data using the fetch API
// continueBtn.onclick = () => {

//   const formData = new FormData(form);
//    fetch("php/signup.php", {
//     method: "POST",
//     headers: {
//       "Content-Type": "application/x-www-form-urlencoded"
//     },
//     body: new URLSearchParams(formData)
//    }).then((response) => {
//     if(response.ok){
//       return response;
//     } else{
//       throw new Error("Error: " + response.status);
//     }
//    }).then((data) => {
//     console.log(data);
//    }).catch((error) => {
//     console.log(error);
//    });
// }
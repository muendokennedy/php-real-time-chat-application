const form = document.querySelector(".login form"),
continueBtn = document.querySelector(".button input"),
errorRequired = document.querySelectorAll(".error"),
errorEmail = document.querySelector(".email"),
wrongPwd = document.querySelector(".wrong-pwd");

form.onsubmit = (e) => {
  e.preventDefault(); // Prevent the form from submitting
}
continueBtn.onclick = () => {
  // starting AJAX 
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.open("POST", "php/login.php", true);

  xmlhttp.onload = () => {
    if(xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200){
      let data = xmlhttp.responseText;

      console.log(data);

      for (let i = 0; i < errorRequired.length; i++) {
        errorRequired[i].style.display = "none";
        errorRequired[i].previousElementSibling.style.borderColor = "#ccc";
      }
      if(data == "success"){
        // redirect the user to the users page
        location.href = "users.php";

      } else if(data == "required"){
          for (let i = 0; i < errorRequired.length; i++) {
            if(errorRequired[i].previousElementSibling.value == ""){
              errorRequired[i].style.display = "block";
              errorRequired[i].textContent = "This field is required";
              errorRequired[i].previousElementSibling.style.borderColor = "red";
            }
          }
        }else if(data == "email_valid"){
          errorEmail.style.display = "block";
          errorEmail.textContent = "Enter a valid email address";
          errorEmail.previousElementSibling.style.borderColor = "red";
        }else if(data == "incorrect_email"){
          errorEmail.style.display = "block";
          errorEmail.textContent = "You entered incorrect email";
          errorEmail.previousElementSibling.style.borderColor = "red";
        }else if(data == "incorrect_password"){
          wrongPwd.style.display = "block";
          wrongPwd.textContent = "You entered a wrong password";
          wrongPwd.previousElementSibling.style.borderColor = "red";
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
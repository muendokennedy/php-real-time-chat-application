const form = document.querySelector(".signup form"),
continueBtn = document.querySelector(".button input");

form.onsubmit = (e) => {
  e.preventDefault(); // Prevent the form from submitting
}
continueBtn.onclick = () => {
  // starting AJAX 
  let xmlhttp = new XMLHttpRequest();

  xmlhttp.open("POST", "php/signup.php", true);

  xmlhttp.onload = () => {
    if(xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200){
      let data = xmlhttp.responseText
      console.log(data);
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
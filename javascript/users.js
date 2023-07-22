const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  searchBar.value = "";
}

// Working of the search bar

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  if(!searchTerm == ""){
    searchBar.classList.add("active");

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.open("POST", "php/search.php", true);
  
    xmlhttp.onload = () => {
      if(xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200){
        let data = xmlhttp.responseText;
  
        usersList.innerHTML = data;
  
      }
    }
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("searchTerm=" + searchTerm);

  } else {
    searchBar.classList.remove("active");
  }
  


}

setInterval(() => {
    // starting AJAX 
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "php/users.php", true);
  
    xmlhttp.onload = () => {
      if(xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200){
        let data = xmlhttp.responseText;

        if(!searchBar.classList.contains("active")){
          usersList.innerHTML = data;
        }

      }
    }
    xmlhttp.send();
}, 500); // This runs after every half a second
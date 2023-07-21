const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users-list");

searchBtn.onclick = () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
}

setInterval(() => {
    // starting AJAX 
    let xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "php/users.php", true);
  
    xmlhttp.onload = () => {
      if(xmlhttp.readyState === XMLHttpRequest.DONE && xmlhttp.status === 200){
        let data = xmlhttp.responseText;

        // usersList.innerHTML = data;

        c

      }
    }
    xmlhttp.send();
}, 500); // This runs after every half a second
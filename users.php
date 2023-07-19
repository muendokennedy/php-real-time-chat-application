<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Realtime chat App</title>
  <!-- The custom css style-sheet -->
  <link rel="stylesheet" href="style.css">
  <!-- The fontawesome CDN link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <img src="img.jpeg" alt="user">
          <div class="details">
            <span>Kennedy Munyao</span>
            <p>Active now</p>
          </div>
        </div>
        <a href="#" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select a user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
        <a href="#">
          <div class="content">
            <img src="img.jpeg" alt="The first user">
            <div class="details">
              <span>Kennedy Munyao</span>
              <p>This is a test massage</p>
            </div>
          </div>
          <div class="status-dot"><i class="fas fa-circle"></i></div>
        </a>
        <a href="#">
          <div class="content">
            <img src="img.jpeg" alt="The first user">
            <div class="details">
              <span>Kennedy Munyao</span>
              <p>This is a test massage</p>
            </div>
          </div>
          <div class="status-dot"><i class="fas fa-circle"></i></div>
        </a>
        <a href="#">
          <div class="content">
            <img src="img.jpeg" alt="The first user">
            <div class="details">
              <span>Kennedy Munyao</span>
              <p>This is a test massage</p>
            </div>
          </div>
          <div class="status-dot"><i class="fas fa-circle"></i></div>
        </a>
        <a href="#">
          <div class="content">
            <img src="img.jpeg" alt="The first user">
            <div class="details">
              <span>Kennedy Munyao</span>
              <p>This is a test massage</p>
            </div>
          </div>
          <div class="status-dot"><i class="fas fa-circle"></i></div>
        </a>
        <a href="#">
          <div class="content">
            <img src="img.jpeg" alt="The first user">
            <div class="details">
              <span>Kennedy Munyao</span>
              <p>This is a test massage</p>
            </div>
          </div>
          <div class="status-dot"><i class="fas fa-circle"></i></div>
        </a>
        <a href="#">
          <div class="content">
            <img src="img.jpeg" alt="The first user">
            <div class="details">
              <span>Kennedy Munyao</span>
              <p>This is a test message</p>
            </div>
          </div>
          <div class="status-dot"><i class="fas fa-circle"></i></div>
        </a>
      </div>
    </section>
  </div>
  <script src="javascript/usersSearch.js"></script> 
</body>
</html>
<?php 
require_once "header.php"; 

session_start();

if(!isset($_SESSION['unique_id'])){
  header("Location: login.php");
}
?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <?php 
        require_once "php/config.php";

        $sql = $conn->query("SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']};");

        if($sql->num_rows > 0){
          $row = $sql->fetch_assoc();
        }
        ?>
        <div class="content">
          <img src="php/uploads/<?php echo $row["img"]; ?>" alt="user">
          <div class="details">
            <span><?php echo $row["fname"] . " " .  $row["lname"]; ?></span>
            <p><?php echo $row["status"] ?? "Offline" ?></p>
          </div>
        </div>
        <a href="logout.php" class="logout">Logout</a>
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
  <script src="javascript/usersSearch.js?v=<?php echo time(); ?>"></script> 
</body>
</html>
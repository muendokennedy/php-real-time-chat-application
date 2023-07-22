<?php 
require_once "header.php"; 

session_start();

if(!isset($_SESSION['unique_id'])){
  header("Location: login.php");
}

?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
      <?php 
        require_once "php/config.php";

        $sql = $conn->query("SELECT * FROM users WHERE unique_id = {$_GET['user_id']};");

        if($sql->num_rows > 0){
          $row = $sql->fetch_assoc();
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/uploads/<?php echo $row["img"]; ?>" alt="user">
        <div class="details">
          <span><?php echo $row["fname"] . " " .  $row["lname"]; ?></span>
          <p><?php echo $row["status"]; ?></p>
        </div>
      </header>
      <div class="chat-box">
        <div class="chat outgoing">
          <div class="details">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
          </div>
        </div>
        <div class="chat incoming">
          <img src="img.jpeg" alt="incoming user">
          <div class="details">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
          </div>
        </div>
        <div class="chat outgoing">
          <div class="details">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
          </div>
        </div>
        <div class="chat incoming">
          <img src="img.jpeg" alt="incoming user">
          <div class="details">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
          </div>
        </div>
        <div class="chat outgoing">
          <div class="details">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
          </div>
        </div>
        <div class="chat incoming">
          <img src="img.jpeg" alt="incoming user">
          <div class="details">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
          </div>
        </div>
      </div>
      <form action="#" class="typing-area" autocomplete="off">
        <input type="hidden" name="outgoing_msg_id" value="<?php echo $_SESSION['unique_id']; ?>">
        <input type="hidden" name="incoming_msg_id" value="<?php echo $_GET['user_id']; ?>">
        <input type="text" name="message" class="input-field" placeholder="Type a message here...">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="javascript/chat.js?v=<?php echo time(); ?>"></script>
</body>
</html>
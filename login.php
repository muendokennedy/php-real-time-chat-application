<?php 
require_once "header.php"; 

session_start();

if(isset($_SESSION['unique_id'])){
  header("Location: users.php");
  }
?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>Realtime Chat App</header>
      <form action="#">
        <div class="error-text">This is an error message</div>
        <div class="field input">
          <label>Email address</label>
          <input type="text" name="email" placeholder="Enter Your Email...">
          <div class="error email unique"></div>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="pwd" placeholder="Enter Your Password...">
          <div class="error wrong-pwd"></div>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" value="Continue to chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>
  <script src="javascript/passwordToggler.js?v=<?php echo time(); ?>"></script>
  <script src="javascript/login.js?v=<?php echo time(); ?>"></script>
</body>
</html>
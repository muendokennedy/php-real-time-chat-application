<?php require_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form action="#" enctype="multipart/form-data">
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="Enter First Name...">
            <div class="error"></div>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Enter Last Name...">
            <div class="error"></div>
          </div>
        </div>
        <div class="field input">
          <label>Email address</label>
          <input type="text" name="email" placeholder="Enter Email...">
          <div class="error email unique"></div>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="pwd" placeholder="Enter Password...">
          <div class="error"></div>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="profile-pic">
          <div class="error file"></div>
        </div>
        <div class="field button">
          <input type="submit" value="Continue to chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>
  <script src="javascript/passwordToggler.js"></script>
  <script src="javascript/signup.js"></script>
</body>
</html>
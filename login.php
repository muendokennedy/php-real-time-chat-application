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
    <section class="form login">
      <header>Realtime Chat App</header>
      <form action="#">
        <div class="error-text">This is an error message</div>
        <div class="field input">
          <label>Email address</label>
          <input type="text" placeholder="Enter Your Email...">
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" placeholder="Enter Your Password...">
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" value="Continue to chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="#">Signup now</a></div>
    </section>
  </div>
  <script src="javascript/passwordToggler.js"></script>
</body>
</html>
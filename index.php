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
    <section class="form signup">
      <header>Realtime Chat App</header>
      <form action="#" enctype="multipart/form-data">
        <div class="error-text">This is an error message</div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="Enter First Name..." required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Enter Last Name..." required>
          </div>
        </div>
        <div class="field input">
          <label>Email address</label>
          <input type="text" name="email" placeholder="Enter Email..." required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="pwd" placeholder="Enter Password..." required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="profile-pic">
        </div>
        <div class="field button">
          <input type="submit" value="Continue to chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="#">Login now</a></div>
    </section>
  </div>
  <script src="javascript/passwordToggler.js"></script>
  <script src="javascript/signup.js"></script>
</body>
</html>
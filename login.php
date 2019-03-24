<?php
  require './config/config.php';
  require './includes/form_handlers/login_handler.php';
?>

<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="./assets/css/register_login_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="./assets/js/register_login.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login | Project Redwood | Image Sharing Website</title>
</head>
<body>
  <?php
    if(isset($_POST['login_u_btn'])) {
      echo '
        <script>
          $(document).ready(function () {
            $(".first").hide();
            $(".second").show();
          });
        </script>
      ';
    }
  ?>
  <div class="wrapper">
    <div class="login_box">
      <div class="login_header">
        <h1>Redwood</h1>
        Login through email or username below!
      </div>
      <div class="first">
        <form action="login.php" method="POST">
          <input type="text" name="log_email" placeholder="Email" value="<?php 
            if(isset($_SESSION['log_email'])) echo $_SESSION['log_email'];
            ?>" required>
          <br>
          <input type="password" name="log_password" placeholder="Password" required>
          <br>
          <input type="submit" name="login_e_btn" value="Login!">
          <br>
          <?php if(in_array("Email or password was incorrect<br>",$error_array))
                echo "Email or password was incorrect<br>"; ?>
          <a href="#" id="signup" class="signup">Want to sign-in with username instead? Click here!</a>
        </form>
      </div>

      <div class="second">
        <form action="login.php" method="POST">
          <input type="text" name="log_username" placeholder="Username" value="<?php 
            if(isset($_SESSION['log_username'])) echo $_SESSION['log_username'];
            ?>" required>
          <br>
          <input type="password" name="log_password" placeholder="Password" required>
          <br>
          <input type="submit" name="login_u_btn" value="Login!">
          <br>
          <?php if(in_array("Username or password was incorrect<br>",$error_array))
                echo "Username or password was incorrect<br>"; ?>
          <a href="#" id="login" class="login">Want to sign-in with email instead? Click here!</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
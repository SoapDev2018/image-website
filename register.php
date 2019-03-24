<?php
  require './config/config.php';
  require './includes/form_handlers/register_handler.php';
?>

<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="./assets/css/register_login_style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=r, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register | Project Redwood | Image Sharing Website</title>
</head>
<body>
  <div class="wrapper">
    <div class="login_box">
      <div class="login_header">
        <h1>Redwood</h1>
        Register below!
      </div>
      <form action="register.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" value="<?php 
          if(isset($_SESSION['reg_fname'])) echo $_SESSION['reg_fname']
        ?>" required>
        <br>
        <?php if(in_array("First name should be between 2 and 64 characters!<br>",$error_array))
                echo "First name should be between 2 and 64 characters!<br>"; ?>
        <input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
          if(isset($_SESSION['reg_lname'])) echo $_SESSION['reg_lname']
        ?>" required>
        <br>
        <?php if(in_array("Last name should be between 2 and 64 characters!<br>",$error_array))
                echo "Last name should be between 2 and 64 characters!<br>"; ?>
        <input type="text" name="reg_uname" placeholder="Username" value="<?php 
          if(isset($_SESSION['reg_uname'])) echo $_SESSION['reg_uname']
        ?>" required>
        <br>
        <?php if(in_array("Username should be between 4 and 128 characters!<br>",$error_array))
                echo "Username should be between 4 and 128 characters!<br>"; ?>
        <input type="email" name="reg_email" placeholder="Email" value="<?php 
          if(isset($_SESSION['reg_email'])) echo $_SESSION['reg_email']
        ?>" required>
        <br>
        <input type="email" name="reg_conf_email" placeholder="Confirm Email" value="<?php 
          if(isset($_SESSION['reg_conf_email'])) echo $_SESSION['reg_conf_email']
        ?>" required>
        <br>
        <?php if(in_array("Emails do not match!<br>",$error_array))
                echo "Emails do not match!<br>";
              else if(in_array("Email is already in use!<br>",$error_array))
                echo "Email is already in use!<br>";
              else if(in_array("Email is in invalid format!<br>",$error_array))
                echo "Email is in invalid format!<br>"; ?>
        <input type="password" name="reg_password" placeholder="Password" required>
        <br>
        <input type="password" name="reg_conf_password" placeholder="Confirm Password" required>
        <br>
        <?php if(in_array("Passwords do not match!<br>",$error_array))
                echo "Passwords do not match!<br>";
              else if(in_array("Password should be between 8 and 64 characters!<br>",$error_array))
                echo "Password should be between 8 and 64 characters!<br>"; ?>
        <input type="tel" name="phone" placeholder="Phone Number" value="<?php 
          if(isset($_SESSION['phone'])) echo $_SESSION['phone']
        ?>" required>
        <br>
        <input type="date" name="bday" value="<?php 
          if(isset($_SESSION['bday'])) echo $_SESSION['bday']
        ?>" required>
        <br>
        <input type="submit" name="register_btn" value="Register!">
        <br>
        <?php if(in_array("<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>",$error_array))
                echo "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>"; ?>
        <a href="./login.php">Want to login?</a>
      </form>
    </div>
  </div>
</body>
</html>
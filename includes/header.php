<?php
  require 'config/config.php';
  if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_assoc($user_details_query);
  }
  else
    header("Location: register.php");
?>

<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Project Redwood | Image Sharing Website</title>
</head>
<body>
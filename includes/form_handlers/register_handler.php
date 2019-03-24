<?php
  $fname = "";
  $lname = "";
  $username = "";
  $em = "";
  $em2 = "";
  $password = "";
  $password2 = "";
  $phone = "";
  $bday_date = "";
  $signup_date = "";
  $error_array = array();

  if(isset($_POST['register_btn'])) {
    //First Name
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ','',$fname);
    $fname = ucfirst(strtolower($fname));
    $_SESSION['reg_fname'] = $fname;

    //Last Name
    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ','',$lname);
    $lname = ucfirst(strtolower($lname));
    $_SESSION['reg_lname'] = $lname;

    //Username
    $username = strip_tags($_POST['reg_uname']);
    $username = str_replace(' ','',$username);
    $_SESSION['reg_uname'] = $username;

    //Email
    $em = strip_tags($_POST['reg_email']);
    $em = str_replace(' ','',$em);
    $em = strtolower($em);
    $_SESSION['reg_email'] = $em;

    //Confirm Email
    $em2 = strip_tags($_POST['reg_conf_email']);
    $em2 = str_replace(' ','',$em2);
    $em2 = strtolower($em2);
    $_SESSION['reg_conf_email'] = $em2;

    //Password
    $password = strip_tags($_POST['reg_password']);
    $password2 = strip_tags($_POST['reg_conf_password']);

    //Phone
    $phone = $_POST['phone'];
    $_SESSION['phone'] = $phone;

    //Birthday
    $bday_date = $_POST['bday'];
    $_SESSION['bday'] = $bday_date;

    //Signup Date as current date
    $date_object = new DateTime();
    $signup_date = $date_object->format('Y-m-d');

    //Check if email is in valid format or not, if email is already used or not, if emails match or not
    if($em == $em2){
      if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
        $em = filter_var($em, FILTER_VALIDATE_EMAIL);
        $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
        $num_rows = mysqli_num_rows($e_check);
        if($num_rows != 0)
          array_push($error_array,"Email is already in use!<br>");
      }else {
        array_push($error_array,"Email is in invalid format!<br>");
      }
    }else {
      array_push($error_array,"Emails do not match!<br>");
    }

    if(strlen($fname)>64 || strlen($fname)<2)
      array_push($error_array,"First name should be between 2 and 64 characters!<br>");

    if(strlen($lname)>64 || strlen($lname)<2)
      array_push($error_array,"Last name should be between 2 and 64 characters!<br>");

    if(strlen($username)>128 || strlen($username)<4)
      array_push($error_array,"Username should be between 4 and 128 characters!<br>");

    if($password != $password2)
      array_push($error_array,"Passwords do not match!<br>");

    if(strlen($password)>64 || strlen($password)<8)
      array_push($error_array,"Password should be between 8 and 64 characters!<br>");

    if(empty($error_array)) {
      $password = md5($password);

      $rand = rand(1, 20);
      $profile_pic = "";
      switch($rand) {
        case 1:
          $profile_pic="./assets/images/profile_pics/defaults/1.png";
          break;
        case 2:
          $profile_pic="./assets/images/profile_pics/defaults/2.png";
          break;
        case 3:
          $profile_pic="./assets/images/profile_pics/defaults/3.png";
          break;
        case 4:
          $profile_pic="./assets/images/profile_pics/defaults/4.png";
          break;
        case 5:
          $profile_pic="./assets/images/profile_pics/defaults/5.png";
          break;
        case 6:
          $profile_pic="./assets/images/profile_pics/defaults/6.png";
          break;
        case 7:
          $profile_pic="./assets/images/profile_pics/defaults/7.png";
          break;
        case 8:
          $profile_pic="./assets/images/profile_pics/defaults/8.png";
          break;
        case 9:
          $profile_pic="./assets/images/profile_pics/defaults/9.png";
          break;
        case 10:
          $profile_pic="./assets/images/profile_pics/defaults/10.png";
          break;
        case 11:
          $profile_pic="./assets/images/profile_pics/defaults/11.png";
          break;
        case 12:
          $profile_pic="./assets/images/profile_pics/defaults/12.png";
          break;
        case 13:
          $profile_pic="./assets/images/profile_pics/defaults/13.png";
          break;
        case 14:
          $profile_pic="./assets/images/profile_pics/defaults/14.png";
          break;
        case 15:
          $profile_pic="./assets/images/profile_pics/defaults/15.png";
          break;
        case 16:
          $profile_pic="./assets/images/profile_pics/defaults/16.png";
          break;
        case 17:
          $profile_pic="./assets/images/profile_pics/defaults/17.png";
          break;
        case 18:
          $profile_pic="./assets/images/profile_pics/defaults/18.png";
          break;
        case 19:
          $profile_pic="./assets/images/profile_pics/defaults/19.png";
          break;
        case 20:
          $profile_pic="./assets/images/profile_pics/defaults/20.png";
          break;
        default:
          $profile_pic="./assets/images/profile_pics/defaults/1.png";  
      }

      $query = mysqli_query($con, "INSERT INTO users VALUES ('','$fname','$lname','$username','$em','$password','$bday_date','$signup_date','$profile_pic','no')");

      array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and login!</span><br>");

      $_SESSION['reg_fname']="";
      $_SESSION['reg_lname']="";
      $_SESSION['reg_uname']="";
      $_SESSION['reg_email']="";
      $_SESSION['reg_conf_email']="";
      $_SESSION['phone']="";
      $_SESSION['bday']="";
    }
  }
?>

<?php
  session_start();

  if($_SESSION['logged_in'] == 'true'){
    header("location: http://192.168.64.2/news-system");
  }

  $db = mysqli_connect('localhost', 'root', '', 'news_page');

  $username = $_POST['user'];
  $password = $_POST['password'];
  $confirm_passwort = $_POST['confirm-password'];
  $type="";

  $users_query = "select * from user where username = '$username'";
  $users_result = mysqli_query($db, $users_query);
  $number = mysqli_num_rows($users_result);

  if($number == 1){
    echo "username already taken";
  }
  elseif($confirm_passwort != $password){
    echo "passwords don't match";
  }
  elseif($username != null && $password != null){
    $register_query = "insert into user(username, password, type) values ('$username', '$password', 'basic_user')";
    mysqli_query($db, $register_query);
    header("location: http://192.168.64.2/news-system");
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
  </head>
  <body>
    <h1 class="">
      Register
    </h1>
    <form class="register-form" action="./" method="post">
      <label for="">Username</label>
      <input class="register-item" type="text" name="user" required>
      <label for="">Password</label>
      <input class="register-item" type="password" name="password" required>
      <label for="">Confirm Password</label>
      <input class="register-item" type="password" name="confirm-password" required>
      <button class="register-item" type="submit">Submit</button>
    </form>
  </body>
</html>

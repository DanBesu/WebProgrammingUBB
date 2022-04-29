<?php
  session_start();
  if($_SESSION['logged_in'] == 'true'){
    header("location: http://192.168.64.2/news-system");
  }

  $db = mysqli_connect('localhost', 'root', '', 'news_page');

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['user'];
    $password = $_POST['password'];
    $type = "";

    $user_query_result = mysqli_query($db,  "SELECT * FROM user WHERE username='" . $username . "' AND password='" . $password . "' LIMIT 1");

    if(mysqli_num_rows($user_query_result) == 0){
      echo "there is no such user here";
    }else{
      while($row = mysqli_fetch_array($user_query_result)){
        $_SESSION['user_id'] = ''. $row['id'] .'';
        $_SESSION['user_type'] = ''. $row['type'] .'';
      }
      $_SESSION['logged_in'] = 'true';
      header("location: http://192.168.64.2/news-system");
    }
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Log in</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <h1 class="">
      Login
    </h1>
    <form class="login-form" action="./" method="post">
      <label for="">Username</label>
      <input class="login-item" type="text" name="user" required>
      <label for="">Password</label>
      <input class="login-item" type="password" name="password" required>
      <button class="login-item" type="submit" name="button-submit">login</button>
    </form>
  </body>
</html>

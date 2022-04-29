<?php
  session_start();

  if($_SESSION['logged_in'] == 'false' or $_SESSION['logged_in'] == null){
    $_SESSION['login_action'] = 'log in';
    $_SESSION['user_id'] = '';
  }
  else{
    $_SESSION['login_action'] = 'log out';
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['logout'])){
      if($_SESSION['logged_in'] == 'true'){
        $_SESSION['logged_in'] = 'false';
        $_SESSION['user_id'] = '';
        $_SESSION['login_action'] = 'log in';
      }
      else{
        $_SESSION['login_action'] = 'log out';
        header('location: http://192.168.64.2/news-system/login');
      }
    }
    if(isset($_POST['register'])){
      header('location: http://192.168.64.2/news-system/register');
    }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <title>Hello</title>
</head>
  <body>
    <form style="float:right" method="POST" action="./">
      <input type="submit" name="logout" value="<?= $_SESSION['login_action']?>">
      <?php
        if($_SESSION['logged_in'] != 'true'){
          echo '<input type="submit" name="register" value="register">';
        }
      ?>
    </form>
    <h1>Breaking News</h1>
    <?php
      if ($_SESSION['logged_in'] == 'true' && $_SESSION['user_type'] == 'admin_user') {
        echo '<div>';
        echo '<form class="form" method="POST" action="./">';
        echo '<input class="submit" type="submit" name="new" value="Add News">';
        echo '</form>';
        echo '</div>';
      }
    ?>
  </body>
</html>

<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>CodePen - Login</title>
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>

<body>
  <html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700" />>
  </head>

  <body>
  <?php include "connect.php"; ?>
    <div class="container">
      <div id="login">
        <?php 
          if (isset($_POST["username"]) && isset($_POST["password"]) ) {
            $req = $db->prepare('
              SELECT *
              FROM User
              WHERE username = :username AND password = :password
            ');
            $req->execute( array(
              'username' => $_POST['username'],
              'password' => $_POST['password']

            ));

            $result = $req->fetch();
            // TODO: Check isActiv boolean
            if(empty($result)) {
              echo("<h1>WRONG CREDENTIALS</h1>");
            }
            else 
            {
              $_SESSION['user'] = $result['username'];
              header('Location: mailbox.php');
            }
          }
        ?>
        <form action="index.php" method="post">
          <fieldset class="clearfix">
            <p><span class="fontawesome-user"></span><input type="text" name="username" placeholder="Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password" name="password" placeholder="Password" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" value="Sign In"></p>
          </fieldset>
        </form>
        <p>Not a member? <a href="#">Sign up now</a><span class="fontawesome-arrow-right"></span></p>
      </div> <!-- end login -->
    </div>
  </body>
</html>

</body>

</html>
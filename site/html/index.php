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
            if (!empty($_POST["username"])) {
              
            }
          }
        ?>
        <form action="index.php" method="post">
          <fieldset class="clearfix">
            <p><span class="fontawesome-user"></span><input required type="text" name="username" placeholder="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password" name="password" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
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

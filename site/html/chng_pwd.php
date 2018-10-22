<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Postmail - Change password</title>
    <?php include 'link.php'; ?>
</head>

<body>
<?php include "connect.php"; ?>
    <div id="wrapper">
        <!-- Header and Left Menu -->
        <?php include 'nav.php'; ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                        <?php 
                            if (isset($_POST["password"]) && isset($_POST["new_password"]) && isset($_POST["new_password2"]) ) {
                                if ($_POST['password'] == $_SESSION['password']) 
                                {
                                    if (!empty($_POST['new_password']) && !empty($_POST['new_password2']) ) 
                                    {
                                        if ($_POST['new_password'] == $_POST['new_password2']) 
                                        {
                                            $req = $db->prepare('
                                                UPDATE User 
                                                SET password = :new_password
                                                WHERE id = :user_id
                                            ');


                                            $req->execute(array(
                                                'new_password' => $_POST['new_password'],
                                                'user_id' => $_SESSION['id']
                                            ));


                                            $_SESSION['password'] = $_POST['new_password'];

                                            echo ("<p>PASSWORD MODIFIER !</p>");
                                        }
                                        else
                                        {
                                            echo ("<p>NOUVEAU PASSWORD INCORRECT !</p>");
                                        }
                                        
                                    }
                                    else 
                                    {
                                        echo ("<p>TOUS LES CHAMPS DOIVENT ÊTRE REMPLI !</p>");
                                    }
                                }
                                else 
                                {
                                    echo ("<p>PASSWORD INCORRECT !</p>");    
                                }
                            }
                        ?>
                            <form action="chng_pwd.php" method="post" class="form-horizontal form-material">
                                
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" placeholder="Actual password" class="form-control form-control-line" required> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">New password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="new_password" placeholder="New password" class="form-control form-control-line" required> </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12">Confirm new password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="new_password2" placeholder="New password" class="form-control form-control-line" required> </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" value="Change password" class="btn btn-success" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Pixel Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php include 'scripts.php'; ?>
</body>

</html>

<?php session_start(); ?>
<?php include 'includes/admin_check.php'; ?>
<?php include 'includes/connect.php'; ?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Postmail - Add user</title>
    <?php include 'includes/link.php'; ?>
</head>

<body>
    <div id="wrapper">
        <?php include 'includes/nav.php'; ?>   
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                        <?php 
                            if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["password2"]) && isset($_POST["role"]) && isset($_POST["state"]) ) {
                              
                                if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2']) ) 
                                {
                                    if ($_POST['password'] == $_POST['password2']) 
                                    {
                                        $req = $db->prepare('
                                            INSERT INTO User (username, password, isAdmin, isActive) 
                                            VALUES (:username, :password, :isAdmin, :isActive)
                                        ');

                                        // A Changer en switch quand plus d'un rôle ou plus d'un état
                                        $role = $_POST['role'] == "admin" ? 1 : 0;
                                        $state = $_POST['state'] == "active" ? 1 : 0;
                                    
                                        $req->execute(array(
                                            'username' => $_POST['username'],
                                            'password' => $_POST['password'],
                                            'isAdmin' => $role,
                                            'isActive' => $state
                                        ));

                                        echo ("<p>USER ADDED !</p>");
                                    }
                                    else
                                    {
                                        echo ("<p>THE PASSWORDS ARE DIFFERENT !</p>");
                                    }
                                    
                                }
                                else 
                                {
                                    echo ("<p>ALL FIELDS MUST BE FILLED !</p>");
                                }
                            
                            }
                        ?>
                            <form method="post" action="add.php" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label for="username" class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control form-control-line" name="username" id="username" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Confirm password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password2" class="form-control form-control-line" required> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Role</label>
                                    <div class="col-md-12">
                                        <select name="role" class="form-control form-control-line">
                                            <option value="admin">Admin</option>
                                            <option selected value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">State</label>
                                    <div class="col-md-12">
                                        <select name="state" class="form-control form-control-line">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" value="Add User" class="btn btn-success" />
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
    <?php include 'includes/scripts.php' ?>
</body>

</html>

<?php session_start(); ?>
<?php include 'admin_check.php'; ?>
<?php include "connect.php"; ?>
<?php 
    if (isset($_GET['id']) )  
    {
        $req = $db->prepare('
        SELECT *
        FROM User
        WHERE id = :user_id
      ');
      $req->execute( array(
        'user_id' => $_GET['id']
      ));

      $result = $req->fetch();

      $id = $result['id'];
      $username = $result['username'];
      $password = $result['password'];
      $role = $result['isAdmin'];
      $state = $result['isActive'];
    }
    else 
    {
        header("Location: users.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Postmail - Modify user</title>
    <?php include 'link.php'; ?>
</head>

<body>
    <div id="wrapper">
        <?php include 'nav.php'; ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label for="username" class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input disabled type="text" class="form-control form-control-line" value="<?php echo $username; ?>" id="username"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="<?php echo $password; ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Confirm password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="<?php echo $password; ?>" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Role</label>
                                    <div class="col-md-12">
                                        <select name="role" class="form-control form-control-line">
                                            <option value="admin">Admin</option>
                                            <option <?php if($role == 0) { echo "selected "; }?> value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">State</label>
                                    <div class="col-md-12">
                                        <select name="role" class="form-control form-control-line">
                                            <option value="active">Active</option>
                                            <option <?php if($state == 0) { echo "selected "; }?> value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" value="Upgrade" class="btn btn-success" />
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
    <?php include 'scripts.php' ?>
</body>

</html>

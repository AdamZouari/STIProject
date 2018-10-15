<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Postmail - Users</title>
    <?php include 'link.php'; ?>
</head>

<body>
    <div id="wrapper">
        <!-- Header and Left Menu -->
        <?php include 'nav.php'; ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="clearfix">
                                <h3 class="box-title pull-left">Users list</h3>
                                <a href="add.php" class="btn pull-left m-l-20 btn-rounded btn-outline waves-effect waves-light btn-success white">Add user</a> 
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>State</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Ludwig</td>
                                            <td>Admin</td>
                                            <td>Active</td>
                                            <td><a href="modify.php">Modify</a></td>
                                            <td><a href="#">Delete</a></td>
                                        </tr>

                                        <tr>
                                            <td>Adam</td>
                                            <td>User</td>
                                            <td>Inactive</td>
                                            <td><a href="#">Modify</a></td>
                                            <td><a href="#">Delete</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
    <?php include 'scripts.php'; ?>
</body>

</html>

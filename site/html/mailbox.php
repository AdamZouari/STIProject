<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Postmail - Mailbox</title>
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
                            <h3 class="box-title">Mailbox</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>From</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th></th>
                                            <th><?php echo $_SESSION['password']; ?></th>
                                            <th><?php echo $_SESSION['state']; ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>loic.frueh@gmail.com</td>
                                            <td>Test d'implémentation</td>
                                            <td>08-09-2017</td>
                                            <td><a href="#">Read</a></td>
                                            <td><a href="#">Respond</a></td>
                                            <td><a href="#">Delete</a></td>
                                        </tr>

                                        <tr>
                                            <td>adam.ouest@gmail.com</td>
                                            <td>Implementation Test</td>
                                            <td>15-05-2017</td>
                                            <td><a href="#">Read</a></td>
                                            <td><a href="#">Respond</a></td>
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

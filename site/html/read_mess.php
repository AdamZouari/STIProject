<?php session_start(); ?>
<?php include 'includes/connection_check.php'; ?>
<?php include 'includes/connect.php'; ?>
<?php
            if (isset($_GET['id']) ) 
            {
                $req = $db->prepare('
                    SELECT *
                    FROM Message
                    WHERE id = :message_id AND idUser = :id_user
                ');

                $req->execute( array(
                    'message_id' => $_GET['id'],
                    'id_user' => $_SESSION['id']
                ));

                $req2 = $db->prepare('
                    SELECT username
                    FROM user
                    WHERE id = :user_id
                ');

                $req2->execute( array(
                    'user_id' => 1,  //TODO: A CHANGER PAR LE BON ID
                ));

                $result_mess = $req->fetch();
                $result_user = $req2->fetch();

                if (empty($result_mess) ) 
                {
                    header("Location: mailbox.php");
                    exit();
                }

                $id_mess = $result_mess['id']; 
                $from = $result_user['username'];
                $subject = $result_mess['subject'];
                $message = $result_mess['message'];
                $date = $result_mess['date'];
            }
            else 
            {
                header("Location: mailbox.php");
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
    <title>Postmail - Read message</title>
    <?php include 'includes/link.php'; ?>
</head>

<body>
    <div id="wrapper">
        <!-- Header and Left Menu -->
        <?php include 'includes/nav.php'; ?>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>From</th>
                                            <th class="date"><?php echo $date; ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $from; ?></td>
                                        </tr>                
                                    </tbody>

                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $subject; ?></td>
                                        </tr>                
                                    </tbody>

                                    <thead>
                                        <tr>
                                            <th>Message</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $message; ?></td>
                                        </tr>                
                                    </tbody>

                                </table>
                            </div>
                            <a href="new_mess.php?id=<?php echo $id_mess; ?>" class="btn btn-success link">Respond</a>
                            <a href="delete_mess.php?id=<?php echo $id_mess; ?>" class="btn-danger btn link">Delete</a>
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
    <?php include 'includes/scripts.php'; ?>
</body>

</html>

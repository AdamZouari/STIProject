<?php session_start(); ?>
<?php include 'includes/connection_check.php'; ?>
<?php include 'includes/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Postmail - Mailbox</title>
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
                            <h3 class="box-title">Mailbox</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>From</th>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php
                                        $req = $db->prepare('
                                            SELECT username, subject, date, Message.id
                                            FROM Message
                                            INNER JOIN User ON Message.idExp = User.id
                                            WHERE idDest = :dest_id
                                            ORDER BY date DESC
                                        ');
                                        $req->execute( array(
                                            'dest_id' => $_SESSION['id'],                            
                                        ));
                                        $num_messages = 0;
                                        while($donnee = $req->fetch())
                                        {

                                    ?>

                                        <tr>
                                            <td><?php echo $donnee['username']; ?></td>
                                            <td><?php echo $donnee['subject']; ?></td>
                                            <td><?php echo date("d M Y - G:i", $donnee['date']); ?></td>
                                            <td><a href="read_mess.php?id=<?php echo $donnee['id']; ?>">Read</a></td>
                                            <td><a href="new_mess.php?id=<?php echo $donnee['id']; ?>">Respond</a></td>
                                            <td><a href="delete_mess.php?id=<?php echo $donnee['id']; ?>">Delete</a></td>
                                        </tr>

                                    <?php
                                        $num_messages += 1;
                                        }

                                        if ($num_messages == 0) 
                                        {
                                            echo "<td>Your mailbox is empty.</td>";
                                        }
                                        $req->closeCursor();
                                    ?>
                                    
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
    <?php include 'includes/scripts.php'; ?>
</body>

</html>

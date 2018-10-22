<?php session_start(); ?>
<?php include "connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Postmail - New message</title>
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
                            <?php

                                if (isset($_POST['to']) && isset($_POST['subject']) && isset($_POST['message']) ) 
                                {
                                                            
                                    if (!empty($_POST['to']) && !empty($_POST['subject']) && !empty($_POST['message']) ) 
                                    {
                                        
                                        $req = $db->prepare('
                                                SELECT id, isActive
                                                FROM User
                                                WHERE username = :username
                                            ');
                                        
                                        $req->execute(array(
                                            'username' => trim($_POST['to']),
                                        ));

                                        $result = $req->fetch();

                                        if (empty($result) ) 
                                        {
                                            echo ("<p>THIS USER DOESN'T EXISTS !</p>");
                                        }
                                        else if ($result['isActive'] == 0) 
                                        {
                                            echo ("<p>THE ACCOUNT OF THIS USER IS INACTIVE !</p>");
                                        }
                                        else 
                                        {
                                           
                                            $req = $db->prepare('
                                                INSERT INTO Message (idUser, date, subject, message) 
                                                VALUES (:id_user, :date, :subject, :message)
                                            ');
                                        
                                            $req->execute(array(
                                                'id_user' => $result['id'],
                                                'date' => date("d M Y - G:i"),
                                                'subject' => $_POST['subject'],
                                                'message' => $_POST['message']
                                            ));

                                            echo ("<p>VOTRE MESSAGE À BIEN ÉTÉ ENVOYÉ !</p>");

                                        }
                                        
                                    }
                                    else 
                                    {
                                        echo ("<p>TOUS LES CHAMPS DOIVENT ÊTRE REMPLI !</p>");
                                    }

                                }

                            ?>
                            <form method="post" action="new_mess.php" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label for="to" class="col-md-12">To</label>
                                    <div class="col-md-12">
                                        <input type="text" name="to" placeholder="Username" class="form-control form-control-line" id="to" required> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Subject</label>
                                    <div class="col-md-12">
                                        <input type="text" name="subject" class="form-control form-control-line" required> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="20" name="message" class="form-control form-control-line" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" value="Send" class="btn btn-success" />
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

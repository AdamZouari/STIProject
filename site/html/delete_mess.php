<?php
    session_start();
    include 'includes/connection_check.php';
    include 'includes/connect.php';

    if (isset($_GET['id']) ) 
    {
        $req = $db->prepare('
            DELETE FROM Message 
            WHERE id = :message_id AND idUser = :user_id
        ');

        $req->execute(array(
            'message_id' => $_GET['id'],
            'user_id' => $_SESSION['id']
        ));
    }
    
    header("Location: mailbox.php");
    exit();
?>
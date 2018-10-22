<?php
    session_start();
    include 'admin_check.php';
    include 'connect.php';

    if (isset($_GET['id']) ) 
    {
        $req = $db->prepare('
            DELETE FROM User 
            WHERE id = :user_id
        ');

        $req->execute(array(
            'user_id' => $_GET['id']
        ));
    }
    
    header("Location: users.php");
    exit();
    


?>
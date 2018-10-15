<?php
    if(!$_SESSION['admin'])
    {
        header('Location: 404.html');
    }
?>
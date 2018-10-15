<?php 
    if (!isset($_SESSION['user'])) 
    {
        header('Location: index.php');
    }
?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
        <div class="top-left-part"><a class="logo" href="mailbox.php"><b><img src="plugins/images/pixeladmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="plugins/images/pixeladmin-text.png" alt="home" /></span></a></div>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <a class="profile-pic" href="mailbox.php"> <img src=" plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Steave</b> </a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li style="padding: 10px 0 0;">
                <a href="mailbox.php" class="waves-effect"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i><span class="hide-menu">Mailbox</span></a>
            </li>
            <li>
                <a href="new_mess.php" class="waves-effect"><i class="fa fa-send fa-fw" aria-hidden="true"></i><span class="hide-menu">New message</span></a>
            </li>
            <li>
                <a href="chng_pwd.php" class="waves-effect"><i class="fa fa-unlock-alt fa-fw" aria-hidden="true"></i><span class="hide-menu">Change Password</span></a>
            </li>
            <li>
                <a href="logout.php" class="waves-effect"><i class="fa fa-power-off fa-fw" aria-hidden="true"></i><span class="hide-menu">Logout</span></a>
            </li>
        </ul>
    </div>
</div>
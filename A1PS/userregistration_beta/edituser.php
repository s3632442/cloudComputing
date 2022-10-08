<?php

session_start();

if(!isset($_SESSION['msg'])){
$_SESSION['msg'] = "";
};
$count = 0;
$uid = $_SESSION['uid'];
?>
<html>
    <head>
        <title> User Page </title>
        <link rel = "stylesheet" type="text/css" href="style.css">
        <link rel = "stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
<a class="float-right" href="messageboard.php">HOME</a>
<h2>USER PAGE</h2>
<p><p\>

    <div class = "container">
    
        <div class="login-box">
        <div class = "row">
            <div class = "col-md-6 login-right">
                <h2>Change password</h2>
                <h3>User ID:<?php echo $_SESSION['uid'];?></h3>
                <h3>Username: <?php echo $_SESSION['username'];?></h3>
                <h3><?php echo $_SESSION['msg'];?></h3>
                <form action = "modifyuser.php " method="post">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="oldpassword" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="newpassword" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary"> Register </button>
                </form>
            </div>            
        </div>
    </div>
</body>
</html>
    <?php
$_SESSION['msg'] = "";
?>    


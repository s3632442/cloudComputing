<?php

session_start();
//require __DIR__ . '/vendor/autoload.php';

$uid = $_SESSION['uid'];
$oldpass= $_POST['oldpassword'];
$newpass= $_POST['newpassword'];

// $dbuser = getenv('CLOUDSQL_USER');
// $dbpass = getenv('CLOUDSQL_PASSWORD');
// $dbinst = getenv('CLOUDSQL_DSN');
// $db = getenv('CLOUDSQL_DB');

$dbuser = 'root';
$dbpass = '0Dn=oGzF1]jNPh;f';
$dbinst = '/cloudsql/s3632442-jallybombo:us-central1:forumapp';
$db = 'phpforum';

		// Create connection
$con = new mysqli(null, $dbuser, $dbpass, $db, null, $dbinst);
 
 $s = " select * from users where uid = '$uid' and password = '$oldpass'";
 
$result = $con->query($s);;

$num = mysqli_num_rows($result);



if($num == 0){
    $_SESSION['msg'] = "password incorrect";
    header('location:edituser.php');
}else{
    $_SESSION['username'] = $field;
                    $name = $field;
                    $s= "UPDATE `message` SET `subject`= '$subject' `message` = '$message' WHERE  `msgId`= '$msgId'";
                    $con->query($s);
    $_SESSION['msg'] = "password changed";
    header('location:edituser.php');
}


?>

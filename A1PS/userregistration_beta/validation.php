<?php
session_start();
//require __DIR__ . '/vendor/autoload.php';

$uid = $_POST['uid'];
$name = $_POST['user'];
$pass= $_POST['password'];
 $count = 0;

//  $dbuser = getenv('CLOUDSQL_USER');
//  $dbpass = getenv('CLOUDSQL_PASSWORD');
//  $dbinst = getenv('CLOUDSQL_DSN');
//  $db = getenv('CLOUDSQL_DB');
 
 $dbuser = 'root';
$dbpass = '0Dn=oGzF1]jNPh;f';
$dbinst = '/cloudsql/s3632442-jallybombo:us-central1:forumapp';
$db = 'phpforum';



		// Create connection
$con = new mysqli(null, $dbuser, $dbpass, $db, null, $dbinst);
 
 $s = " select name from users where uid = '$uid' and password = '$pass'";
 
 $result = $con->query($s);
 
 $num = mysqli_num_rows($result);
 


if($num > 0){
    $_SESSION['username'] = $name;
	$_SESSION['uid'] = $uid;
header('location:messageboard.php');
}else{
	$_SESSION['msg'] = "Invalid Credentials";
    header('location:login.php');
}

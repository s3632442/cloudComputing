<?php
session_start();
//require __DIR__ . '/vendor/autoload.php';

$uid = $_POST['uid'];
$name = $_POST['user'];
$pass= $_POST['password'];
 $count = 0;

 $dbuser = getenv('CLOUDSQL_USER');
 $dbpass = getenv('CLOUDSQL_PASSWORD');
 $dbinst = getenv('CLOUDSQL_DSN');
 $db = getenv('CLOUDSQL_DB');



$mysqli = new PDO("s3632442-jallybombo:us-central1:forumapp", "root", "dividian", "phpforum");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = " select * from users where uid = '$uid' and password = '$pass'";

$num = mysqli_num_rows($result);

if ($result = $mysqli -> query($sql)) {
  // Get field information for all fields
  if($num > 0){
    $_SESSION['username'] = $name;
	$_SESSION['uid'] = $uid;
header('location:messageboard.php');
}else{
	$_SESSION['msg'] = "Invalid Credentials";
    header('location:login.php');
}
  }
  $result -> free_result();


$mysqli -> close();
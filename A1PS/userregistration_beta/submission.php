<?php

session_start();
//require __DIR__ . '/vendor/autoload.php';


$msgId = $_SESSION['msgId'];
$uid = $_SESSION['uid'];
$name = $_SESSION['username'];
$subject = $_POST['subject'];
$message= $_POST['message'];
$count = $_SESSION['msgId'];;

 
//  $dbuser = getenv('CLOUDSQL_USER');
//  $dbpass = getenv('CLOUDSQL_PASSWORD');
//  $dbinst = getenv('CLOUDSQL_DSN');
//  $db = getenv('CLOUDSQL_DB');
 
$dbuser = 'root';
$dbpass = '0Dn=oGzF1]jNPh;f';
$dbinst = '/cloudsql/s3632442-jallybombo:us-central1:forumapp';
$db = 'phpforum';


$con = new mysqli(null, $dbuser, $dbpass, $db, null, $dbinst);


$s = "SELECT * FROM `messages`;";
        
$result = $con->query($s);

$count = mysqli_num_rows($result);
$count++;

  $s = "INSERT INTO `messages`(`uid`, `msgId`, `subject`, `message`) VALUES ('$uid','$count','$subject','$message');";

  $result = $con->query($s);

if ($count > $msgId) {
  
  
    $_SESSION['msg'] = "Message Posted";
    header('location:messageboard.php');

    }else{
        $_SESSION['msg'] = "Message not Posted";
        header('location:messageboard.php');
    }
?>
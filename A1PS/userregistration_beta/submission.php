<?php

session_start();
//require __DIR__ . '/vendor/autoload.php';


$msgId = $_SESSION['msgId'];
$uid = $_SESSION['uid'];
$name = $_SESSION['username'];
$subject = $_POST['subject'];
$message= $_POST['message'];
$count = $_SESSION['msgId'];;

 
$dbuser = getenv('CLOUDSQL_USER');
$dbpass = getenv('CLOUDSQL_PASSWORD');
$dbinst = getenv('CLOUDSQL_DSN');
$db = getenv('CLOUDSQL_DB');


		// Create connection
$con = new mysqli_connect(null, $dbuser, $dbpass, $db, null, $dbinst);


$s = "INSERT INTO `messages`(`uid`, `msgId`, `subject`, `message`) VALUES ('$uid','$msgId','$subject','$message');";

$result = mysqli_query($con, $s);

$conn = new mysqli('localhost', 'root', 'dividian', 'phpforum');

$s = "SELECT * FROM `messages`;";
        
$result = $conn->query($s);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
      $count++;
    }
  } else {
    echo "0 results";
  }


if ($count > $msgId) {
    $_SESSION['msg'] = "Message Posted";
    header('location:messageboard.php');

    }else{
        $_SESSION['msg'] = "Message not Posted";
        header('location:messageboard.php');
    }
?>


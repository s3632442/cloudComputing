<?php

session_start();
//require __DIR__ . '/vendor/autoload.php';


$msgId = $_SESSION['msgId'];
$uid = $_SESSION['uid'];
$name = $_SESSION['username'];
$subject = $_POST['subject'];
$message= $_POST['message'];
$count = 0;

 
$con = mysqli_connect('localhost','root', 'dividian'  );

mysqli_select_db($con,'phpforum');


$s = "INSERT INTO `messages`(`uid`, `msgId`, `subject`, `message`) VALUES ('$msgId','$name','$subject','$message');";

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

header('location:messageboard.php');
    }else{
        $_SESSION['msg'] = "Message not Posted";
        header('location:messageboard.php');
    }
?>


<?php

session_start();
require __DIR__ . '/vendor/autoload.php';


$msgId = $_SESSION['msgId'];
$uid = $_SESSION['uid'];
$name = $_SESSION['username'];
$subject = $_POST['subject'];
$message= $_POST['message'];

 
$con = mysqli_connect('localhost','root', 'dividian'  );

mysqli_select_db($con,'phpforum');

$name = $_POST['user'];
$pass= $_POST['password'];

$s = "INSERT INTO `messages`(`uid`, `msgId`, `subject`, `message`) VALUES ('0','bill','subjective','massage');";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);


if ($queryResults->isComplete()) {
    $_SESSION['username'] = $name;


header('location:home.php');
    }else{
        $_SESSION['msg'] = "Message did not send";
        header('location:home.php');
    }
?>


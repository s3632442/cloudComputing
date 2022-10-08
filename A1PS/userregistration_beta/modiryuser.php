<?php

session_start();
//require __DIR__ . '/vendor/autoload.php';


$oldpass= $_POST['oldpassword'];
$newpass= $_POST['newpassword'];

$dbuser = getenv('CLOUDSQL_USER');
$dbpass = getenv('CLOUDSQL_PASSWORD');
$dbinst = getenv('CLOUDSQL_DSN');
$db = getenv('CLOUDSQL_DB');


		// Create connection
        $s = " select * from users where uid = '$_SESSION['uid']' && password = '$oldpass'";


$s = " select * from users where uid = '$uid'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);



if($num == 0){
    $_SESSION['msg'] = "password incorrect";
    header('location:editUser.php');
}else{
    $_SESSION['username'] = $field;
                    $name = $field;
                    $reg= "UPDATE `users` SET `password`='$pass' WHERE  `uid`='$_SESSION['user']'&& `password`='$newpass';";
                    mysqli_query($con, $reg);
    $_SESSION['msg'] = "password changed";
    header('location:editUser.php');
}


?>

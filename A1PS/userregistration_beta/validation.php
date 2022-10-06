<?php
session_start();
//require __DIR__ . '/vendor/autoload.php';

$uid = $_POST['uid'];
$name = $_POST['user'];
$pass= $_POST['password'];
 $count = 0;

 $con = mysqli_connect('localhost','root', 'dividian'  );

 mysqli_select_db($con,'phpforum');
 
 
 $s = " select * from users where uid = '$uid' and password = '$pass'";
 
 $result = mysqli_query($con, $s);
 
 $num = mysqli_num_rows($result);


if($num > 0){
    $_SESSION['username'] = $name;
	$_SESSION['uid'] = $uid;
header('location:home.php');
}else{
	$_SESSION['msg'] = "Invalid Credentials";
    header('location:login.php');
}

?>
   				<!-- if((strcmp($field,$name)==0)&&(strcmp($field,$uid)!=0)){
                        $_SESSION['msg'] = "The username already exists";
                    }
                    if((strcmp($field,$name)!=0)&&(strcmp($field,$uid)==0)){
                        $_SESSION['msg'] = "The ID already exists";
                    }
                    
                } -->
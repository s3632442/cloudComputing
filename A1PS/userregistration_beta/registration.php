<?php

session_start();
//require __DIR__ . '/vendor/autoload.php';


$uid = $_POST['uid'];
$pass= $_POST['password'];
$name= $_POST['user'];

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


$s = " select * from users where uid = '$uid' or name = '$name'";

$result = $con->query($s);

$num = mysqli_num_rows($result);



if($num > 0){






    $_SESSION['msg'] = "user exists already";
    header('location:signup.php');
}else{
    $_SESSION['username'] = $field;
                    $name = $field;
                    $reg= " insert into users(uid, name, password) values ('$uid', '$name', '$pass')";
                    mysqli_query($con, $reg);
    $_SESSION['msg'] = "User added. Please Login";
    header('location:login.php');
}


?>

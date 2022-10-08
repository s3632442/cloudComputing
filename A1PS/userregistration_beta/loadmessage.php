<?php

$SmsgId = $_POST['em'];

// $dbuser = getenv('CLOUDSQL_USER');
// $dbpass = getenv('CLOUDSQL_PASSWORD');
// $dbinst = getenv('CLOUDSQL_DSN');
// $db = getenv('CLOUDSQL_DB');

$dbuser = 'root';
$dbpass = 'dividian';
$dbinst = '/cloudsql/s3632442-jallybombo:us-central1:forumapp';
$db = 'phpforum';

$con = new mysqli(null, $dbuser, $dbpass, $db, null, $dbinst);
            
    $s = "select * from messages LIMIT 1";

    $result = $con->query($s);


        
		if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {             
              $_POST['subject'] = "asdfasdfasd";
              $_POST['message'] = "asdfasdfasdfa";
              header('location:editmessage.php'); 
            }
        }

        $_POST['subject'] = "asdfasdfasd";
              $_POST['message'] = "asdfasdfasdfa";
?>
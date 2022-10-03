<?php

session_start();
require __DIR__ . '/vendor/autoload.php';
header('location:login.php');

$uid = $_POST['uid'];
$name = $_POST['user'];
$pass= $_POST['password'];

use Google\Cloud\BigQuery\BigQueryClient;

        $projectId = 's3632442-jallybombo';
        $client = new BigQueryClient([
                'projectId' => $projectId,
        ]);
 
$query = "SELECT name FROM `credentials_1.users` WHERE uid = '$uid' and name = '$name' and password = '$pass' LIMIT 1;";
        $queryJobConfig = $client->query($query);
        $queryResults = $client->runQuery($queryJobConfig);
        $rows = $queryResults->rows();

        foreach ($rows as $row)
            {
                foreach ($row as $field)
                {
                    $count++;
                }
                }

if ($queryResults->isComplete()) {
if($count > 0){
    $_SESSION['msg'] = "user exists already";
    header('location:signup.php');
}else{
    $mutation = "INSERT INTO `credentials_1.users` (uid, name, password) values ('$uid', '$name', '$pass');";
    $queryJobConfig = $client->query($mutation);
    $queryResults = $client->runQuery($queryJobConfig);
    echo" Registration Successful";
}
}

?>

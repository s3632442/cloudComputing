<?php

session_start();
require __DIR__ . '/vendor/autoload.php';
header('location:login.php');

$name = $_POST['user'];
$pass= $_POST['password'];
$id= $_POST['id'];

use Google\Cloud\BigQuery\BigQueryClient;

        $projectId = 's3632442-jallybombo';
        $client = new BigQueryClient([
                'projectId' => $projectId,
        ]);
 
        $query = "SELECT id, name FROM `credentials.users` WHERE id = '$id' or name = '$name' LIMIT 1;";
        $queryJobConfig = $client->query($query);
        $queryResults = $client->runQuery($queryJobConfig);
        $rows = $queryResults->rows();
        $row = $rows->row();

        foreach ($rows as $row)
            {
                foreach ($row as $field)
                {
                    
                    $count++;
                }
                }

if ($queryResults->isComplete()) {
if($count > 0){
    // if($row[0] == $id && $row[1] != $name){
    //     $msg = "The ID already exists";
    // }
    // if($row[0] != $id && $row[1] == $name){
    //     $msg = "The username already exists";
    // }

    $msg = "The username already exists or The ID already exists";
	
}else{
    $mutation = "INSERT INTO `credentials.users` ( id, name, password) values ('$id', '$name', '$pass');";
    $queryJobConfig = $client->query($mutation);
    $queryResults = $client->runQuery($queryJobConfig);
    $msg = "Registration successful";
	
}
}
$_SESSION['msg'] = $msg;
?>

<?php

session_start();
require __DIR__ . '/vendor/autoload.php';
header('location:login.php');

$name = $_POST['user'];
$pass= $_POST['password'];

use Google\Cloud\BigQuery\BigQueryClient;

        $projectId = 's3632442-jallybombo';
        $client = new BigQueryClient([
                'projectId' => $projectId,
        ]);
 
$query = "SELECT id, name,password FROM `credentials.users` WHERE id = '$id' and name = '$name' and password = '$pass' LIMIT 1;";
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
echo "username already taken";
}else{
    $mutation = "INSERT INTO `credentials.users` (id, name, password) values ('$id', '$name', '$pass');";
    $queryJobConfig = $client->query($mutation);
    $queryResults = $client->runQuery($queryJobConfig);
    echo" Registration Successful";
}
}

?>

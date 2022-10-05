<?php

session_start();
require __DIR__ . '/vendor/autoload.php';


$uid = $_SESSION['uid'];
$name = $_SESSION['username'];
$subject = $_POST['subject'];
$message= $_POST['message'];

 

use Google\Cloud\BigQuery\BigQueryClient;

$projectId = 's3632442-jallybombo';
		$client = new BigQueryClient([
    			'projectId' => $projectId,
		]);
        $mutation = "INSERT INTO `credentials_1.messages_1` (msgId, uid, name,subject, message) values (0, '123', '$name', '$subject', '$message');";
        $queryJobConfig = $client->query($mutation);
        $queryResults = $client->runQuery($queryJobConfig);


if ($queryResults->isComplete()) {
    $_SESSION['username'] = $name;


header('location:home.php');
    }else{
        $_SESSION['msg'] = "Message did not send";
        header('location:home.php');
    }
?>

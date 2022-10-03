<?php

session_start();
require __DIR__ . '/vendor/autoload.php';


 $name = $_POST['user'];
 $pass= $_POST['password'];
 $count = 0;

use Google\Cloud\BigQuery\BigQueryClient;

$projectId = 's3632442-jallybombo';
		$client = new BigQueryClient([
    			'projectId' => $projectId,
		]);
$query = "SELECT id,password FROM `credentials.users` WHERE name = '$id' and password = '$pass' LIMIT 1;";
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
    $_SESSION['username'] = $name;
header('location:home.php');
}else{
	$msg = "ID or password is invalid";
	$_SESSION['msg'] = $msg;
    header('location:login.php');
}
}

?>

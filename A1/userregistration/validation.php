<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

$uid = $_POST['uid'];
$name = $_POST['user'];
$pass= $_POST['password'];
 $count = 0;

use Google\Cloud\BigQuery\BigQueryClient;

$projectId = 's3632442-jallybombo';
		$client = new BigQueryClient([
    			'projectId' => $projectId,
		]);
$query = "SELECT name,password FROM `credentials_1.users` WHERE name = '$name' and password = '$pass' LIMIT 1;";
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
	$_SESSION['uid'] = $uid;
header('location:home.php');
}else{
	$_SESSION['msg'] = "Invalid Credentials";
    header('location:login.php');
}
}
?>

<?php 
	session_start();
	require __DIR__ . '/vendor/autoload.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Big Query Test</title>
	<meta charset='UTF-8'>
	
	<link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' type='text/css' href='/css/style.css'>
</head>
<body>
	<div id='header'>
		Big Query Result
	</div>
	
	<div class='content'>
	<?php
		use Google\Cloud\BigQuery\BigQueryClient;

		$projectId = 's3632442-jallybombo';
		$client = new BigQueryClient([
    			'projectId' => $projectId,
		]);
		$query = "SELECT id,user_name,password FROM `users.user_creds` Group by id, user_name, password LIMIT 10;";
		$queryJobConfig = $client->query($query);
		$queryResults = $client->runQuery($queryJobConfig);

		$str = "<table>".
		"<tr>" .
		"<th>id</th>" .
		"<th>name</th>" .
		"<th>password</th>" .
		"</tr>";

		if ($queryResults->isComplete()) {
			$rows = $queryResults->rows();
		
			foreach ($rows as $row)
			{
				$str .= "<tr>";

				foreach ($row as $field)
				{
					$str .= "<td>" . $field . "</td>";
				}
				$str .= "</tr>";
			}
		} else {
			throw new Exception('The query failed to complete');
		}

		$str .= '</table></div>';

		echo $str;
	?>
	</div>
</body>
</html>

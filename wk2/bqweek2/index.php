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
		$query = "SELECT name, SUM(count) as freq FROM `baby.baby_names` WHERE gender = 'M' Group by name ORDER BY freq  DESC LIMIT 5;";
		$queryJobConfig = $client->query($query);
		$queryResults = $client->runQuery($queryJobConfig);

		$str = "<table>".
		"<tr>" .
		"<th>Name</th>" .
		"<th>Gender</th>" .
		"<th>Count</th>" .
		"<th>Year</th>" .
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

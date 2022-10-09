<?php 
	session_start();
	require __DIR__ . '/vendor/autoload.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>A2 P2</title>
	<meta charset='UTF-8'>
	
	<link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' type='text/css' href='/css/style.css'>
</head>
<body>
	<div id='header'>
		A1 P2
	</div>
	
	<div class='content'>
        
	<?php
		use Google\Cloud\BigQuery\BigQueryClient;

		$projectId = 's3632442-jallybombo';
		$client = new BigQueryClient([
    			'projectId' => $projectId,
		]);
		$query = "SELECT count(time_ref) as times , SUM(value) trade_val  FROM `A1_data.gsquarterly` GROUP BY time_ref ORDER BY time_ref LIMIT 10;";
		$queryJobConfig = $client->query($query);
		$queryResults = $client->runQuery($queryJobConfig);

		$str = "<h3>top 10 time slots (year and month) with the highest trade value </h3><div><table>".
		"<tr>" .
		"<th>Time Slots</th>" .
		"<th>Trade Value</th>" .
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

        $query = "SELECT string_field_1 as COUNTRY_LABEL , product_type , status, value  FROM `A1_data.gsquarterly` as GS_Q JOIN `A1_data.country_classification` as COUNTRY_DATA on COUNTRY_DATA.string_field_0 = `country_code` WHERE value IS NOT NULL GROUP BY product_type , account, string_field_1, value, status ORDER BY value LIMIT 50;";
		$queryJobConfig = $client->query($query);
		$queryResults = $client->runQuery($queryJobConfig);

		$str = "<h3> Top 50 countries with the highest total trade deficit value </h3><div><table>".
		"<tr>" .
		"<th>Country</th>" .
		"<th>Product</th>" .
        "<th>Trade Devicit</th>" .
        "<th>Status</th>" .
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

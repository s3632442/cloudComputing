<?php

session_start();
require __DIR__ . '/vendor/autoload.php';
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>


<html>
    <head>
    <title> HOME PAGE </title>
    <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
    <link rel = "stylesheet" type="text/css" href="style.css">
    <link rel = "stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        
</head>
<body>

<div class="container">
    <a class="float-right" href="logout.php">LOG OUT!</a>
   <h1>WELCOME <a href="userpage.php"> <?php echo $_SESSION['username'];?></a> </h1>
   <h2>Message Board</2>
   <div class='content'>
	<?php
		use Google\Cloud\BigQuery\BigQueryClient;

		$projectId = 's3632442-jallybombo';
		$client = new BigQueryClient([
    			'projectId' => $projectId,
		]);
		$query = "SELECT name, subject, message FROM `credentials_1.messages`;";
		$queryJobConfig = $client->query($query);
		$queryResults = $client->runQuery($queryJobConfig);

		$str = "<table>".
		"<tr>" .
		"<th>ID</th>" .
		"<th>subject</th>" .
		"<th>Message</th>" .
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
   
<div class = "container">
        <div class="login-box">
            <div class = "row">
                <div class = "col-md-6 login-left">
                    <h2>Wirte message here</h2>
                    <?php echo $_SESSION['msg'];?></h3>
                    <form action = "submission.php " method="post">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="message" class="form-control" required>
                    </div>
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
    



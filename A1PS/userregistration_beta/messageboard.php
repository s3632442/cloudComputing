<?php
session_start();
//require __DIR__ . '/vendor/autoload.php';
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
if(!isset($_SESSION['msg'])){
    $_SESSION['msg'] = "";
}
$count = 0;
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
    <a class="float-right" href="messageboard.php">HOME!</a>
    <a class="float-right" href="editmessage.php">EDIT MESSAGES</a>
    
   <h1>WELCOME <a href="edituser.php"> <?php echo $_SESSION['username'];?></a> </h1><img src="https://storage.cloud.google.com/s3632442-storage/<?php echo $_SESSION['uid']?>.png" alt="userImage">
   <h2>Message Board</2>
   <div class='content'>
   <?php

// $dbuser = getenv('CLOUDSQL_USER');
// $dbpass = getenv('CLOUDSQL_PASSWORD');
// $dbinst = getenv('CLOUDSQL_DSN');
// $db = getenv('CLOUDSQL_DB');

$dbuser = 'root';
$dbpass = 'dividian';
$dbinst = '/cloudsql/s3632442-jallybombo:us-central1:forumapp';
$db = 'phpforum';



		// Create connection
    $con = new mysqli(null, $dbuser, $dbpass, $db, null, $dbinst);
            
        $s = "SELECT * FROM `messages` ORDER BY msgId DESC LIMIT 10;";
        
        $result = $con->query($s);
        
		if ($result->num_rows > 0) {
            // output data of each row
            $str = "<table><tr><th>ID</th><th>Name</th></tr>";
            while($row = $result->fetch_assoc()) {             
              $str .= "<tr><td>".$row["uid"]."</td><td>".$row["subject"]." ".$row["message"]."</td></tr>";
              $count++; 
              }
              $str .= "</table>";

              
            }
           else {
            echo "0 results";
          }
        
          echo $str;

          $count++;
        $_SESSION['msgId'] = $count;
	?>
   
<div class = "container">
<h2>Compose message</h2>
        <div class="login-box">
            <div class = "row">
                <div class = "col-md-6 login-left">
                    <form action = "submission.php " method="post">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
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
<?php
$_SESSION['msg'] = "";
?>    
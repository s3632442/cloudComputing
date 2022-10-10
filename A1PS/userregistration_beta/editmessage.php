<?php

session_start();

if(!isset($_SESSION['msg'])){
$_SESSION['msg'] = "";
};
$count = 0;
$uid = $_SESSION['uid'];
?>
<html>
    <head>
        <title> EDIT MESSAGE </title>
        <link rel = "stylesheet" type="text/css" href="style.css">
        <link rel = "stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
<a class="float-right" href="messageboard.php">HOME</a>
<h2>EDIT MESSAGE</h2>
<p><p\>
<?php

// $dbuser = getenv('CLOUDSQL_USER');
// $dbpass = getenv('CLOUDSQL_PASSWORD');
// $dbinst = getenv('CLOUDSQL_DSN');
// $db = getenv('CLOUDSQL_DB');

$dbuser = 'root';
$dbpass = '0Dn=oGzF1]jNPh;f';
$dbinst = '/cloudsql/s3632442-jallybombo:us-central1:forumapp';
$db = 'phpforum';
if(!isset($_POST['subject'])||!isset($_POST['message'])){
    $subject = "";
    $message = "";
    }else{
    $subject = $_POST['subject'];
    $message = $_POST['message'];
};

		// Create connection
    $con = new mysqli(null, $dbuser, $dbpass, $db, null, $dbinst);
            
    $s = "select * from messages where uid = '$uid' ORDER BY msgId DESC LIMIT 10";
        
        $result = $con->query($s);


        
		if ($result->num_rows > 0) {
            // output data of each row
            $str = "<table><tr><th>ID</th><th>Name</th></tr>";
            while($row = $result->fetch_assoc()) {             
              $str .= "<form action = 'loadmessage.php ' method='post'><tr><td>".$row["uid"]."</td><td>".$row["subject"]." ".$row["message"]." "."<button type='submit' name='em' value=".$row['msgId']."> Edit Message </button>"."</td></tr></form>";
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
    
        <div class="login-box">
            <div class = "container">
        <div class="login-box">
            <div class = "row">
                <div class = "col-md-6 login-left">
                    <form action = "submission.php " method="post">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="<?php echo $subject ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <input type="text" name="message" class="form-control" placeholder="<?php echo $message ?>" required>
                    </div>
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>
</body>
</html>
    <?php
$_SESSION['msg'] = "";
?>    


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
   <h1>WELCOME <a href="edituser.php"> <?php echo $_SESSION['username'];?></a> </h1>
   <h2>Message Board</2>
   <div class='content'>
   <?php
		// Create connection
$conn = new mysqli('localhost', 'root', '0Dn=oGzF1]jNPh;f', 'phpforum');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
                
        $s = "SELECT * FROM `messages`;";
        
        $result = $conn->query($s);

		if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "id: " . $row["msgId"]. " - Name: " . $row["uid"]. " " . $row["subject"]. " " . $row["message"]. "<br>";
            }
          } else {
            echo "0 results";
          }
          

		

		
        $count++;
        $_SESSION['count'] = $count;
	?>
   
<div class = "container">
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
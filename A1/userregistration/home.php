<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}


?>


<html>
    <head>
    <title> HOME PAGE </title>
    <link rel = "stylesheet" type="text/css" href="style.css">
    <link rel = "stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        
</head>
<body>

<div class="container">
    <a class="float-right" href="logout.php">LOG OUT!</a>
   <h1>WELCOME <?php echo $_SESSION['username'];?></h1>
</div>
<div class="float-right">
<?php if (array_key_exists('content', $_POST)) {
    echo "You wrote:<pre>\n";
    echo htmlspecialchars($_POST['content']);
    echo "\n</pre>";
  }

?>
</div>
<form action="home.php" method="post">
      <div>Write something
        <textarea name="content" rows="3" cols="60"></textarea>  
      </div>
      <div>
        <input type="submit" value="Submit">
      </div>
    </form>


</body>
</html>
    
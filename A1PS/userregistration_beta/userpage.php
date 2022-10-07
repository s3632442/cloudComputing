<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>


<html>
    <head>
    <title> USERPAGE </title>
    <link rel = "stylesheet" type="text/css" href="style.css">
    <link rel = "stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        
</head>
<body>

<div class="container">
    <a class="float-right" href="logout.php">LOG OUT!</a>
    <a class="float-right" href="messageboard.php">HOME!</a>
   <h1>USER PAGE  </h1>
</div>


</body>
</html>
    



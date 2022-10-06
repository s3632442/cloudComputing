<?php

session_start();
$test = "";
$_SESSION['message'] = $test;

?>


<html>
    <head>
    <title> HOME PAGE </title>
    <link rel = "stylesheet" type="text/css" href="style.css">
    <link rel = "stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
        
</head>
<body>

<div class="container">
<a class="float-right" href="login.php">LOG IN!</a>
    <a class="float-right" href="signup.php">SIGN UP!</a>
   <h1>WELCOME </h1>
</div>


</body>
</html>
    



<html>
  <body>
  <?php

include __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

  $storage = new StorageClient();
  $storage->registerStreamWrapper();

    $primes = explode(",",
        file_get_contents('gs://s3632442-storage/prime_numbers.txt')
    );

    $uname = "uname";
    $arrlength=count($primes);

    echo $uname

    // for($x=0; $x<$arrlength; $x++){
    //   if($uname === $primes[$x]) {
    //       echo "The ". $x ."-th prime number is: ".$primes[$x]."<br>";
    //   }
      }
?>
    <form action="/sign" method="post">
      </div>
<form action="action_page.php" method="post">
  
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form> 
</body>
</html>
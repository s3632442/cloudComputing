<html>
  <body>
    <?php

include __DIR__ . '/vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

  $storage = new StorageClient();
  $storage->registerStreamWrapper();

    $creds = explode(",",
        file_get_contents('gs://s3632442-storage/user_creds.txt')
    );

    $arrlength=count($creds);

    

      if (array_key_exists('username', $_POST)) {
        
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $y=1;
        for($x=0; $x<=$arrlength-2; $x++){
        
          if($username ==$creds[$x]){
            if($password ==$creds[$y])
            {
              echo "Logged in: ".$username."\n";
            }
          }
          $y++;
      }
      }
    ?>
    <form action="/sign" method="post">
      <div>Username
        <textarea name="username" rows="3" cols="60"></textarea>  
      </div>
      <div>Password
        <textarea name="password" rows="3" cols="60"></textarea>  
      </div>
      <div>
        <input type="submit" value="Submit">
        <form action="https://www.google.com">
    <input type="submit" value="Register" />
</form>

      </div>
    </form>
  </body>
</html>
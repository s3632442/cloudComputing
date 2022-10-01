<?php

  include __DIR__ . '/vendor/autoload.php';
  use Google\Cloud\Storage\StorageClient;

    $storage = new StorageClient();
    $storage->registerStreamWrapper();

      $primes = explode(",",
	        file_get_contents('gs://sxxxxxxx-storage/prime_numbers.txt')
		  );

      $arrlength=count($primes);

      for($x=0; $x<$arrlength; $x++){
	          echo "The ". $x ."-th prime number is: ".$primes[$x]."<br>";
		    }
?>

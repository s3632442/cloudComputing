<?php

  include __DIR__ . '/vendor/autoload.php';
  use Google\Cloud\Storage\StorageClient;

  $storage = new StorageClient();
  $storage->registerStreamWrapper();

  $handle = fopen('gs://s3632442-storage/prime_numbers.txt','w');

  fwrite($handle, "2");
  for($i = 3; $i <= 2000; $i = $i + 2) {
    $j = 2;
    while($i % $j != 0) {
      if($j > sqrt($i)) {
        fwrite($handle, ", ".$i);
        break;
      }
      $j++;
    }
  }

  fclose($handle);
  echo 'Prime number file created in GCS Bucket';
?>
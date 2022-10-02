<?php

  include __DIR__ . '/vendor/autoload.php';
  use Google\Cloud\Storage\StorageClient;

  $storage = new StorageClient();
  $storage->registerStreamWrapper();

  $handle = fopen('gs://s3632442-storage/prime_numbers.txt','w');

  fwrite($handle, "name");
  fwrite($handle, ", ");
  fwrite($handle, "pass");

  fclose($handle);
  echo 'Prime number file created in GCS Bucket';
?>
<?php
  define('DB_HOST', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', 'eko10031994');
  define('DB_NAME', 'sensuspenduduk');

  $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

  // check if error
  if(mysqli_connect_errno()){
    die('Error '.mysqli_connect_error());
  }
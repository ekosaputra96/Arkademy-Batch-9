<?php
  include_once '../config/database.php';
  if(isset($_POST['submit-user'])){
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // sql
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    // prepare statement
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        die('Error : '. mysqli_stmt_error($stmt));
    }
    // bind param
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    if(!mysqli_stmt_execute($stmt)){
        die('Error : '.mysqli_stmt_error($stmt));
    }
  }
  header('Location: ../index.php');
?>
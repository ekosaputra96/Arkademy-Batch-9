<?php
  include_once '../config/database.php';
  if(isset($_POST['login-submit'])){

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // sql
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
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
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) == 0){
      header('Location: ../index.php?info=invaliduser');
    }else{
      session_start();
      $row = mysqli_fetch_assoc($result);
      $_SESSION = $row;
      header('Location: ../login/index.php');
    }
  }
?>
<?php
  if(isset($_GET['status'])){
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    // sql
    $sql = "DELETE FROM regions WHERE id = ?";
    // prepare statement
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        die('Error : '. mysqli_stmt_error($stmt));
    }
    // bind param
    mysqli_stmt_bind_param($stmt, 'i', $id);
    if(!mysqli_stmt_execute($stmt)){
        die('Error : '.mysqli_stmt_error($stmt));
    }
    header('Location: regions.php');
  }
?>
<?php 
  if(isset($_POST['logout-submit'])){
    session_start();
    session_destroy();
    header('Location: ../index.php');
  }
?>
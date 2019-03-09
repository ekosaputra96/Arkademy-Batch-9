<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sensus Penduduk</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="fas fa-users custom"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">PORTFOLIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ABOUT ME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">CONTACT</a>
          </li>
        </ul>
        <?php if(empty($_SESSION)): ?>
        <form class="form-inline my-2 my-lg-0" action="includes/login.php" method="post">
          <input class="form-control mr-sm-2" type="text" placeholder="Username/E-mail..." name="email">
          <input type="password" name="password" class="form-control mr-sm-2" placeholder="Password..."> 
          <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="login-submit">Login</button>
        </form>
        <?php else: ?>
        <form class="form-inline my-2 my-lg-0" action="includes/logout.php" method="post">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit" name="logout-submit">Logout</button>
        </form>
        <?php endif; ?>
      </div>
    </div>
  </nav>
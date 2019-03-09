<?php include 'includes/header.php';
?>
  <br>
  <h1 class="text-center">Selamat Datang Di Sensus Penduduk</h1>
  <br>
  <div class="container">
<!-- include carousel -->
<?php include 'includes/carousel.php' ?>
    <hr>
<!-- Form and About -->
    <div class="row">
      <div class="col-sm">
        <h4> <i class="fas fa-info-circle"></i> About Us</h4>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos praesentium consectetur laudantium corrupti sint, ut excepturi fuga impedit minus quidem voluptate, temporibus deserunt omnis quas! Adipisci, repudiandae nobis! Quaerat culpa molestiae laborum perferendis vitae quibusdam cupiditate, harum reiciendis consectetur nemo aut odit corporis sapiente excepturi illo tenetur assumenda minima.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia iste aliquam odit quod praesentium unde nostrum quos qui doloribus recusandae? Aliquam maxime quo ipsam reprehenderit dolor aliquid odit earum in!</p>
      </div>
      <div class="col-sm">
        <h4><i class="fab fa-wpforms"></i> Create New User</h4>
        <form action="includes/create.php" method="post">
          <div class="form-group">
            <label for="email"><i class="far fa-envelope"></i> Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email...">
          </div>
          <div class="form-group">
            <label for="password"><i class="fas fa-key"></i> Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password...">
          </div>
          <button type="submit" class="btn btn-primary" name="submit-user">Submit</button>
        </form>
      </div>
    </div>

    <hr>

    <!-- closing container -->
  </div>



<?php include 'includes/footer.php' ?>

<?php
    if(isset($_POST['submit-person'])){
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $region = mysqli_real_escape_string($connection, $_POST['region']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        $income = mysqli_real_escape_string($connection, $_POST['income']);

        // sql
        $sql = "INSERT INTO person (name, region_id, address, income) VALUE (?,?,?,?)";
        // prepare statement
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            die('Error : '. mysqli_stmt_error($stmt));
        }
        // bind param
        mysqli_stmt_bind_param($stmt, 'sisi', $name, $region, $address, $income);
        if(!mysqli_stmt_execute($stmt)){
            die('Error : '.mysqli_stmt_error($stmt));
        }
        header('Location: person.php');
    }
?>

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Person<small> Adding A New Person</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Add New Person
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <h3 class="text-center"> Fill All Of The Fields</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?status=add" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name...">
        </div>
        <div class="form-group">
            <label for="region">Region</label>
            <select name="region" id="region" class="form-control">
                <?php   
                    $sql = "SELECT * FROM regions";
                    // sql query
                    $result = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_assoc($result)): ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php
                    endwhile;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" rows="5" class="form-control" placeholder="Enter Your Address..."></textarea>
        </div>
        <div class="form-group">
            <label for="income">Income</label>
            <input type="number" name="income" id="income" class="form-control" placeholder="Enter Only Number...">
        </div>
        <button type="submit" class="btn btn-primary" name="submit-person">Submit</button>
    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

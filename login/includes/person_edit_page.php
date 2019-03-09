<?php
    if(isset($_POST['update-person'])){
        $id = mysqli_real_escape_string($connection, $_POST['id']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $region = mysqli_real_escape_string($connection, $_POST['region']);
        $address = mysqli_real_escape_string($connection, $_POST['address']);
        $income = mysqli_real_escape_string($connection, $_POST['income']);

        // sql
        $sql = "UPDATE person SET name = ?, region_id = ?, address = ?, income = ? WHERE id = ?";
        // prepare statement
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            die('Error : '. mysqli_stmt_error($stmt));
        }
        // bind param
        mysqli_stmt_bind_param($stmt, 'sisii', $name, $region, $address, $income, $id);
        if(!mysqli_stmt_execute($stmt)){
            die('Error : '.mysqli_stmt_error($stmt));
        }
        header('Location: person.php');
    }
    if(isset($_GET['status'])){
        $id = mysqli_real_escape_string($connection, $_GET['id']);
        // sql
        $sql = "SELECT * FROM person WHERE id = ?";
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
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    }
?>

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Update Person<small> Updating The Person</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Update Person
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <h3 class="text-center"> Fill All Of The Fields</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?status=edit" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name..." value="<?php echo $row['name']; ?>">
        </div>
        <div class="form-group">
            <label for="region">Region</label>
            <select name="region" id="region" class="form-control">
                <?php   
                    $sql = "SELECT * FROM regions";
                    // sql query
                    $result1 = mysqli_query($connection, $sql);
                    while($row1 = mysqli_fetch_assoc($result1)): ?>
                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                <?php
                    endwhile;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" rows="5" class="form-control" placeholder="Enter Your Address..."><?php echo $row['address']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="income">Income</label>
            <input type="number" name="income" id="income" class="form-control" placeholder="Enter Only Number..." value="<?php echo $row['income']; ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <button type="submit" class="btn btn-primary" name="update-person">Update</button>
    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

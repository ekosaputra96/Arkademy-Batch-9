<!-- <?php
    // adding new region
    if(isset($_POST['edit-region'])){
        $id = mysqli_real_escape_string($connection, $_POST['id']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        // sql
        $sql = "UPDATE regions SET name = ? WHERE id = ?";
        // prepare statement
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            die('Error : '. mysqli_stmt_error($stmt));
        }
        // bind param
        mysqli_stmt_bind_param($stmt, 'si', $name, $id);
        if(!mysqli_stmt_execute($stmt)){
            die('Error : '.mysqli_stmt_error($stmt));
        }
    }
    if(isset($_GET['status'])){
        $id = mysqli_real_escape_string($connection, $_GET['id']);
        // sql
        $sql = "SELECT * FROM regions WHERE id = ?";
        // prepare statement
        $stmt = mysqli_stmt_init($connection);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            die('Error : '. mysqli_stmt_error($stmt));
        }
        // bind param
        mysqli_stmt_bind_param($stmt, 's', $id);
        if(!mysqli_stmt_execute($stmt)){
            die('Error : '.mysqli_stmt_error($stmt));
        }
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    }
?> -->
<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Region</h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a></li>
                <li class="active"><i class="fa fa-file"></i> Edit Region</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- row for creating and showing regions-->
    <div class="row">
        <div class="col-md-6">
            <h3>Edit Region</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>?status=edit&id=<?php echo $row['id']; ?>" method="post">
                <div class="form-group">
                    <label for="name">Region Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter New Region..." value="<?php echo $row['name']; ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <button type="submit" class="btn btn-primary" name="edit-region">Submit Region</button>
            </form>
        </div>

        <div class="col-md-6">
            <h3>All Regions That Are Available</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Region Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $counter = 1;
                        // query
                        $sql = "SELECT name FROM regions";
                        // sql query
                        $result = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($result) == 0){
                            echo '<td>No Result</td>';
                        }else{
                            while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['name']; ?></td>
                    </tr>
                    <?php 
                            $counter ++;
                            endwhile;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

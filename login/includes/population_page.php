<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Population <small>Show All Population</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Population
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="filter">Filter Based On Certain Region</label>
            <select name="filter" id="filter" class="form-control">
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

        <button type="submit" class="btn btn-primary" name="submit-filter">Submit</button>
    </form>

    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Income</th>
                <th>Region</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(isset($_POST['submit-filter'])){
                    $id = mysqli_real_escape_string($connection, $_POST['filter']);
                    // sql
                    $sql = "SELECT `person`.`name` as name, `person`.`income`, `regions`.`id`, `regions`.`name` as region from `person` INNER JOIN `regions` ON `person`.`region_id` = `regions`.`id` WHERE `regions`.`id` = ? ORDER by `person`.`name` ASC";
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
                    if(mysqli_num_rows($result) == 0){
                        echo '<td> NO RESULT </td>';
                    }

                }else{
                    // sql
                    $sql = "SELECT `person`.`name` as name, `person`.`income`, `regions`.`id`, `regions`.`name` as region from `person` INNER JOIN `regions` ON `person`.`region_id` = `regions`.`id` ORDER by `person`.`name` ASC ";
                    // query
                    $result = mysqli_query($connection, $sql);
                }
                $counter = 1;
                while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['income']; ?></td>
                    <td><?php echo $row['region']; ?></td>
                </tr>
            <?php
                $counter++;
                endwhile;
            ?>
        </tbody>
    </table>
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

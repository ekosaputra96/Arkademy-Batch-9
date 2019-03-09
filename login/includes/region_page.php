<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Regions<small> Showing All Regions</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Show All Regions
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <h3 class="text-center">All Regions</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $counter = 1;
                // query
                $sql = "SELECT * FROM regions";
                // sql query
                $result = mysqli_query($connection, $sql);
                if(mysqli_num_rows($result) == 0){
                    echo '<td>No Result</td>';
                }else{
                    while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td class="custom-data">
                    <a href="regions.php?status=edit&id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                    <a href="regions.php?status=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php 
                    $counter ++;
                    endwhile;
                }
            ?>
        </tbody>
    </table>

    <a href="createregion.php" class="btn btn-primary">Create New Region</a>

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

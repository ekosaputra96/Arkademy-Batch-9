
    <div id="page-wrapper">

    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Show People<small> Showing All People</small></h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a></li>
                <li class="active"><i class="fa fa-file"></i> Show People</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- row for creating and showing regions-->
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Show All People</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Region</td>
                        <td>Address</td>
                        <td>Income</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $counter = 1;
                        // query
                        $sql = "SELECT * FROM person";
                        // sql query
                        $result = mysqli_query($connection, $sql);
                        if(mysqli_num_rows($result) == 0){
                            echo '<td>No Result</td>';
                        }else{
                            while($row = mysqli_fetch_assoc($result)){
                                // sql
                                $id = $row['region_id'];
                                $sql = "SELECT name FROM regions WHERE id = $id ";
                                $result1 = mysqli_query($connection, $sql);
                                $row1 = mysqli_fetch_assoc($result1);
                            ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row1['name']; ?></td>
                        <td class="custom-address"><?php echo $row['address']; ?></td>
                        <td><?php echo $row['income']; ?></td>
                        <td class="custom-data">
                            <a href="person.php?status=edit&id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="person.php?status=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php 
                            $counter ++;
                            };
                        }
                    ?>
                </tbody>
            </table>
            <a href="person.php?status=add" class="btn btn-primary">Add New Person</a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

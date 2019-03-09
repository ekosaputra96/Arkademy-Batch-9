<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="text-center">Welcome <?php echo $_SESSION['email']; ?> !</h2>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Summary<small> Regional Data</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Summary
                </li>
            </ol>
        </div>
    </div>

    <h3 class="text-center">Summary</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Region Name</th>
                <th>Total Population</th>
                <th>Total Income</th>
                <th>Average Income</th>
                <th>Status</th>
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
                while($row = mysqli_fetch_assoc($result)){
                // query
                $id = $row['id'];
                $sql = "SELECT sum(income) as total, round(avg(income)) as average, count(id) as sum From person WHERE region_id = $id";
                $result1 = mysqli_query($connection, $sql);
                $row1 = mysqli_fetch_assoc($result1);
                if ($row1['total'] <= 1700000){
                    $color = 'red';
                }elseif($row1['total'] > 1700000 && $row1['total'] <= 2200000){
                    $color = 'yellow';
                }else{
                    $color = 'green';
                }
        ?>
            <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row1['sum']; ?></td>
                <td><?php echo $row1['total']; ?></td>
                <td><?php echo $row1['average']; ?></td>
                <td style="background: <?php echo $color;?>;"></td>
            </tr>
        <?php 
                $counter ++;
                }
            }
        ?>
        </tbody>
    </table>
    <!-- /.row -->
    <hr>
    <h4>For Your Information About Status Column</h4>
    <ul>
        <li><span style="color:red;">Red</span> = Total Income < 1.700.000</li>
        <li><span style="color:yellow;">Yellow</span> = Total Income > 1.700.000 dan < 2.200.000</li>
        <li><span style="color:green;">Green</span> = Total Income > 2.200.000</li>
    </ul>

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

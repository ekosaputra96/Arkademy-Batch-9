<!-- header -->
<?php include 'includes/header.php' ?>
    <div id="wrapper">
<!-- navigation -->
<?php $regions = true; include 'includes/navigation.php' ?>

<!-- page -->
<?php 
    if(isset($_GET['status'])){
        $status = htmlspecialchars($_GET['status']);
        switch($status){
            case 'edit':
                include 'includes/region_edit_page.php';
            break;
            case 'delete':
                include 'includes/region_delete_page.php';
            break;
            default:
                header('Location: regions.php');
        }
    }else{
        include 'includes/region_page.php';
    }
?>
    </div>
    <!-- /#wrapper -->

    <!-- footer -->
<?php include 'includes/footer.php' ?>

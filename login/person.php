<!-- header -->
<?php include 'includes/header.php' ?>
    <div id="wrapper">

<!-- navigation -->
<?php $person = true; include 'includes/navigation.php' ?>

<!-- page -->
<?php 
    if(isset($_GET['status'])){
        $status = htmlspecialchars($_GET['status']);
        switch($status){
            case 'edit':
                include 'includes/person_edit_page.php';
            break;
            case 'delete':
                include 'includes/person_delete_page.php';
            break;
            case 'add':
                include 'includes/person_add_page.php';
            break;
            default:
                header('Location: regions.php');
        }
    }else{
        include 'includes/person_page.php';
    }
?>
    </div>
    <!-- /#wrapper -->

    <!-- footer -->
<?php include 'includes/footer.php' ?>

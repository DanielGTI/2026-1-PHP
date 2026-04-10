<!DOCTYPE html>
<html lang="en">

<?php
     require_once 'header.php';
?>

<body class="nav-md">
<div class="body">
    <div class="main_container container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 left_col">
                <div class="left_col">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <?php 
                        require_once  'sidemenu.php';
                    ?>

                </div>
            </div>
            <div class="col-lg-10 col-md-12 right_col_wrapper">
                <div class="row">

                    <?php
                        require_once 'topmenu.php';
                        require_once 'content.php';
                        require_once 'footer.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
        require_once 'scripts.php';
    ?>
</body>
</html>

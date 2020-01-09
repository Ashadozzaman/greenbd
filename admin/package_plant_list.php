<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include_once '../helpers/format.php';?>
<?php include_once '../classes/package.php';?>
<?php
    $pkg = new Package();
    if (!isset($_GET['package_id'])) {
        echo "<script>window:location = 'packageList.php';</script>";
    }else{
        $pkg_id = $_GET['package_id'];
        $package_book_id = $_GET['package_book_id'];
        $cus_id = $_GET['cus_id'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_quantity'])) {
        $quantity = $_POST['quantity'];
        $pp_id = $_POST['pp_id'];
        $plant_id = $_POST['plant_id'];
        $up_plant_quantity = $pkg->up_plant_quantity($quantity,$pkg_id,$pp_id,$plant_id,$package_book_id,$cus_id);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_plant'])) {
        $pp_id = $_POST['pp_id'];
        $del_plant= $pkg->delete_plant($pp_id);
    }

?>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <?php include 'tamp/header.php';?>
    <div class="courses-area">
        <div class="container-fluid">
            <?php
                if (isset($up_plant_quantity)){
                    echo $up_plant_quantity;
                }
            ?>
            <div class="courses-title">
                <?php
                    $get_all_plants_quantity = $pkg->get_Total_plants($package_book_id,$pkg_id,$cus_id);
                ?>
                <h2>Total Quantity: <?= $get_all_plants_quantity; ?> </h2>
            </div>
            <div class="row">
                <?php
                $get_plants_by_package = $pkg->get_plants_by_package($package_book_id,$pkg_id,$cus_id);
                if($get_plants_by_package){
                while ($row = $get_plants_by_package->fetch_assoc()){ ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 w-100 p-3">
                    <div class="courses-inner res-mg-b-30">
                        <div class="courses-title">
                            <a href="#"><img style="width: 240px;height: 210px" src="<?= $row['image'] ?>" alt=""></a>
                            <h2 style="height: 30px;"><?= $row['plant_name'];?></h2>
                        </div>
                        <form action="" method="post">
                            <div class="course-des">
                                <p><span><i class="fa fa-clock"></i></span> <b>Package:</b> <?= $row['pkg_name'] ?></p>
                                <p><span><i class="fa fa-clock"></i></span> <b>Plant Quantity:</b> <?= $row['quantity'] ?></p>

                                <div class="col-lg-5">
                                    <input type="hidden" name="pp_id" value="<?= $row['pp_id']; ?>">
                                    <input type="hidden" name="pb_id" value="<?= $package_book_id; ?>">
                                    <input type="hidden" name="cus_id" value="<?= $cus_id; ?>">
                                    <input type="hidden" name="plant_id" value="<?= $row['plant_id']; ?>">
                                    <input style="height: 30px;margin-top: 7px;" type="number" name="quantity" min="1" class="form-control quantity" placeholder="Enter Quantity">

                                </div>
                            </div>
                            <div>
                                <button name="submit_quantity" class="btn btn-custon-four btn-primary btn-sm">Update</button>
                                <button href="?del_plant_Id=<?= $row['plant_id']; ?>" name="delete_plant" class="btn btn-custon-four btn-danger btn-sm" onclick="return confirm('Are you sure??')">Delete</button>
<!--                                <input class="button-default cart-btn" type="submit">-->
                            </div>

                        </form>
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </div>
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'tamp/scriptlink.php';?>
</body>

</html>
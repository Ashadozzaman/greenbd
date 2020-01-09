<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
<!-- ##### Right Side Cart Area ##### -->

<?php
    if (!isset($_GET['package_id'])) {
        echo "<script>window:location = 'package_page.php';</script>";
    }else{
        $pkg_id = $_GET['package_id'];
        $package_book_id = $_GET['package_book_id'];
        $cus_id = $_GET['cus_id'];
    }
?>
<?php
if (isset($_GET['orderpageid'])){
    $id = $_GET['orderpageid'];
    $cnfproduct = $cart->cnfProductbyid($id);
}
?>
<?php include 'tamp/carts.php'; ?>
<!-- ##### Right Side Cart End ##### -->



<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg); margin-top: 60px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Package Plants</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <a href="package_page.php">
            <button type="button"  class="btn btn-info">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>Back
            </button>
        </a>
        <div class="row">
            <?php
            $get_plants_by_package = $pkg->get_plants_by_package($package_book_id,$pkg_id,$cus_id);
            if($get_plants_by_package){
            while ($row = $get_plants_by_package->fetch_assoc()){ ?>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-wrapper">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img style="width: 280px;height: 250px" src="admin/<?php echo $row['image']; ?>" alt="">
                        <!-- Hover Thumb -->
                        <img class="hover-img" src="admin/<?php echo $result['image']; ?>" alt="">

                    </div>

                    <!-- Product Description -->
                    <div class="product-description">
                        <span>Package Name: <?php echo $row['pkg_name']; ?></span>
                        <a href="#">
                            <h6><?php echo $row['plant_name']; ?>
                        </a>
                        <p>Quantity: <?php echo $row['quantity']; ?></p><br>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->


<?php include 'tamp/footer.php'; ?>
</body>

</html>
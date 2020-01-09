<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
<?php include_once 'tamp/carts.php'; ?>
<!-- ##### Right Side Cart Area ##### -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-cart'])) {
        $plant_id = $_POST['plant_id'];
        $quantity = $_POST['quantity'];
        $duration = $_POST['duration'];
        $addtocart = $pkgCart->cartadd($quantity,$plant_id,$duration);

    }

?>
<?php include 'tamp/carts.php'; ?>
<!-- ##### Right Side Cart End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Plants</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->
<?php if (isset($addtocart)){echo $addtocart;} ?>
<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
                <div class="shop_grid_product_area">
                    <!-- pagination start-->

                    <?php
                    $per_page = 6;
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    }else{
                        $page = 1;
                    }
                    $start_from = ($page-1) * $per_page;
                    ?>
                    <!-- pagination end-->
                    <div class="row">
                        <?php
                        $getPlants = $pkgCart->getAllPlantsWithPagination();
                        if ($getPlants) {
                        while ($result = $getPlants->fetch_assoc()) {
                            ?>
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img style="width: 280px;height: 250px" src="admin/<?php echo $result['image']; ?>" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="admin/<?php echo $result['image']; ?>" alt="">

                                        <!-- Product Badge -->
<!--                                        <div class="product-badge offer-badge">-->
<!--                                            <span>-30%</span>-->
<!--                                        </div>-->
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <a href="#">
                                            <h6 style="height: 25px;"><?php echo $result['plant_name']; ?></h6>
                                        </a>
                                        <p class="product-price"> Daily  <?php echo $result['rate']; ?> ৳ Per Piece  </p>
                                        <form action="" method="post" >
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="hidden" name="plant_id" value="<?= $result['plant_id'] ?>" >
                                                        <input style="margin-left: -15px; width: 125%" class="form-control" type="number" min="1" name="quantity" placeholder="Quantity">
                                                    </div>
                                                    <?php
                                                        $getDuration = $pkgCart->getDuration();
                                                        if (isset($getDuration)){
                                                    ?>
                                                    <div class="col-sm-6">
                                                        <input style="margin-left: -15px; width: 130%" class="form-control" value="<?= $getDuration ?>" type="number" min="1" name="duration" placeholder="Days">
                                                    </div><br>
                                                    <?php }else{ ?>
                                                        <div class="col-sm-6">
                                                            <input style="margin-left: -15px; width: 130%" class="form-control" type="number" min="1" name="duration" placeholder="Days">
                                                        </div><br>

                                                    <?php } ?>
                                                    <button style="margin-top: 10px;width: 100%;" class="btn" name="add-cart">Add Cart</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php  } ?>

                    </div>
                </div>
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination mt-50 mb-70">
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                        <?php
                        $per_page = 9;
                        $pgproduct = $pkgCart->getAllPlants();
                        $total_row = $pgproduct->num_rows;
                        $total_page = ceil($total_row/$per_page);
                        for ($i=1; $i<=$total_page  ; $i++) { ?>
                            <li><a class="page-link" href="customizePackage.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
                <?php } ?>
            </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->

<?php include 'tamp/footer.php'; ?>
</body>

</html>
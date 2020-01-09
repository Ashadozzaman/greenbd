<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
    <!-- ##### Right Side Cart Area ##### -->
<?php include 'tamp/carts.php'; ?>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Welcome Area Start ##### -->

        <section class="welcome_area bg-img background-overlay" style="background-image: url(img/product-img/ray.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-content">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <!-- ##### Welcome Area End ##### -->

    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/package.jpg);">
                        <div class="catagory-content">
                            <a href="customizePackage.php">Customize Package</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/shop.jpg);">
                        <div class="catagory-content">
                            <a href="shop.php">Shoes</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/plants.jpg);">
                        <div class="catagory-content">
                            <a href="packages.php">Packages</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="cta-area">
        <div class="container">
            <?php
            $getNewproduct = $pro->discount_product();
            if ($getNewproduct) {
            while ($result = $getNewproduct->fetch_assoc()) {
            ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="cta-content bg-img background-overlay" style="background-image: url(admin/<?php  echo $result['image']; ?>);">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="margin: 184px 150px;" class="cta--text">
                            <h3>-<?= $result['discount'] ?>%</h3>
                            <h1><?php echo $result['pro_name'];?></h1>
                            <a href="product_details.php?pro_id=<?php echo $result['pro_id']; ?>&cat_id=<?php echo $result['cat_id']; ?>" class="btn essence-btn">Buy Now</a>
                        </div>
                    </div>
                </div>

            <?php }}?>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>New Products</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                    <?php
                        $getNewproduct = $pro->Newproduct();
                        if ($getNewproduct) {
                           while ($result = $getNewproduct->fetch_assoc()) {
                        ?>   

                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img style="width:255px; height:348px;"; src="admin/<?php  echo $result['image']; ?>" alt="">
                                <!-- Hover Thumb -->
                               <!--  <img class="hover-img" src="img/product-img/product-5.jpg" alt=""> -->

                                <!-- Product Badge -->
                                <?php if ($result['discount'] > 0){?>
                                    <div class="product-badge offer-badge">
                                        <span>-<?= $result['discount'] ?>%</span>
                                    </div>
                                <?php }else{ ?>
                                    <div class="product-badge new-badge">
                                        <span>New</span>
                                    </div>
                                <?php }?>

                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span><?php echo $result['brand_name'];?></span>
                                <a href="product_details.php">
                                    <h6><?php echo $result['pro_name'];?></h6>
                                </a>
                                <?php if ($result['discount'] > 0){?>
                                    <p class="product-price"><span class="old-price">৳ <?php echo $result['price']; ?></span>
                                        ৳<?php echo ($result['price']-($result['price']*($result['discount']/100))); ?></p>
                                <?php }else{ ?>
                                    <p class="product-price">
                                        ৳<?php echo $result['price']; ?></p>
                                <?php } ?>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="product_details.php?pro_id=<?php echo $result['pro_id']; ?>&cat_id=<?php echo $result['cat_id']; ?>" class="btn essence-btn">Product Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- ##### New Arrivals Area Start ##### -->
        <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Feature Products</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Feature Product ##### -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        <?php
                            $getproduct = $pro->readproduct();
                            if ($getproduct) {
                               while ($result = $getproduct->fetch_assoc()) {
                               ?>
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img style="width:255px; height:348px;"; src="admin/<?php  echo $result['image']; ?>" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" style="width:255px; height:348px;"; src="admin/<?php  echo $result['image']; ?>" alt="">
                                <!-- Product Badge -->
                                <?php if ($result['discount'] > 0){?>
                                    <div class="product-badge offer-badge">
                                        <span>-<?= $result['discount'] ?>%</span>
                                    </div>
                                <?php } ?>
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>topshop</span>
                                <a href="single-product-details.html">
                                    <h6><?php echo $result['pro_name'];?></h6>
                                </a>
                                <?php if ($result['discount'] > 0){?>
                                    <p class="product-price"><span class="old-price">৳ <?php echo $result['price']; ?></span>
                                        ৳<?php echo ($result['price']-($result['price']*($result['discount']/100))); ?></p>
                                <?php }else{ ?>
                                    <p class="product-price">
                                        ৳<?php echo $result['price']; ?></p>
                                <?php } ?>
                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">
                                        <a href="product_details.php?pro_id=<?php echo $result['pro_id']; ?>&cat_id=<?php echo $result['cat_id']; ?>" class="btn essence-btn">Product Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->

 <?php include 'tamp/footer.php'; ?>

</body>

</html>
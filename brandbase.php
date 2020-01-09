<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
    <!-- ##### Right Side Cart Area ##### -->
  <?php include 'tamp/carts.php'; ?>
    <!-- ##### Right Side Cart End ##### -->
<?php
    if(!isset($_GET['bnd_id']) && $_GET['bnd_id'] == 'NULL'){
        echo "<script>window:location = 'shop.php'; </script>";
    }else{
       $id = $_GET['bnd_id'];
    }    

?>

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>dresses</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                   <?php include 'tamp/sidebar.php'; ?>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>186</span> products found</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                        <?php
                            $pro = new Brand();
                            $getproductbyB = $pro->getproductbyB($id);
                            if ($getproductbyB) {
                               while ($result = $getproductbyB->fetch_assoc()) {
                        ?>
                            <!-- Single Product -->
                                   <div class="col-12 col-sm-6 col-lg-4">
                                       <div class="single-product-wrapper">
                                           <!-- Product Image -->
                                           <div class="product-img">
                                               <img src="admin/<?php echo $result['image']; ?>" alt="">
                                               <!-- Hover Thumb -->
                                               <img class="hover-img" src="admin/<?php echo $result['image']; ?>" alt="">

                                               <!-- Product Badge -->
                                               <?php if ($result['discount'] > 0){?>
                                                   <div class="product-badge offer-badge">
                                                       <span>-<?= $result['discount'] ?>%</span>
                                                   </div>
                                               <?php } ?>
                                               <!-- Favourite -->
                                               <div class="product-favourite">
                                                   <a href="#" class="favme fa fa-heart"><button></button></a>
                                               </div>
                                           </div>

                                           <!-- Product Description -->
                                           <div class="product-description">
                                               <span><?php echo $result['brand_name']; ?></span>
                                               <a href="single-product-details.html">
                                                   <h6><?php echo $result['pro_name']; ?></h6>
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
                                                       <a href="product_details.php?pro_id=<?php echo $result['pro_id']; ?>" class="btn essence-btn">Product Details</a>
                                                   </div>
                                               </div>
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
                                $pgproduct = $pro->getallproBNDbase($id);
                                $total_row = $pgproduct->num_rows;
                                $total_page = ceil($total_row/$per_page);
                            for ($i=1; $i<=$total_page  ; $i++) { ?>
                                    <li><a class="page-link" href="shop.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                                <?php } ?>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

   <?php include 'tamp/footer.php'; ?>
</body>

</html>
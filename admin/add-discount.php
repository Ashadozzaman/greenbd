<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/product.php';?>
<?php
    if (!isset($_GET['discount']) || $_GET['discount'] == "NULL"){
        echo" <script>window.location = 'productlist.php';</script>";
    }else{
        $id = $_GET['discount'];
    }
$pro = new Product();
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['add-submit'])) {
    $product_id = $_POST['product_id'];
    $pro_name = $_POST['pro_name'];
    $discount = $_POST['discount'];
    $duration = $_POST['duration'];
    $ProCheck = $pro->DiscountAdd($product_id,$discount,$duration,$pro_name);

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
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Discount Add</a></li>
                        </ul>
                        <?php
                        if (isset($ProCheck) ){
                            echo $ProCheck;
                        }

                        ?>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row" style="height: 350px;">
                                    <form action="" method="post" id="demo1-upload">
                                        <div class="row" class="form">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <?php
                                                    $pro = new Product();
                                                    $allProduct = $pro->getproductbyDiscount($id);
                                                    if ($allProduct) {
                                                    while ($result = $allProduct->fetch_assoc()) {
                                                    ?>
                                                    <select class="form-control" id="select" name="product_id">

                                                                <option value="<?php echo $result['pro_id']; ?>" class="form-control"><?php echo $result['pro_name']; ?></option>

                                                    </select>
                                                        <input type="hidden" name="pro_name" value="<?= $result['pro_name'];?>">
                                                    <?php }} ?>
                                                </div>
                                                <div class="form-group">
                                                    <input name="discount" type="number" class="form-control" placeholder="Percentage" min="1" max="100">
                                                </div>
                                                <div class="form-group">
                                                    <input name="duration" type="number" class="form-control" placeholder="Duration" min="1">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="add-submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <a href="productlist.php"><button  class="btn">Cancel</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
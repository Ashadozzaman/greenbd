<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
    $pro = new Product();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo '<script>alert('.$_POST['stock'].')</script>';
        $ins_pro = $pro->pro_ins($_POST,$_FILES);
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
                                <li class="active"><a href="#description">Add New Product</a></li>
                                <?php
                                    if (isset($ins_pro)) {
                                        echo $ins_pro;
                                    }

                                ?>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    <form action="" method="POST" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="pro_name" type="text" class="form-control" placeholder="Product Name">
                                                                </div>
                                                                <div class="form-group">
                                                                <select class="form-control" id="select" name="cat_id">
                                                                 <option class="form-control">Select Category</option>
                                                     <?php
                                                        $ct = new Category();
                                                        $allcat = $ct->getcategory();
                                                        if ($allcat) {
                                                            while ($result = $allcat->fetch_assoc()) {
                                                               ?>
                                                               <option value="<?php echo $result['cat_id']; ?>" class="form-control"><?php echo $result['cat_name']; ?></option>
                                                         <?php }} ?>
                                                                </select>
                                                                </div>

                                                                <div class="form-group">
                                                                <select class="form-control" id="select" name="brand_id">
                                                                 <option class="form-control">Select Brand</option>
                                                     <?php
                                                        $ct = new Brand();
                                                        $allbnd = $ct->getbrand();
                                                        if ($allbnd) {
                                                            while ($result = $allbnd->fetch_assoc()) {
                                                    ?>
                                                               <option value="<?php echo $result['brand_id']; ?>" class="form-control"><?php echo $result['brand_name']; ?></option>
                                                         <?php }} ?>
                                                                </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="price" type="number" min="1" class="form-control" placeholder="Product Price">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="stock" type="number" min="1" class="form-control" placeholder="Product Stock">
                                                                </div>

                                                                <div class="form-group">
                                                                    <input name="image" type="file" class="form-control" placeholder="Product Stock">
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <textarea name="body" placeholder="Description"></textarea>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                     <select class="form-control" id="select" name="type">
                                                                        <option>Select Type</option>
                                                                        <option value="1">Featured</option>
                                                                        <option value="2">Non-Featured</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Phone">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Confirm Password">
                                                            </div>
                                                            <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
												<div class="row">
													<div class="col-lg-12">
														<div class="devit-card-custom">
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Facebook URL">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Twitter URL">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Google Plus">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Linkedin URL">
															</div>
															<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
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
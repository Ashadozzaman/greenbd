<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/package.php';?>
<?php
$pkg = new Package();
if (!isset($_GET['packageid']) || $_GET['packageid'] == NULL) {
    echo" <script>window.location = 'packageList.php';</script>";
}else{
    $id = $_GET['packageid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $up_package = $pkg->updatePackage($_POST,$_FILES,$id);
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
                            <li class="active"><a href="#description">Update Package</a></li>
                            <?php
                            if (isset($insertpkg)) {
                                echo $insertpkg;
                            }

                            ?>

                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad addcoursepro">
                                                <?php
                                                    $getpackage = $pkg->getpackagebyId($id);
                                                    if ($getpackage){
                                                        while ($row = $getpackage->fetch_assoc()){
                                                ?>
                                                <form action="" method="POST" enctype="multipart/form-data" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="pkg_name" type="text" value="<?php echo $row['pkg_name']; ?>" class="form-control" placeholder="Enter Package Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="plant_quantity" type="text" value="<?php echo $row['plant_quantity']; ?>" class="form-control" placeholder="Enter Quantity Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="Initial_cost" type="number" value="<?php echo $row['Initial_cost']; ?>" min="1000" class="form-control" placeholder="Enter Initial Price">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="monthly_cost" type="number" value="<?php echo $row['monthly_cost']; ?>" min="1000" class="form-control" placeholder="Enter Monthly Price">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="yearly_cost" type="number" value="<?php echo $row['yearly_cost']; ?>" min="1000" class="form-control" placeholder="Enter Yearly Price">
                                                            </div>

                                                            <div class="form-group">
                                                                <input name="image" type="file" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <input name="pkg_service" class="form-control" value="<?php echo $row['pkg_service']; ?>" type="text" placeholder="Enter Packes Service">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea class="form-control"  name="pkg_description" placeholder="Enter Package Description"><?php echo $row['pkg_description']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <?php } } ?>
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
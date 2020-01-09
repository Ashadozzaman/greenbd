<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/package.php';?>
<?php

$pkg = new Package();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $add_tree = $pkg->add_plants($_POST,$_FILES);

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
                            <li class="active"><a href="#description">Add Plant</a></li>
                        </ul>
                        <?php
                        if (isset($add_tree) ){
                            echo $add_tree;
                        }

                        ?>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row" style="height: 350px;">
                                    <form action="" method="post" id="demo1-upload" enctype="multipart/form-data">
                                        <div class="row" class="form">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <input name="plant_name" type="text" class="form-control" placeholder="Enter Plant Name">
                                                </div>
                                                <div class="form-group">
                                                    <input name="stock" type="number" min="1" class="form-control" placeholder="Enter Quantity Name">
                                                </div>
                                                <div class="form-group">
                                                    <input name="rate" type="number" min="1" class="form-control" placeholder="Enter Rate for per rent">
                                                </div>
                                                <div class="form-group">
                                                    <input  type="file" name="image" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light float-right">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                        <p>Copyright © 2018. Green Bangladesh <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'tamp/scriptlink.php';?>
</body>

</html>
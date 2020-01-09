<?php
session_start();
if (!isset($_SESSION['adminlogin']) || $_SESSION['adminlogin'] != true){
    header('location:login.php');
}
?>

<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/package.php';?>
<?php include_once '../helpers/format.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/Customer.php';?>
<?php include_once '../classes/cart.php';?>
<?php
    $pro = new Product();
    $total_product = $pro->count_total_product();
    $total_plants = $pro->count_total_plants();
    $total_customer = $pro->count_total_customer();
    $total_running_package = $pro->total_running_package();
    $total_running_c_package = $pro->total_running_c_package();
    $total_subscriber = $pro->total_subscriber();
    $total_selling_cost = $pro->total_selling_cost();

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

        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Total Products</h5>
                                <h2><span class="counter"><?php
                                        if (isset($total_product)){
                                            echo $total_product;
                                        }?></span></h2>
                                <div class="progress m-b-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Total Plants</h5>
                                <h2><span class="counter"><?php echo $total_plants;?></span></h2>
                                <div class="progress m-b-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Total Customer</h5>
                                <h2><span class="counter"><?php echo $total_customer;?></span></h2>
                                <div class="progress m-b-0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>Total Running Fixed Packages</h5>
                                <h2><span class="counter"><?php
                                        if (isset($total_running_package)){
                                            echo $total_running_package;
                                        }?></span></h2>
                                <div class="progress m-b-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>greenbd.com</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #006DF0;"></i>Product</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #933EC5;"></i>Package</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Customize Package</h5>
                                </li>
                            </ul>
                            <div id="extra-area-chart" style="height: 356px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Running Customize Packages</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-success">
                                        <?php
                                        if (isset($total_running_c_package)){
                                            echo $total_running_c_package;
                                        }
                                        ?></span></li>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Subscriber</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-purple">
                                        <?php
                                        if (isset($total_subscriber)){
                                            echo $total_subscriber;
                                        }
                                        ?></span></li>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Selling Price</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info">
                                        <?php
                                        if (isset($total_selling_cost)){
                                            echo $total_selling_cost;
                                        }
                                        ?>৳</span></li>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Bounce Rate</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter">18</span>%</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php include 'tamp/scriptlink.php';?>
</body>

</html>
<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include_once '../helpers/format.php';?>
<?php include_once '../classes/packageCart.php';?>
<?php
if (!isset($_GET['customize_address_id'])) {
    echo "<script>window:location = 'customize-package.php';</script>";
}else{
    $id    = $_GET['customize_address_id'];
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
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <h4>Customize Package Address</h4>
                        <a href="customize-package.php"><button class="btn btn-primary btn-arrow-left"><i class="fa fa-arrow-left"></i>Back</button></a>
                        <div class="asset-inner">
                            <?php
                            $fm = new format();
                            $pkgCat = new PackageCart();
                            $getPackage_address = $pkgCat->getPackageAddressByid($id);
                            if($getPackage_address){
                                while ($result =  $getPackage_address->fetch_assoc()) { ?>
                                    <table>
                                        <tr>
                                            <td>Customer Name</td>
                                            <td><?php echo $result['name'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Customer Address</td>
                                            <td><?php echo $result['address'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Postcode</td>
                                            <td><?php echo $result['postcode'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Town</td>
                                            <td><?php echo $result['town'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><?php echo $result['cname'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone No.</td>
                                            <td><?php echo $result['phone'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Email Address</td>
                                            <td><?php echo $result['email'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Order Date</td>
                                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                                        </tr>
                                    </table>
                                <?php } } ?>
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

<!-- jquery
    ============================================ -->
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="js/metisMenu/metisMenu.min.js"></script>
<script src="js/metisMenu/metisMenu-active.js"></script>
<!-- morrisjs JS
    ============================================ -->
<script src="js/sparkline/jquery.sparkline.min.js"></script>
<script src="js/sparkline/jquery.charts-sparkline.js"></script>
<!-- calendar JS
    ============================================ -->
<script src="js/calendar/moment.min.js"></script>
<script src="js/calendar/fullcalendar.min.js"></script>
<script src="js/calendar/fullcalendar-active.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="js/main.js"></script>
<!-- tawk chat JS
    ============================================ -->
<script src="js/tawk-chat.js"></script>
</body>

</html>
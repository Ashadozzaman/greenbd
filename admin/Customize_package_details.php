<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/Customer.php';?>
<?php include_once '../helpers/format.php';?>
<?php include_once '../classes/packageCart.php';?>
<?php
$pkgCart = new PackageCart();
$fm  = new Format();
?>
<?php
if (isset($_GET['package_id'])) {
    $id    = $_GET['package_id'];
//    $detailsPackage = $pkgCart->packageDetailsByID($id);
}

?>
<?php
if (isset($_GET['delpro'])){
    $id = $_GET['delpro'];
    $delproduct = $pro->delProductbyid($id);
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

    <?php
    if (isset($shift)) {
        echo $shift;
    }
    ?>
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <h3>Customize Package Details</h3>
                        <a href="customize-package.php"><button class="btn btn-primary btn-arrow-left"><i class="fa fa-arrow-left"></i>Back</button></a>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="sparkline13-list">
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div id="toolbar">
                                            <select class="form-control dt-tb">
                                                <option value="">Export Basic</option>
                                                <option value="all">Export All</option>
                                                <option value="selected">Export Selected</option>
                                            </select>
                                        </div>
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                               data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                            <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">No</th>
                                                <th data-field="date" data-editable="true">Product Name</th>
                                                <th data-field="price" data-editable="true">Price</th>
                                                <th data-field="name" data-editable="true">Quantity</th>
                                                <th data-field="duration" data-editable="true">Duration</th>
                                                <th data-field="total-price" data-editable="true">Total Price</th>
                                                <th>Image</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $pkgCart = new PackageCart();
                                            $fm = new Format();
                                            if (!isset($_GET['package_id']) || $_GET['package_id'] == 'NULL'){
                                                echo "<script>window.location = 'customize-package.php ';</script>";
                                            }else{
                                                $id = $_GET['package_id'];
                                            }
                                            $getPackage = $pkgCart->packageDetailsByID($id);
                                            $i = 0;
                                            if ($getPackage) {
                                                while ($result = $getPackage->fetch_assoc()) {
                                                    $i++;
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $result['plant_name']; ?></td>
                                                        <td>৳<?php echo $result['price']; ?></td>
                                                        <td><?php echo $result['quantity']; ?> Piece</td>
                                                        <td><?php echo $result['duration']; ?> Days</td>
                                                        <td>৳<?php echo $result['total_price']; ?></td>
                                                        <td><img src="<?php echo $result['image']; ?>" style="height:40px; width:50px;"></td>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
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
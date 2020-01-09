<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/package.php';?>
<?php include_once '../helpers/format.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/Customer.php';?>
<?php include_once '../classes/cart.php';?>
<?php
$pkg = new Package();
$fm  = new Format();
if (isset($_GET['plant_id'])) {
    $id = $_GET['plant_id'];
    $del_plant = $pkg->del_plant($id);
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
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#Pending"> All Plants List</a></li>
                            <?php
                                if (isset($del_plant)){
                                    echo $del_plant;
                                }
                            ?>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="Pending">
                                <div class="row">
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
                                                        <th data-field="name">Plants Name</th>
                                                        <th>Plant Stock</th>
                                                        <th>Plant Rate</th>
                                                        <th data-field="date" data-editable="true">Date</th>
                                                        <th>Plant Image</th>
                                                        <th data-field="action">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_plants = $pkg->get_all_plants();
                                                    $i = 0;
                                                    if ($get_plants) {
                                                        while ($result = $get_plants->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['plant_name']; ?></td>
                                                                <td><?php echo $result['stock']; ?></td>
                                                                <td><?php echo $result['rate']; ?></td>
                                                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                                <td><img style="height:100px;width:100px; " src="<?php echo $result['image']; ?>"></td>


                                                                <td>
                                                                    <a  href="edit-plant.php?plant_id=<?php echo $result['plant_id']; ?>">
                                                                        <button type="button" class="btn btn-primary">
                                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                        </button>
                                                                    </a>
                                                                    <a onclick="return confirm('Are you sure delete this')" href="?plant_id=<?php echo $result['plant_id']; ?>">
                                                                        <button type="button" class="btn btn-primary">
                                                                            <i class="fa fa-times edu-danger-error" aria-hidden="true"></i>
                                                                        </button>
                                                                    </a>
                                                                </td>
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
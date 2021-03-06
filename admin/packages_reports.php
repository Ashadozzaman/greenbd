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
$pro  = new Product();
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

    <!--    --><?php //if (isset($confirm_id)){echo $confirm_id;}?>
    <!-- Single pro tab review Start-->
    <!--    --><?php //if (isset($startPackage)){echo $startPackage;} ?>

    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#top"> Top Rental Packages</a></li>
                            <li><a href="#total_year"> Overall Rent per Year</a></li>
                            <li><a href="#Monthly_sale">Monthly Rent</a></li>
                            <li><a href="#unsold">Unsold Packages</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="top">
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
                                                        <th data-field="id">ID</th>
                                                        <th data-field="name" data-editable="true">Package Name</th>
                                                        <th data-field="task" >Image</th>
                                                        <th>Total Quantity</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $getpro = $pkg->get_top_rental_package();
                                                    $i = 0;
                                                    if ($getpro) {
                                                        while ($result = $getpro->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['pkg_name']; ?></td>
                                                                <td><img src="<?php echo $result['image']; ?>" style="height:40px; width:50px;" />
                                                                </td>
                                                                <td><?php echo $result['total_quantity']; ?></td>
                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="total_year">
                                <div class="row">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="id">ID</th>
                                                        <th>Year</th>
                                                        <th>Total Quantity</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $getpro = $pkg->get_total_year_rent_product();
                                                    $i = 0;
                                                    if ($getpro) {
                                                        while ($result = $getpro->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td ><?php echo $result['year']; ?></td>
                                                                <td><?php echo $result['total_quantity']; ?></td>

                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="Monthly_sale">
                                <div class="row">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="id">ID</th>
                                                        <th>Month</th>
                                                        <th>Year</th>
                                                        <th>Total Quantity</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $getpro = $pkg->get_total_month_rent_product();
                                                    $i = 0;
                                                    if ($getpro) {
                                                        while ($result = $getpro->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['month']; ?></td>
                                                                <td><?php echo $result['year']; ?></td>
                                                                <td><?php echo $result['total_quantity']; ?></td>
                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="unsold">
                                <div class="row">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="id">ID</th>
                                                        <th data-field="name" data-editable="true">Package Name</th>
                                                        <th data-field="task" >Image</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $getpro = $pkg->get_unsold_packages();
                                                    $i = 0;
                                                    if ($getpro) {
                                                        while ($result = $getpro->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['pkg_name']; ?></td>
                                                                <td><img src="<?php echo $result['image']; ?>" style="height:40px; width:50px;" />
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
                        <p>Copyright © 2019. Green Bangladesh <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include 'tamp/scriptlink.php';?>
</body>

</html>
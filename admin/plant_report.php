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
                            <li class="active"><a href="#top"> Top Rental Plants</a></li>
                            <li><a href="#year">Yearly Rental Plants </a></li>
                            <li><a href="#month"> Monthly Rental Plants</a></li>
                            <li><a href="#total_year"> Total Year Rent</a></li>
                            <li><a href="#Monthly_sale">Monthly Rent</a></li>
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
                                                        <th data-field="name" data-editable="true">Plants Name</th>
                                                        <th data-field="task" >Image</th>
                                                        <th>Total Quantity</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $getpro = $pro->get_top_rental_plant();
                                                    $i = 0;
                                                    if ($getpro) {
                                                        while ($result = $getpro->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['plant_name']; ?></td>
                                                                <td><img src="<?php echo $result['image']; ?>" style="height:40px; width:50px;" />
                                                                <td><?php echo $result['total_quantity']; ?></td>
                                                                <td><?php echo $result['total_amount']; ?></td>

                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="year">
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
                                                        <th>Year</th>
                                                        <th data-field="name" data-editable="true">Plant Name</th>
                                                        <th data-field="task" >Image</th>
                                                        <th>Total Quantity</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $getpro = $pro->get_yearly_rental_plant();
                                                    $i = 0;
                                                    if ($getpro) {
                                                        while ($result = $getpro->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td style="background-color: #061f47; color: #ffffff;"><?php echo $result['year']; ?></td>
                                                                <td><?php echo $result['plant_name']; ?></td>
                                                                <td><img src="<?php echo $result['image']; ?>" style="height:40px; width:50px;" />
                                                                <td style="background: gray;color: #fff"><?php echo $result['total_quantity']; ?></td>
                                                                <td><?php echo $result['total_amount']; ?></td>

                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="month">
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
                                                        <th data-field="name" data-editable="true">Plnat Name</th>
                                                        <th data-field="task" >Image</th>
                                                        <th>Total Quantity</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $getpro = $pro->get_monthly_rental_plant();
                                                    $i = 0;
                                                    if ($getpro) {
                                                        while ($result = $getpro->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td style="background-color: #061f47; color: #ffffff;"><?php echo $result['month']; ?></td>
                                                                <td style="background-color: #061f47; color: #ffffff;"><?php echo $result['year']; ?></td>
                                                                <td><?php echo $result['plant_name']; ?></td>
                                                                <td><img src="<?php echo $result['image']; ?>" style="height:40px; width:50px;" />
                                                                </td>
                                                                <td style="background: gray;color: #fff"><?php echo $result['total_quantity']; ?></td>
                                                                <td><?php echo $result['total_amount']; ?></td>

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
                                                        <th>Total Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $getpro = $pro->get_total_yearly_rental_plant();
                                                    $i = 0;
                                                    if ($getpro) {
                                                        while ($result = $getpro->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td ><?php echo $result['year']; ?></td>
                                                                <td style="background: gray;color: #fff"><?php echo $result['total_quantity']; ?></td>
                                                                <td><?php echo $result['total_amount']; ?> ৳</td>

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
                                                        <th>Total Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $getpro = $pro->get_total_monthly_rental_plant();
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
                                                                </td>
                                                                <td style="background: gray;color: #fff"><?php echo $result['total_quantity']; ?></td>
                                                                <td><?php echo $result['total_amount']; ?> ৳</td>

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
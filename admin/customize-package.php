<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/package.php';?>
<?php include '../classes/packageCart.php';?>
<?php include_once '../helpers/format.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/Customer.php';?>
<?php include_once '../classes/cart.php';?>
<?php
$pkg = new Package();
$pkgCart = new PackageCart();
$fm  = new Format();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm'])){
    $confirm_id = $_POST['confirm_id'];
    $startPackage = $pkgCart->ConfirmPackage($confirm_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start'])){
    $packageOrderId = $_POST['confirm_id'];
    $duration = $_POST['duration'];
    $startPackage = $pkgCart->startPackage($packageOrderId,$duration);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['renew_customize_package'])){
    $cus_pkg_id = $_POST['cus_pkg_id'];
    $duration = $_POST['duration'];
    $renew_package = $pkgCart->renew_package($duration,$cus_pkg_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['CompletePackage'])){
    $cus_pkg_id = $_POST['cus_pkg_id'];
    $cus_id = $_POST['cus_id'];
    $Complete_package = $pkgCart->Complete_package($cus_pkg_id,$cus_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Cancel'])){
    $cus_pkg_id = $_POST['cus_pkg_id'];
    $cus_id = $_POST['cus_id'];
    $Complete_package = $pkgCart->Cancel_package($cus_pkg_id,$cus_id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ok'])){
    $cus_pkg_id = $_POST['cus_pkg_id'];
    $renew_package = $pkgCart->renew_package_confirm($cus_pkg_id);
}

?>
<?php
if (isset($_GET['confirm_id'])) {
    $id    = $_GET['confirm_id'];
    $confirm_id = $pkg->confirm_package($id);
}

?>
<?php
if (isset($_GET['delpro'])){
    $id = $_GET['delpro'];
    $delproduct = $pro->delProductbyid($id);
}

?>
<?php
if (isset($_GET['Confirm_shifted'])){
    $id = $_GET['Confirm_shifted'];
    $cnfproduct = $cart->cnfProductbyid($id);
}
?>
<?php
if (isset($_GET['delorderid'])){
    $id = $_GET['delorderid'];
    $delorderid = $cart->delorder($id);
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

    <!--    --><?php //if (isset($confirm_id)){echo $confirm_id;}?>
    <!-- Single pro tab review Start-->
    <!--    --><?php //if (isset($startPackage)){echo $startPackage;} ?>

    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#Pending"> Pending Package List</a></li>
                            <li><a href="#Confirm"> Confirm Package List</a></li>
                            <li><a href="#Running"> Running Package</a></li>
                            <li><a href="#expire"> Expiry Package</a></li>
                            <li><a href="#renew"> Renew Package</a></li>
                            <li><a href="#complete"> Complete Package</a></li>
                        </ul>
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
                                                        <th data-field="date" data-editable="true">Date</th>
                                                        <th data-field="Duration">Duration</th>
                                                        <th data-field="price">Total Price</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                        <th data-field="status">Status</th>
                                                        <th data-field="action">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkgCart->pending_customize_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                                <td><?php echo $result['duration']; ?> Days</td>
                                                                <td><?php echo $result['total_price']; ?> </td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="Customize_package_details.php?package_id=<?php echo $result['cus_pkg_id']; ?>">View Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="customize-package-address.php?customize_address_id=<?php echo $result['cus_pkg_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>

                                                                <td>
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="confirm_id" value="<?php echo $result['cus_pkg_id'];?>" >
                                                                        <button class="btn btn-custon-four btn-warning" name="confirm">Confirm</button>

                                                                    </form>
                                                                </td>


                                                                <td><a onclick="return confirm('Are you sure delete this')" href="?del_package=<?php echo $result['package_book_id']; ?>">
                                                                        <button type="button" class="btn btn-primary"><i class="fa fa-times edu-danger-error" aria-hidden="true"></i></button></a>
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
                            <div class="product-tab-list tab-pane fade" id="Confirm">
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
                                                        <th data-field="date" data-editable="true">Date</th>
                                                        <th data-field="Duration">Duration</th>
                                                        <th data-field="price">Total Price</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                        <th data-field="status">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkgCart->confirm_customize_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                                <td><?php echo $result['duration']; ?> Days</td>
                                                                <td><?php echo $result['total_price']; ?> </td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="Customize_package_details.php?package_id=<?php echo $result['cus_pkg_id']; ?>">View Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="customize-package-address.php?customize_address_id=<?php echo $result['cus_pkg_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>

                                                                <td>
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="confirm_id" value="<?php echo $result['cus_pkg_id'];?>" >
                                                                        <input type="hidden" name="duration" value="<?php echo $result['duration'];?>" >
                                                                        <button class="btn btn-custon-four btn-warning" name="start">Start Package</button>

                                                                    </form>
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
                            <div class="product-tab-list tab-pane fade" id="Running">
                                <div class="row">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="id">No</th>
                                                        <th data-field="name">Duration</th>
                                                        <th data-field="price">Total Price</th>
                                                        <th data-field="date1" >Start Date</th>
                                                        <th data-field="date2" >End Date</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                        <th>Remaining Day</th>
                                                        <th data-field="action">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkgCart->get_running_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['duration']; ?></td>
                                                                <td><?php echo $result['total_price']; ?></td>
                                                                <td><?php echo $result['startDate']; ?></td>
                                                                <td><?php echo $result['endDate']; ?></td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="Customize_package_details.php?package_id=<?php echo $result['cus_pkg_id']; ?>">View Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="customize-package-address.php?customize_address_id=<?php echo $result['cus_pkg_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>
                                                                <?php
                                                                if ($result['remaining_days'] < 10 ){  ?>
                                                                    <td>
                                                                        <label style="background:red;height:30px;width:75px;   "><?= $result['remaining_days'] ?> Days</label>

                                                                    </td>
                                                                <?php } else{ ?>
                                                                    <td>
                                                                        <label style="background:gray;height:30px;width:75px;   "><?= $result['remaining_days'] ?> Days</label>

                                                                    </td>
                                                                <?php } ?>
                                                                <?php if ($result['remaining_days'] > 3){ ?>
                                                                    <td>
                                                                        <button type="button" disabled="disabled" class="btn btn-primary">Notified</i></button>
                                                                    </td>
                                                                <?php }else{ ?>

                                                                    <td>
                                                                        <button type="button" name="notified" class="btn btn-primary">Notified</i></button>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="renew">
                                <div class="row">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="id">No</th>
                                                        <th data-field="name">Duration</th>
                                                        <th data-field="name">Total Price</th>
                                                        <th data-field="date1" >Start Date</th>
                                                        <th data-field="date2" >End Date</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                        <th>Remaining Day</th>
                                                        <th data-field="action">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkgCart->get_renew_customize_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['duration']; ?></td>
                                                                <td><?php echo $result['total_price']; ?></td>
                                                                <td><?php echo $result['startDate']; ?></td>
                                                                <td><?php echo $result['endDate']; ?></td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="Customize_package_details.php?package_id=<?php echo $result['cus_pkg_id']; ?>">View Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="customize-package-address.php?customize_address_id=<?php echo $result['cus_pkg_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>
                                                                <?php
                                                                if ($result['remaining_days'] < 10 ){  ?>
                                                                    <td>
                                                                        <label style="background:red;height:30px;width:75px;   "><?= $result['remaining_days'] ?> Days</label>

                                                                    </td>
                                                                <?php } else{ ?>
                                                                    <td>
                                                                        <label style="background:gray;height:30px;width:75px;   "><?= $result['remaining_days'] ?> Days</label>

                                                                    </td>
                                                                <?php } ?>
                                                                <td>
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="cus_pkg_id" value="<?php echo $result['cus_pkg_id']; ?>">
                                                                        <button name="ok" class="btn btn-primary">OK</button>

                                                                    </form>
                                                                    <form action="" method="post">
                                                                        <?php if (isset($Complete_package)){echo $Complete_package;} ?>
                                                                        <input type="hidden" name="cus_pkg_id" value="<?php echo $result['cus_pkg_id'];?>">
                                                                        <input type="hidden" name="cus_id" value="<?php echo $result['cus_id'];?>">
                                                                        <button name="Cancel" class="btn btn-danger">Cancel</i></button>
                                                                    </form>

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
                            <div class="product-tab-list tab-pane fade" id="expire">
                                <div class="row">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="id">No</th>
                                                        <th data-field="name">Duration</th>
                                                        <th data-field="price">Total Price</th>
                                                        <th data-field="date1" >Start Date</th>
                                                        <th data-field="date2" >End Date</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                        <th>Remaining Day</th>
                                                        <th data-field="action" >Action</th>
                                                        <th data-field="status">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkgCart->get_expire_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['duration']; ?></td>
                                                                <td><?php echo $result['total_price']; ?></td>
                                                                <td><?php echo $result['startDate']; ?></td>
                                                                <td><?php echo $result['endDate']; ?></td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="Customize_package_details.php?package_id=<?php echo $result['cus_pkg_id']; ?>">Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="customize-package-address.php?customize_address_id=<?php echo $result['cus_pkg_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>
                                                                <td style="background-color: <?php echo ($row['remaining_days'] <= 10) ? 'yellow' : '';?>;">
                                                                    <?= -($result['remaining_days']) ?> Days Ago
                                                                </td>

                                                                <td>
                                                                    <?php if (isset($renew_package)){echo $renew_package;} ?>
                                                                    <form action="" method="post">
                                                                        <div class="col-sm-6">
                                                                        <input type="number" name="duration" min="1" placeholder="Days" class="form-control">
                                                                        <input type="hidden" name="cus_pkg_id" value="<?php echo $result['cus_pkg_id'];?>">
                                                                        </div>
                                                                            <button class="btn btn-custon-four btn-warning" name="renew_customize_package">Renew</button>
                                                                    </form>
                                                                </td>
                                                                <?php if (-$result['remaining_days'] < 3){ ?>
                                                                    <td>
                                                                        <button type="button" disabled="disabled" class="btn btn-primary">Complete</i></button>
                                                                    </td>
                                                                <?php }else{ ?>
                                                                    <td>
                                                                        <form action="" method="post">
                                                                            <?php if (isset($Complete_package)){echo $Complete_package;} ?>
                                                                            <input type="hidden" name="cus_pkg_id" value="<?php echo $result['cus_pkg_id'];?>">
                                                                            <input type="hidden" name="cus_id" value="<?php echo $result['cus_id'];?>">
                                                                            <button name="CompletePackage" class="btn btn-danger">Complete</i></button>
                                                                        </form>
                                                                    </td>
                                                                <?php } ?>
                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="complete">
                                <div class="row">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">
                                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <th data-field="id">No</th>
                                                        <th data-field="name">Duration</th>
                                                        <th data-field="price">Total Price</th>
                                                        <th data-field="date1" >Start Date</th>
                                                        <th data-field="date2" >End Date</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkgCart->get_complete_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['duration']; ?></td>
                                                                <td><?php echo $result['total_price']; ?></td>
                                                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                                <td><?php echo $result['endDate']; ?></td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="Customize_package_details.php?package_id=<?php echo $result['cus_pkg_id']; ?>">Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="customize-package-address.php?customize_address_id=<?php echo $result['cus_pkg_id']; ?>">View Address </a>

                                                                    </button>
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
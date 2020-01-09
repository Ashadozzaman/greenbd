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
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['start_package'])){
    $pbId = $_POST['pbId'];
    $duration = $_POST['duration'];
    $startPackage = $pkg->startPackage($pbId,$duration);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['check_reminder'])){
        $pbId = $_POST['pbId'];
        $startPackage = $pkg->reminder_Package($pbId);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['renew_package'])){
        $pbId = $_POST['pbId'];
        $duration = $_POST['duration'];
        $renew_package = $pkg->renew_package($duration,$pbId);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Complete'])){
        $pbId = $_POST['pbId'];
        $pkg_id = $_POST['pkg_id'];
        $cus_id = $_POST['cus_id'];
        $Complete_package = $pkg->Complete_package($pbId,$pkg_id,$cus_id);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel'])){
        $pbId = $_POST['pbId'];
        $pkg_id = $_POST['pkg_id'];
        $cus_id = $_POST['cus_id'];
        $Complete_package = $pkg->cancel_package($pbId,$pkg_id,$cus_id);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ok'])){
        $pbId = $_POST['pbId'];
        $renew_package = $pkg->renew_package_confirm($pbId);
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
                                                        <th data-field="name">Package Name</th>
                                                        <th data-field="Duration">Duration</th>
                                                        <th data-field="date" data-editable="true">Date</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                        <th data-field="status">Status</th>
                                                        <th data-field="action">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkg->get_all_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['pkg_name']; ?></td>
                                                                <td><?php echo $result['duration']; ?> Month</td>
                                                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_details.php?package_id=<?php echo $result['pkg_id']; ?>">View Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_address.php?package_address_id=<?php echo $result['package_book_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>

                                                                <td><a href="?confirm_id=<?php echo $result['package_book_id'];?>" >
                                                                        <button class="btn btn-custon-four btn-warning">Confirm</button>
                                                                    </a>
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
                                                        <th data-field="name">Package Name</th>
                                                        <th>Duration</th>
                                                        <th data-field="date" data-editable="true">Date</th>
                                                        <th>Details</th>
                                                        <th>Address</th>
                                                        <th>Plants</th>
                                                        <th data-field="status">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkg->get_confirm_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['pkg_name']; ?></td>
                                                                <td><?php echo $result['duration']; ?> Month</td>
                                                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_details.php?package_id=<?php echo $result['pkg_id']; ?>">Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_address.php?package_address_id=<?php echo $result['package_book_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>

                                                                <td>
                                                                    <?php
                                                                    $package_book_id =  $result['package_book_id'];
                                                                    $quantity =  $result['plant_quantity'];
                                                                    $get_all_plants_quantity = $pkg->get_Total_plants_each($package_book_id);
                                                                    if ($get_all_plants_quantity == $quantity ){ ?>
                                                                        <button  type="button" class="btn btn-custon-four btn-primary disabled">
                                                                                Add Plants(
                                                                                <?php
                                                                                $package_book_id =  $result['package_book_id'];
                                                                                $get_all_plants_quantity = $pkg->get_Total_plants_each($package_book_id);
                                                                                if (isset($get_all_plants_quantity)){
                                                                                    echo ($get_all_plants_quantity);};
                                                                                ?>
                                                                                )
                                                                        </button>
                                                                    <?php }else{ ?>
                                                                        <button  type="button" class="btn btn-custon-four btn-primary">
                                                                            <a style="color:#fff" href="add_plants_each_package.php?package_book_id=<?php echo $result['package_book_id']; ?>&package_id=<?php echo $result['pkg_id']; ?>&cus_id=<?php echo $result['cus_id']; ?>">
                                                                                Add Plants(
                                                                                <?php
                                                                                $package_book_id =  $result['package_book_id'];
                                                                                $get_all_plants_quantity = $pkg->get_Total_plants_each($package_book_id);
                                                                                if (isset($get_all_plants_quantity)){
                                                                                    echo ($get_all_plants_quantity);};
                                                                                ?>
                                                                                )</a>

                                                                        </button>

                                                                    <?php } ?>
                                                                    <button  type="button" class="btn btn-custon-four btn-success">
                                                                        <a style="color:#fff" href="package_plant_list.php?package_book_id=<?php echo $result['package_book_id']; ?>&package_id=<?php echo $result['pkg_id']; ?>&cus_id=<?php echo $result['cus_id']; ?>">View Plants </a>

                                                                    </button>
                                                                </td>

                                                                <td>
                                                                    <form action="" method="post">
<!--                                                                        <a href="?startPackage=--><?php //echo $result['package_book_id'];?><!--" >-->
                                                                        <?php
                                                                        $package_book_id =  $result['package_book_id'];
                                                                        $quantity =  $result['plant_quantity'];
                                                                        $get_all_plants_quantity = $pkg->get_Total_plants_each($package_book_id);

                                                                        if (isset($get_all_plants_quantity) && $get_all_plants_quantity == $quantity){ ?>
                                                                            <input type="hidden" name="pbId" value="<?php echo $result['package_book_id'];?>">
                                                                            <input type="hidden" name="quantity" value="<?php echo $result['plant_quantity'];?>">
                                                                            <input type="hidden" name="duration" value="<?php echo $result['duration'];?>">
                                                                            <button class="btn btn-custon-four btn-warning" name="start_package">Start Package</button>
<!--                                                                        </a>-->
                                                                            <?php }else{ ?>
                                                                            <button disabled="disabled" class="btn btn-custon-four btn-warning">Start Package</button>
                                                                            <?php }?>

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
                                                            <th data-field="name">Package Name</th>
                                                            <th data-field="date1" >Start Date</th>
                                                            <th data-field="date2" >End Date</th>
                                                            <th>Package Details</th>
                                                            <th>Customer Address</th>
                                                            <th>Plants</th>
                                                            <th>Remaining Day</th>
                                                            <th data-field="action">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkg->get_running_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['pkg_name']; ?></td>
                                                                <td><?php echo $result['startDate']; ?></td>
                                                                <td><?php echo $result['endDate']; ?></td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_details.php?package_id=<?php echo $result['pkg_id']; ?>">View Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_address.php?package_address_id=<?php echo $result['package_book_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-success">
                                                                        <a style="color:#fff" href="package_plant_list.php?package_book_id=<?php echo $result['package_book_id']; ?>&package_id=<?php echo $result['pkg_id']; ?>&cus_id=<?php echo $result['cus_id']; ?>">View Plants </a>

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
                                                                <?php if ($result['remaining_reminder'] >= 15){ ?>
                                                                    <td>
                                                                        <?=$result['remaining_reminder'];?>
                                                                        <button type="button" disabled="disabled" class="btn btn-primary">Reminder</i></button>
                                                                    </td>
                                                                <?php }else{ ?>

                                                                    <td>
                                                                        <?=$result['remaining_reminder'];?>
                                                                        <form action="" method="post">
                                                                            <input type="hidden" name="pbId" value="<?php echo $result['package_book_id']; ?>">
                                                                            <button name="check_reminder" class="btn btn-primary">Check Me</i></button>

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
                                                        <th data-field="name">Package Name</th>
                                                        <th data-field="date1" >Start Date</th>
                                                        <th data-field="date2" >End Date</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                        <th>Plants</th>
                                                        <th>Remaining Day</th>
                                                        <th data-field="action">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkg->get_renew_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['pkg_name']; ?></td>
                                                                <td><?php echo $result['startDate']; ?></td>
                                                                <td><?php echo $result['endDate']; ?></td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_details.php?package_id=<?php echo $result['pkg_id']; ?>">View Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_address.php?package_address_id=<?php echo $result['package_book_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-success">
                                                                        <a style="color:#fff" href="package_plant_list.php?package_book_id=<?php echo $result['package_book_id']; ?>&package_id=<?php echo $result['pkg_id']; ?>&cus_id=<?php echo $result['cus_id']; ?>">View Plants </a>

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
                                                                        <input type="hidden" name="pbId" value="<?php echo $result['package_book_id']; ?>">
                                                                        <button name="ok" class="btn btn-primary">OK</button>

                                                                    </form>
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="pbId" value="<?php echo $result['package_book_id'];?>">
                                                                        <input type="hidden" name="pkg_id" value="<?php echo $result['pkg_id'];?>">
                                                                        <input type="hidden" name="cus_id" value="<?php echo $result['cus_id'];?>">
                                                                        <button name="cancel" class="btn btn-danger">Cancel</i></button>
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
                                                        <th data-field="name">Package Name</th>
                                                        <th data-field="date1" >Start Date</th>
                                                        <th data-field="date2" >End Date</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                        <th>Plants</th>
                                                        <th>Remaining Day</th>
                                                        <th>Renew</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkg->get_expire_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['pkg_name']; ?></td>
                                                                <td><?php echo $result['startDate']; ?></td>
                                                                <td><?php echo $result['endDate']; ?></td>
                                                                <td>

                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_details.php?package_id=<?php echo $result['pkg_id']; ?>">Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_address.php?package_address_id=<?php echo $result['package_book_id']; ?>">View Address </a>

                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-success">
                                                                        <a style="color:#fff" href="package_plant_list.php?package_book_id=<?php echo $result['package_book_id']; ?>&package_id=<?php echo $result['pkg_id']; ?>&cus_id=<?php echo $result['cus_id']; ?>">View Plants </a>

                                                                    </button>
                                                                </td>
                                                                <td style="background-color: <?php echo ($row['remaining_days'] <= 10) ? 'yellow' : '';?>;">
                                                                    <?= -($result['remaining_days']) ?> Days Ago
                                                                </td>

                                                                <td>
<!--                                                                    --><?php //if (isset($renew_package)){echo $renew_package;} ?>
                                                                    <form action="" method="post">
                                                                        <select name="duration" class="form-control" style="width:105px;">
                                                                            <option value="1">1 Month</option>
                                                                            <option value="2">2 Month</option>
                                                                            <option value="6">6 Month</option>
                                                                            <option value="12">1 Year</option>
                                                                        </select>
                                                                        <input type="hidden" name="pbId" value="<?php echo $result['package_book_id'];?>">
                                                                        <input type="hidden" name="endDate" value="<?= $result['endDate'] ?>">
                                                                        <button class="btn btn-custon-four btn-warning" name="renew_package">Renew</button>

                                                                    </form>

                                                                </td>
                                                                <?php if (-$result['remaining_days'] < 3){ ?>
                                                                    <td>
                                                                        <button type="button" disabled="disabled" class="btn btn-primary">Complete</i></button>
                                                                    </td>
                                                                <?php }else{ ?>
                                                                    <td>
                                                                        <form action="" method="post">
                                                                            <input type="hidden" name="pbId" value="<?php echo $result['package_book_id'];?>">
                                                                            <input type="hidden" name="pkg_id" value="<?php echo $result['pkg_id'];?>">
                                                                            <input type="hidden" name="cus_id" value="<?php echo $result['cus_id'];?>">
                                                                            <button name="Complete" class="btn btn-danger">Complete</i></button>
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
                                                        <th data-field="name">Package Name</th>
                                                        <th data-field="date1" >Start Date</th>
                                                        <th data-field="date2" >End Date</th>
                                                        <th>Package Details</th>
                                                        <th>Customer Address</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $get_booking_package = $pkg->get_complete_package();
                                                    $i = 0;
                                                    if ($get_booking_package) {
                                                        while ($result = $get_booking_package->fetch_assoc()) {
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $result['pkg_name']; ?></td>
                                                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                                <td><?php echo $result['endDate']; ?></td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_details.php?package_id=<?php echo $result['pkg_id']; ?>">Package Details</a>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <button  type="button" class="btn btn-custon-four btn-primary">
                                                                        <a style="color:#fff" href="package_address.php?package_address_id=<?php echo $result['package_book_id']; ?>">View Address </a>

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
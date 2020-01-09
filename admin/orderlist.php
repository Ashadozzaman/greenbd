<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/Customer.php';?>
<?php include_once '../helpers/format.php';?>
<?php include_once '../classes/cart.php';?>
<?php
    $pro = new Product();
    $fm  = new Format();
    $cart  = new Cart();
?> 
<?php
    if (isset($_GET['shifted'])) {
        $id    = $_GET['shifted'];
        $time  = $_GET['time'];
        $price = $_GET['price'];
        $shift = $cart->shiftOrder($id,$price,$time);
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
                                <li class="active"><a href="#order"> Pending Order List</a></li>
                                <li><a href="#confirmorder"> Confirm Order List</a></li>
                                <li><a href="#reviews"> Sifted Order</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="order">
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
                                                                <th data-field="price" data-editable="true">Total Price</th>
                                                                <th data-field="name" data-editable="true">Total Quantity</th>
                                                                <th>Order Details</th>
                                                                <th>Customer Address</th>
                                                                <th data-field="status">Status</th>
                                                                <th data-field="action">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $cart = new Cart();
                                                                $fm = new Format();
                                                                $getorder = $cart->getallorder();
                                                                $i = 0;
                                                                if ($getorder) {
                                                                    while ($result = $getorder->fetch_assoc()) {
                                                                        $i++;
                                                                ?>
                                                            <tr>
                                                            <td></td>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                            <td>$<?php echo $result['total_price']; ?></td>
                                                            <td><?php echo $result['total_quantity']; ?></td>
                                                          <!--   <td>
                                                                <a href="orderdetails.php?orderid=<?php echo $result['or_id']; ?>">View Order Details</a>
                                                            </td> -->
                                                            <td>
                                                                
                                                                <button  type="button" class="btn btn-custon-four btn-primary">
                                                                    <a style="color:#fff" href="orderdetails.php?orderid=<?php echo $result['or_id']; ?>">View Order Details</a>


                                                                </button>
                                                            </td>
                                                             <td>
                                                                
                                                                <button  type="button" class="btn btn-custon-four btn-primary">
                                                                    <a style="color:#fff" href="orderaddress.php?or_id=<?php echo $result['or_id']; ?>">View Adress</a>

                                                                </button>
                                                            </td>

                                                            <td><a href="?shifted=<?php echo $result['or_id'];?>&price=<?php echo $result['total_price']; ?>&time=<?php echo $result['date']; ?>" >
                                                                    <button class="btn btn-custon-four btn-warning">Confirm</button>
                                                                </a>
                                                            </td>


                                                            <td><a onclick="return confirm('Are you sure delete this')" href="?delorderid=<?php echo $result['or_id']; ?>">
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
                                <div class="product-tab-list tab-pane fade" id="confirmorder">
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
                                                                <th data-field="price" data-editable="true">Total Price</th>
                                                                <th data-field="name" data-editable="true">Total Quantity</th>
                                                                <th>Order Details</th>
                                                                <th>Customer Address</th>
                                                                <th data-field="status">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $cart = new Cart();
                                                                $fm = new Format();
                                                                $getorder = $cart->getallconfirmorder();
                                                                $i = 0;
                                                                if ($getorder) {
                                                                    while ($result = $getorder->fetch_assoc()) {
                                                                        $i++;
                                                                ?>
                                                            <tr>
                                                            <td></td>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                            <td>$<?php echo $result['total_price']; ?></td>
                                                            <td><?php echo $result['total_quantity']; ?></td>
                                                          <!--   <td>
                                                                <a href="orderdetails.php?orderid=<?php echo $result['or_id']; ?>">View Order Details</a>
                                                            </td> -->
                                                            <td>
                                                                
                                                                <button  type="button" class="btn btn-custon-four btn-primary">
                                                                    <a style="color:#fff" href="orderdetails.php?orderid=<?php echo $result['or_id']; ?>">View Order Details</a>

                                                                </button>
                                                            </td>
                                                             <td>
                                                                
                                                                <button  type="button" class="btn btn-custon-four btn-primary">
                                                                    <a style="color:#fff" href="orderaddress.php?or_id=<?php echo $result['or_id']; ?>">View Adress</a>

                                                                </button>
                                                            </td>
                                                            <td>
                                                                <a href="?Confirm_shifted=<?php echo $result['or_id'];?>" >
                                                                    <button class="btn btn-custon-four btn-warning">Shifted</button>
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
                                <div class="product-tab-list tab-pane fade" id="reviews">
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
                                                                <th data-field="date" data-editable="true">Date</th>
                                                                <th data-field="price" data-editable="true">Total Price</th>
                                                                <th data-field="name" data-editable="true">Total Quantity</th>
                                                                <th>Order Details</th>
                                                                <th>Customer Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $cart = new Cart();
                                                                $fm = new Format();
                                                                $getorder = $cart->getcnforder();
                                                                $i = 0;
                                                                if ($getorder) {
                                                                    while ($result = $getorder->fetch_assoc()) {
                                                                        $i++;
                                                                ?>
                                                            <tr>
                                                            <td></td>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                                                            <td>$<?php echo $result['total_price']; ?></td>
                                                            <td><?php echo $result['total_quantity']; ?></td>
                                                            <td>
                                                                <button  type="button" class="btn btn-custon-four btn-primary">
                                                                <a href="orderdetails.php?orderid=<?php echo $result['or_id']; ?>">View Order Details</a>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <button  type="button" class="btn btn-custon-four btn-primary">
                                                                <a href="orderaddress.php?or_id=<?php echo $result['or_id']; ?>">View Adress</a>
                                                                </button>
                                                            </td>
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
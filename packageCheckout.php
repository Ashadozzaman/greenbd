
<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
<!-- ##### Right Side Cart Area ##### -->
<?php
$login = Session::get("cuslog");
if($login == false){
    echo "<script>window.location = 'login.php ';</script>";
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['package-submit']) ) {
    $cusid = Session::get("cusid");
    $insOrder = $pkgCart->PackageOrder($cusid,$_POST);
    echo $insOrder; exit();
    // $delcart = $cart->cartdel();
    // echo "<script>window.location = 'success.php ';</script>";
}

?>


<!-- ##### Right Side Cart End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Checkout</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Checkout Area Start ##### -->

<div class="checkout_area section-padding-80">
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div style="color:red;font-size:20px;">
                            <?php
                            if(isset($insOrder)){
                                echo $insOrder;
                            }
                            ?>
                        </div>
                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="first_name"> Name <span>*</span></label>
                                <input type="text" name="name" class="form-control" id="first_name" >
                            </div>
                            <div class="col-12 mb-3">
                                <label for="company">Country Name</label>
                                <input type="text" class="form-control" id="company" name="cname">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="street_address">Address <span>*</span></label>
                                <input type="text" class="form-control mb-3" id="street_address" name="address">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="postcode">Postcode <span>*</span></label>
                                <input type="text" class="form-control" id="postcode" name="postcode">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="city">Town/City <span>*</span></label>
                                <input type="text" class="form-control" name="town" id="city">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone_number">Phone No <span>*</span></label>
                                <input type="text" class="form-control" name="phone" id="phone_number" >
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Email Address <span>*</span></label>
                                <input type="email" class="form-control" name="email" id="email_address">
                            </div>

                            <div class="col-12">
                                <div class="custom-control custom-checkbox d-block mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                </div>
                                <div class="custom-control custom-checkbox d-block mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2"><a href="profile.php">If you need Chenge your profile</a></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-9 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation" style="width: 130%;">

                        <div class="cart-page-heading">
                            <h5>Your Customize Package</h5>
                            <p>The Details</p>
                        </div>
                        <!-- Shopping cart table -->
                        <div class="table-responsive" style="overflow-y: scroll; max-height:300px;">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="20%" scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Plants</div>
                                    </th>
                                    <th width="20%" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Price</div>
                                    </th>
                                    <th width="20%" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantity</div>
                                    </th>
                                    <th width="20%" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Duration</div>
                                    </th>
                                    <th width="40%" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Total</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sub_total = 0;
                                $sub_qnt = 0;
                                $getCart = $pkgCart->showCart();
                                if($getCart){
                                    while($result = $getCart->fetch_assoc()){
                                        $sub_qnt = $sub_qnt + $result['quantity'];
                                        ?>
                                        <tr>
                                            <td scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="admin/<?php echo $result['image'];?>" alt="" style="height: 70px; width: 75px;" class="img-fluid rounded shadow-sm">

                                                </div>
                                            </td>
                                            <td class="border-0 align-middle"><strong><?php echo $result['price'];?> ৳</strong></td>
                                            <td class="border-0 align-middle"><strong><?php echo $result['quantity'];?></strong></td>
                                            <td class="border-0 align-middle"><strong><?php echo $result['duration'];?></strong></td>

                                            <td class="border-0 align-middle">
                                                <?php
                                                $total_price = ($result['price'] * $result['quantity'])*$result['duration'];
                                                $sub_total = $sub_total + $total_price;
                                                ?>
                                                <strong>
                                                    ৳<?php echo $total_price;?>

                                                </strong>
                                            </td>

                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>



                        <ul class="order-details-form mb-4">
                            <li><span>Order Subtotal</span> <span>৳<?php echo $sub_total; ?></span></li>
                            <li><span>With Shipping Cost</span> <span>৳
                                    <?php
                                    $withship = $sub_total + 100;
                                    echo $withship;

                                    ?></span></li>
                            <li><span>Tax</span> <span>2%</span></li>
                            <li><span>Total</span> <span>৳

                                    <?php
                                    if($sub_total == 0){
                                        $total = 0;
                                    }else{
                                        $vat   = $sub_total * .02;
                                        $total = $vat + $withship;
                                    }
                                    echo $total;
                                    ?></span></li>
                            <li><span>Total Quantity</span> <span>৳ <?php echo $sub_qnt; ?></span></li>
                        </ul>

                        <div id="accordion" role="tablist" class="mb-4">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>bKash</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <input type="text" class="form-control" id="phone_number" value="" >
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <input type="text" class="form-control" id="phone_number" value="" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                                                <a href="?orderid=order" class="btn essence-btn">Place Order</a> -->
                    </div>
                </div>
            </div>
            <button type="submit"  style="width: 112%;height: 50px;font-size: 18px;font-weight:bold;" class="btn btn-primary" name="package-submit">Order Package</button>
        </form>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->

<?php include 'tamp/footer.php'; ?>

</body>

</html>
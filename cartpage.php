<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>

<?php 
    if(isset($_GET['delpro'])){
        $id = $_GET['delpro'];
        $delproduct = $cart->prodel($id); 
    }

?>

    <?php
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cart_id = $_POST['cart_id'];
            $pro_id  = $_POST['pro_id'];
           $quantity = $_POST['quantity'];
           $uptocart = $cart->cartup($quantity,$cart_id,$pro_id);
           if ($quantity <= 0) {
               $delproduct = $cart->prodel($cart_id);
           }
        }


    ?>


  <?php include 'tamp/carts.php'; ?>
    <!-- ##### Right Side Cart End ##### -->



    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>dresses</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <?php include 'tamp/sidebar.php'; ?>
                </div>
                  <!-- ===================Cart Page====================== -->
                <div class="col-12 col-md-8 col-lg-9">
                    
                   <div class="row" style="  background: #eecda3;
                        background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
                        background: linear-gradient(to right, #eecda3, #ef629f);
                        min-height: 100vh;">
                    <div class="px-4 px-lg-0">
                      <!-- For demo purpose -->
                      <div class="container text-white py-5 text-center">
                        <h3 class="display-4">WellCome to Your shopping cart</h3>
                        <span>
                            <?php
                                if(isset($uptocart)){
                                echo $uptocart;
                            }
                            ?>
                        </span>
                      </div>
                      <!-- End -->

                      <div class="pb-5">
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                              <!-- Shopping cart table -->
                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th width="15%" scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Product</div>
                                      </th>
                                      <th width="30%" scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Product Name</div>
                                      </th>
                                      <th width="10%" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Price</div>
                                      </th>
                                      <th width="10%" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantity</div>
                                      </th>
                                      <th width="20%" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Total Price</div>
                                      </th>
                                      <th width="10%" scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Remove</div>
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                        <?php
                                            $sub_total = 0;
                                            $getCart = $cart->showCart();
                                                if($getCart){
                                                  $cc = $getCart->num_rows;

                                                while($result = $getCart->fetch_assoc()){
                                        ?>
                                        <tr>
                                          <td scope="row" class="border-0">
                                            <div class="p-2">
                                              <img src="admin/<?php echo $result['image'];?>" alt="" style="height: 70px; width: 75px;" class="img-fluid rounded shadow-sm">
                                              
                                            </div>
                                          </td>
                                          <td class="border-0 align-middle"><strong><?php echo $result['pro_name'];?></strong></td>
                                          <td class="border-0 align-middle"><strong><?php echo $result['price'];?> ৳</strong></td>
                                          <td class="border-0 align-middle">
                                            <form action="" method="post">
                                                <strong>
                                                    <input type="hidden" name="cart_id" value="<?php echo $result['cart_id'];?>" />
                                                    <input type="hidden" name="pro_id" value="<?php echo $result['pro_id'];?>" />
                                                    <input type="number" style="width:55%; border: 2px solid black;border-radius: 4px; " min="1" name="quantity" value="<?php echo $result['quantity'];?>" />
                                                   <button type="submit" value="Submit"><i class="fa fa-edit"></i></button>
                                                </strong>
                                            </form>
                                          </td>
                                          <td class="border-0 align-middle">
                                            <?php 
                                                $total_price = $result['price'] * $result['quantity'];
                                                $sub_total = $sub_total + $total_price;
                                            ?>
                                            <strong>
                                                <?php echo $total_price;?> ৳

                                            </strong>
                                        </td>
                                          <td class="border-0 align-middle"><a onclick="return confirm('Are you sure to Delete this!!')" style="font-size:18px;" href="?delpro=<?php echo $result['cart_id'] ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                        <?php } }else{ ?>
                                          echo "<script>window.location = 'index.php ';</script>";
                                      <?php  } ?>
                                   </tbody>
                                </table>
                              </div>
                              <!-- End -->
                            </div>
                          </div>

                          <div class="row py-5 p-4 bg-white rounded shadow-sm">
                            <div class="col-lg-6">
                              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                              <div class="p-4">
                                <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                                <div class="input-group mb-4 border rounded-pill p-2">
                                  <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">
                                  <div class="input-group-append border-0">
                                    <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                                  </div>
                                </div>
                              </div>
                              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                              <div class="p-4">
                                <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                                <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                              <div class="p-4">
                                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                <ul class="list-unstyled mb-4">
                                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>$ <?=$sub_total?></strong></li>
                                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">With Shipping Cost </strong>
                                    <strong>
                                        <?php
                                            $withship = $sub_total + 50;
                                            echo $withship;

                                        ?> ৳
                                       
                                    </strong></li>
                                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>2%</strong></li>
                                  <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                    <h5 class="font-weight-bold">

                                        <?php
                                            if($sub_total == 0){
                                                $total = 0; 
                                            }else{
                                            $vat   = $sub_total * .02;
                                            $total = $vat + $withship;
                                        }
                                            echo $total;
                                        ?> ৳

                                    </h5>
                                  </li>
                                </ul><a href="checkout.php" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
                                  </ul><a href="shop.php" class="btn btn-warning rounded-pill py-2 btn-block">Continue Shopping</a>

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
    </section>
    <!-- ##### Shop Grid Area End ##### -->

   <?php include 'tamp/footer.php'; ?>
</body>

</html>
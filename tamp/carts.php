
<?php
     $getCart = $cart->showCart();
     if ($getCart) {
         $cc = $getCart->num_rows;
     }
?>
<?php 
    if(isset($_GET['delpro'])){
        $id = $_GET['delpro'];
        $delproduct = $cart->prodel($id); 
    }

?>

    <?php
       if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cart-update'])) {
            $cart_id = $_POST['cart_id'];
            $pro_id  = $_POST['pro_id'];
            $quantity = $_POST['quantity'];
           $uptocart = $cart->cartup($quantity,$cart_id,$pro_id);
           if ($quantity <= 0) {
               $delproduct = $cart->prodel($cart_id);
           }
        }


    ?>
    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <?php if (isset($cc) > 1) { ?>
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""><span>0</span></a>
        </div>
    <?php }else{ ?>
         <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""><span><?php echo $cc;?></span></a>
        </div>
   <?php } ?> 

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
             <?php
                $sub_total = 0;
                $getCart = $cart->showCart();
                    if($getCart){
                      $cc = $getCart->num_rows;

                    while($result = $getCart->fetch_assoc()){
            ?>
                <div class="single-cart-item">
                    <div class="product-image">
                        <img style="height: 250px; " src="admin/<?php echo $result['image'];?>"  alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><a onclick="return confirm('Are you sure to Delete this!!')" href="?delpro=<?php echo $result['cart_id'] ?>" class="text-dark"><i class="fa fa-close" aria-hidden="true"></i></a></span>
                            <h6><?php echo $result['pro_name'];?></h6>
                            <p class="price">Price: $<?php echo $result['price'];?></p>
                            <form action="" method="post">
                                <strong>
                                    <input type="hidden" name="cart_id" value="<?php echo $result['cart_id'];?>" />
                                    <input type="hidden" name="pro_id" value="<?php echo $result['pro_id'];?>" />
                                    <input type="number" style="width:30%; border: 2px solid #b5b2b2;border-radius: 4px; " name="quantity" value="<?php echo $result['quantity'];?>" />
                                   <button type="submit" name="cart-update" value="Submit"><i class="fa fa-edit"></i></button>
                                </strong>
                            </form>
                             <?php 
                                $total_price = $result['price'] * $result['quantity'];
                                $sub_total = $sub_total + $total_price;
                            ?>
                            <p class="price">TotalPrice: $<?php echo $total_price;?></p>
                        </div>
                    </div>
                </div>
            <?php } }?>

            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <?php
                    if(isset($uptocart)){
                    echo $uptocart;
                    }
                ?>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>$ <?=$sub_total?></span></li>
                    <li><span>delivery:</span> 
                        <span>
                            <?php
                                $withship = $sub_total + 50;
                                echo $withship;

                            ?>
                            
                        </span></li>
                    <li><span>Tax:</span> <span>2%</span></li>
                    <li><span>total:</span> 
                        <span>$
                             <?php
                                            if($sub_total == 0){
                                                $total = 0; 
                                            }else{
                                            $vat   = $sub_total * .02;
                                            $total = $vat + $withship;
                                        }
                                            echo $total;
                                        ?>

                        </span>
                    </li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="checkout.php" name="submit" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->
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
  if (isset($_GET['orderpageid'])){
    $id = $_GET['orderpageid'];
    $cnfproduct = $cart->cnfProductbyid($id);
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
                        <h2>Order Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container" style="max-width:1410px;">
            <div class="row" >
               
                  <!-- ===================Cart Page====================== -->
                <div class="col-12 ">
                    <div class="px-4 px-lg-0">
                        <div class="pb-5">
                        <div class="container">
                          <div class="row">
                            <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
<!-- =======================headding============== -->
           <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active ">Recent Order</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Order History</a>
                </li>
            </ul>
            <div class="tab-content py-4">
              <!-- recent order -->
                <div class="tab-pane active" id="profile">
                    <div class="row">
                      <table class="table">
                        <thead>
                          <tr>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="p-2 px-3 text-uppercase">SL</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Date</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Total Quantity</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Total Price</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Order Details</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Status</div>
                            </th>
                          </tr>
                        </thead>
                          <tbody>
                                <?php
                                    $cusid = Session::get("cusid");
                                    $i = 0;
                                    $getorder = $cart->orderpage($cusid);
                                        if($getorder){
                                        while($result = $getorder->fetch_assoc()){
                                        $i++;
                                ?>
                                <tr>
                                    <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                    <td class="border-0 align-middle"><strong><?php echo $fm->formatDate($result['date']);?></strong></td>
                                    <td class="border-0 align-middle"><strong><?php echo $result['total_quantity'];?></strong></td>
                                    <td class="border-0 align-middle"><strong><?php echo $result['total_price'];?></strong></td>
                                    <td class="border-0 align-middle"><a style="font-size: 16px;" href="orderDetails.php?orderpageid=<?php echo $result['or_id']; ?>">View Order details</a></td>
                                    <td class="border-0 align-middle">
                                        <strong>
                                        <?php 
                                            if($result['status'] == 0){
                                                echo "Pending";
                                              }else{
                                             echo "<strong>Order Confirm</strong>";
                                            }
                                        ?>
                                            
                                        </strong>
                                    </td>
                                </tr>
                                <?php } } ?>
                           </tbody>
                        </table>
                    </div>
                    <!--/row-->
                </div>
                <!-- end -->
                <!-- order history -->
                <div class="tab-pane" id="messages">
                    <table class="table">
                        <thead>
                          <tr>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="p-2 px-3 text-uppercase">SL</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Date</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Total Quantity</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Total Price</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                              <div class="py-2 text-uppercase">Order Details</div>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                              <?php
                                  $cusid = Session::get("cusid");
                                  $i = 0;
                                  $getorder = $cart->cnforderforuser($cusid);
                                      if($getorder){
                                      while($result = $getorder->fetch_assoc()){
                                      $i++;
                              ?>
                              <tr>
                                  <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                  <td class="border-0 align-middle"><strong><?php echo $fm->formatDate($result['date']);?></strong></td>
                                  <td class="border-0 align-middle"><strong><?php echo $result['total_quantity'];?></strong></td>
                                  <td class="border-0 align-middle"><strong><?php echo $result['total_price'];?></strong></td>
                                  <td class="border-0 align-middle"><a style="font-size: 16px;" href="orderDetails.php?orderpageid=<?php echo $result['or_id']; ?>">View Order details</a></td>
                              </tr>
                              <?php } } ?>
                         </tbody>
                      </table>
                </div>
                <!-- end -->
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
<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
    <!-- ##### Right Side Cart Area ##### -->
<?php include 'tamp/carts.php'; ?>
    <!-- ##### Right Side Cart End ##### -->
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$cuslog = $cus->customerlog($_POST);
	}


?>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Customer Login</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-12">
                    <div class="checkout_details_area mt-50 clearfix">
						<span style="font-size:18px; color:red;">
							
                        <?php
	                        if (isset($cuslog )) {
	                        	echo $cuslog ;
	                        }

                        ?>

						</span>
                        <div class="cart-page-heading mb-30">
                            <h5>Customer Login</h5>
                        </div>

                        <form class="form-horizontal" action="" method="post">
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Email:</label>
                                <div class="col-sm-10">
                                  <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Password:</label>
                                <div class="col-sm-10"> 
                                  <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
                                </div>
                              </div>
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <div class="checkbox">
                                    <a href="register.php"><label><u>Create new account</u></label></a>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                  <button type="submit" class="btn btn-default">Submit</button>
                                </div>
                              </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->

  <?php include 'tamp/footer.php'; ?>

</body>

</html>
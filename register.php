<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
    <!-- ##### Right Side Cart Area ##### -->
<?php include 'tamp/carts.php'; ?>
    <!-- ##### Right Side Cart End ##### -->
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$cusreg = $cus->customerReg($_POST, $_FILES);
	}


?>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Signup New Account</h2>
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
	                        if (isset($cusreg)) {
	                        	echo $cusreg;
	                        }

                        ?>

						</span>
                        <div class="cart-page-heading mb-30">
                            <h5>Customer Address</h5>
                        </div>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name <span>*</span></label>
                                    <input type="text" class="form-control" name="fname" id="first_name" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name <span>*</span></label>
                                    <input type="text" class="form-control" name="lname" id="last_name" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Country Name <span>*</span></label>
                                    <input type="text" class="form-control" name="cname" id="last_name" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control" name="address" id="street_address" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postcode">Postcode <span>*</span></label>
                                    <input type="text" class="form-control" name="postcode" id="postcode" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" class="form-control" name="town" id="city" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="text" class="form-control" id="phone_number" name="phone">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone_number">Date of Birth <span>*</span></label>
                                    <input type="date" class="form-control" id="phone_number" name="dob">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone_number">Profile <span>*</span></label>
                                    <input type="file" class="form-control" id="phone_number" name="image">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" name="email" id="email_address" value="">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="email_address">Password <span>*</span></label>
                                    <input type="password" class="form-control" name="password" id="email_address" value="">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" name="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                	<input type="submit" style="background: #b6d2c8; float: right;" class="form-control" name="submit" id="email_address" value="SIGNUP">
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
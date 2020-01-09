
<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
    <!-- ##### Right Side Cart Area ##### -->


<?php include 'tamp/carts.php'; ?>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Order Successfull</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <?php
                        $cus_name = Session::get('fname');
                        ?>

                        <h2>Thanks! <?php echo $cus_name; ?>, Your Order Successfull</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->
        <div class="top_catagory_area section-padding-80">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Single Catagory -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <a href="index.php"><div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(img/ok.jpg);height: 350px;width: auto;">

                            </div></a>
                    </div>
                </div>
            </div>>
        </div>

</body>

</html>
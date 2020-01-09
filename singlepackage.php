<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>

<?php
    if (!isset($_GET['pkg_id']) && $_GET['pkg_id']=='NULL'){
        echo "<script>window:location = 'packages.php';</script>";
    }else{
        $id = $_GET['pkg_id'];
    }

    $get_package = $pkg->get_single_package($id)

?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_package']) ) {
        $cus_id = Session::get("cusid");
        $book_package = $pkg->booking_package($cus_id,$id,$_POST);
    }

?>
<!-- ##### Right Side Cart Area ##### -->
<?php include 'tamp/carts.php'; ?>
<!-- ##### Right Side Cart End ##### -->

<!-- ##### Blog Wrapper Area Start ##### -->
<div class="single-blog-wrapper">

    <!-- Single Blog Post Thumb -->
    <div class="single-blog-post-thumb">
        <img src="img/01.jpg" style="width: 100%" alt="">
    </div>
    <!-- Single Blog Content Wrap -->
    <div class="single-blog-content-wrapper d-flex">

        <!-- Blog Content -->
        <div class="single-blog--text">
            <h3 style="text-transform: uppercase;color: #79a583"><u><span><?php echo $get_package['pkg_name']  ?></span></u></h3>
            <table style="font-size: 14px;font-weight:bold; color: inherit;">
                <tr>
                    <td style="width: 150px">Initial Cost: </td>
                    <td><?php echo $get_package['Initial_cost']  ?> Taka</td>
                </tr>
                <tr>
                    <td>Monthly Cost: </td>
                    <td><?php echo $get_package['monthly_cost']  ?> Taka</td>
                </tr>
                <tr>
                    <td>Yearly Cost: </td>
                    <td><?php echo $get_package['yearly_cost']  ?> Taka</td>
                </tr>
            </table><br>
            <blockquote>
                <span style="font-size: 20px;">Package Service</span>
                <h6><i class="fa fa-quote-left" aria-hidden="true"></i><?php echo $get_package['pkg_service']  ?> .</h6>

            </blockquote>
            <span style="font-size:24px;">Description About Package</span>
            <p><?php echo $get_package['pkg_description']  ?></p>
            <span style="font-size:24px;">Simple Plant Rental Process</span>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-light">Set up an appointment for our team to visit your office or
                        email us with your requirements</li>
                    <li class="list-group-item list-group-item-light">We will complete an onsite analyse of your office and plant requirements</li>
                    <li class="list-group-item list-group-item-light">Please fill in the form Today to start the best enhancement you can make to your office</li>
                </ul><br>

            <?php if (isset($book_package)){ ?>
                <ul class="list-group">
                    <li class="list-group-item list-group-item-success"><?php echo $book_package; ?></li>
                </ul>
            <?php } ?>
            <div class="container">
                <form action="" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name"> Name <span>*</span></label>
                        <input type="text" name="name" class="form-control" id="first_name" >
                    </div>
                    <div class="col-6 mb-3">
                        <label for="company">Company Name</label>
                        <input type="text" class="form-control" id="company" name="cname">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="street_address">Address <span>*</span></label>
                        <input type="text" class="form-control mb-3" id="street_address" name="address">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="city">Town/City <span>*</span></label>
                        <input type="text" class="form-control" name="town" id="city">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="phone_number">Phone No <span>*</span></label>
                        <input type="text" class="form-control" name="phone" id="phone_number" >
                    </div>
                    <div class="col-6 mb-4">
                        <label for="email_address">Email Address <span>*</span></label>
                        <input type="email" class="form-control" name="email" id="email_address">
                    </div>
                    <div class="col-6 mb-4">
                        <label for="duration">Duration <span>*</span></label>
                        <select name="duration" id="duration" class="form-control">
                            <option value="1">1 Month</option>
                            <option value="2">2 Month</option>
                            <option value="6">6 Month</option>
                            <option value="12">1 Year</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <input type="submit" class="form-control btn btn-secondary" name="submit_package" value="Book This Package">
                    </div>
                </div>
                </form>
            </div>
        </div>

        <!-- Related Blog Post -->
        <div class="related-blog-post">
            <!-- Single Related Blog Post -->
            <div class="single-related-blog-post">
                <img src="img/bg-img/rp1.jpg" alt="">
                <a href="#">
                    <h5>Cras lobortis nisl nec libero pulvinar lacinia. Nunc sed ullamcorper massa</h5>
                </a>
            </div>
            <div class="single-related-blog-post">
                <img src="img/bg-img/rp1.jpg" alt="">
                <a href="#">
                    <h5>Cras lobortis nisl nec libero pulvinar lacinia. Nunc sed ullamcorper massa</h5>
                </a>
            </div>
            <!-- Single Related Blog Post -->
            <div class="single-related-blog-post">
                <img src="img/bg-img/rp2.jpg" alt="">
                <a href="#">
                    <h5>Fusce tincidunt nulla magna, ac euismod quam viverra id. Fusce eget metus feugiat</h5>
                </a>
            </div>
            <!-- Single Related Blog Post -->
            <div class="single-related-blog-post">
                <img src="img/bg-img/rp3.jpg" alt="">
                <a href="#">
                    <h5>Etiam leo nibh, consectetur nec orci et, tempus tempus ex</h5>
                </a>
            </div>
            <!-- Single Related Blog Post -->
            <div class="single-related-blog-post">
                <img src="img/bg-img/rp4.jpg" alt="">
                <a href="#">
                    <h5>Sed viverra pellentesque dictum. Aenean ligula justo, viverra in lacus porttitor</h5>
                </a>
            </div>
        </div>

    </div>
</div>
<!-- ##### Blog Wrapper Area End ##### -->
<?php include 'tamp/footer.php'; ?>

</body>

</html>
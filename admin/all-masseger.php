<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/customer.php';?>
<?php include_once '../helpers/format.php';?>
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
        <div class="contacts-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <?php 
                        $cus = new Customer();
                        $getallChat = $cus->getAllChat();
                        if ($getallChat) {
                            while ($row= $getallChat->fetch_assoc()) { ?>
                    <div class="col-lg-3">
                        <div  style=" height:200px; ">
                            <div class="panel-body custom-panel-jw">
                                <div class="social-media-in">
                                <!--     <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a> -->
                                    <a style="height: 40px;width: 40px;" href="#"><i style="margin-top:15px; " class="fa fa-twitter fa-lg"></i>
                                    </a>
                                    <a style="height: 40px;width: 40px;" href="#"><i style="margin-top:15px; " class="fa fa-facebook fa-lg"></i>
                                    </a>
                                    <a style="height: 40px;width: 40px;" href="Admin-contact.php?cus_id=<?php echo $row['cus_id']; ?>"><i style="margin-top:15px; " class="fa fa-envelope fa-lg"></i>
                                    </a>
                                </div>
                                <a href="Admin-contact.php?cus_id=<?php echo $row['cus_id']; ?>"><img  alt="logo" style="border-radius: 50px; width: 100px;height: 100px;"class="img-circle m-b" src="<?php echo $row['image']; ?>"></a>
                                <h3><a href=""><?php echo $row['fname']; ?></a></h3>
                                <p class="all-pro-ad">London, LA</p>
                            </div>
                            
                        </div>
                    </div>
                <?php } } ?>
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
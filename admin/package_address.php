<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include_once '../helpers/format.php';?>
<?php include_once '../classes/package.php';?>
<?php
    if (!isset($_GET['package_address_id'])) {
        echo "<script>window:location = 'book-packageList.php';</script>";
    }else{
        $id    = $_GET['package_address_id'];
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
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap drp-lst">
                        <h4>Package Address</h4>
                        <div class="asset-inner">
                            <?php
                            $pkg = new Package();
                            $fm = new Format();
                            $get_package_address = $pkg->get_package_address($id);
                            if($get_package_address){
                                while ($result =  $get_package_address->fetch_assoc()) { ?>
                                    <table>
                                        <tr>
                                            <td>Customer Name</td>
                                            <td><?php echo $result['name'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Customer Address</td>
                                            <td><?php echo $result['address'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Town</td>
                                            <td><?php echo $result['town'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Company Name</td>
                                            <td><?php echo $result['cname'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone No.</td>
                                            <td><?php echo $result['phone'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Email Address</td>
                                            <td><?php echo $result['email'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Order Date</td>
                                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                                        </tr>
                                    </table>
                                <?php } } ?>
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
<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
<!-- ##### Right Side Cart Area ##### -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['renew_package'])){
    $cus_pkg_id = $_POST['cus_pkg_id'];
    $duration = $_POST['duration'];
    $renew_package = $pkgCart->renew_customize_package_customer($duration,$cus_pkg_id);
}
?>
<?php
$login = Session::get("cuslog");
if($login == false){
    echo "<script>window.location = 'login.php ';</script>";
}
?>

<?php include 'tamp/carts.php'; ?>
<!-- ##### Right Side Cart End ##### -->



<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg); margin-top: 60px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Customize Package Details</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area">
    <div class="container" style="max-width:1600px;">
        <div class="row" >
            <!-- ===================Cart Page====================== -->
            <div class="col-12 ">
                <div class="px-4 px-lg-0">
                    <div class="pb-5">
                        <div class="container" style="max-width:1500px;">
                            <div class="row">
                                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                                    <!-- =======================headding============== -->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a href="" data-target="#r-package" data-toggle="tab" class="nav-link active ">Recent Package</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" data-target="#rr-package" data-toggle="tab" class="nav-link">Running Package</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" data-target="#History" data-toggle="tab" class="nav-link">Package History</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content py-4">
                                        <!-- recent pending -->
                                        <div class="tab-pane active" id="r-package">
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
                                                            <div class="py-2 text-uppercase">Duration</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Total Price</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Package Details</div>
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
                                                    $getBookPackage = $pkgCart->getCustomizePackage($cusid);
                                                    if($getBookPackage){
                                                        while($result = $getBookPackage->fetch_assoc()){
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $fm->formatDate($result['date']);?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['duration'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong>৳<?php echo $result['total_price'];?></strong></td>
                                                                <td class="border-0 align-middle">
                                                                    <a href="CustomizePackageDetails.php?packageBookId=<?php echo $result['cus_pkg_id'];?>">
                                                                        <button type="button"  class="btn btn-info">
                                                                            Package Details
                                                                        </button>
                                                                    </a>
                                                                </td>
                                                                <td class="border-0 align-middle">
                                                                    <strong>
                                                                        <?php
                                                                        if($result['status'] == 'Pending'){
                                                                            echo '<button type="button" disabled="disabled" class="btn">Pending</button>';
                                                                        }elseif ($result['status'] == 'renew'){
                                                                            echo '<button type="button" disabled="disabled" class="btn btn-secondary">Renew</button>';

                                                                        }else{
                                                                            echo '<button type="button" disabled="disabled" class="btn btn-danger">Confirm</button>';
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

                                        <!--                                        running package-->

                                        <div class="tab-pane" id="rr-package">
                                            <div class="row">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="p-2 px-3 text-uppercase">SL</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Start Date</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">End Date</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Duration</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Total Price</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Remaining </div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Package Details</div>
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
                                                    $getBookPackage = $pkgCart->getCustomizePackageRunning($cusid);
                                                    if($getBookPackage){
                                                        while($result = $getBookPackage->fetch_assoc()){
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['startDate'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['endDate'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['duration'];?> Days</strong></td>
                                                                <td class="border-0 align-middle"><strong>৳<?php echo $result['total_price'];?> </strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['remaining_days'];?> Days</strong></td>
                                                                <td class="border-0 align-middle">
                                                                    <a href="CustomizePackageDetails.php?packageBookId=<?php echo $result['cus_pkg_id'];?>">
                                                                        <button type="button"  class="btn btn-info">
                                                                            Package Details
                                                                        </button>
                                                                    </a>
                                                                </td>
                                                                <?php if ($result['remaining_days'] > 2 ){ ?>
                                                                    <td class="border-0 align-middle">
                                                                        <button type="button" disabled="disabled"  class="btn btn-danger">Running</button>
                                                                    </td>
                                                                <?php }else{ ?>
                                                                    <td class="border-0 align-middle">
                                                                        <form action="" method="post">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <input type="number" name="duration" class="form-control" min="1" placeholder="Days">
                                                                                </div>
                                                                                <div class="col-sm-4">

                                                                                    <input type="hidden" name="cus_pkg_id" value="<?php echo $result['cus_pkg_id'];?>">
                                                                                    <button class="btn btn-custon-four btn-warning" name="renew_package">Renew</button>
                                                                                </div>

                                                                            </div>

                                                                        </form>
                                                                    </td>
                                                                <?php } ?>


                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <!--                                        running package-->

                                        <!--                                        complete packages-->
                                        <div class="tab-pane" id="History">
                                            <div class="row">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="p-2 px-3 text-uppercase">SL</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Total Price</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Start Date</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">End Date</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Duration</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Package Details</div>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $cusid = Session::get("cusid");
                                                    $i = 0;
                                                    $getBookPackage = $pkgCart->getCustomizePackageComplete($cusid);
                                                    if($getBookPackage){
                                                        while($result = $getBookPackage->fetch_assoc()){
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                                                <td class="border-0 align-middle"><strong>৳<?php echo $result['total_price'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $fm->formatDate($result['startDate']);?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $fm->formatDate($result['endDate']);?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['duration'];?> Days</strong></td>
                                                                <td class="border-0 align-middle">
                                                                    <a href="CustomizePackageDetails.php?packageBookId=<?php echo $result['cus_pkg_id'];?>">
                                                                        <button type="button"  class="btn btn-info">
                                                                            Package Details
                                                                        </button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--/row-->
                                        </div>
                                        <!--                                        complete packages end-->
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
<!-- Modal -->

<!-- large size Modal -->
<!--model end-->

<?php include 'tamp/footer.php'; ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
<!-- ##### Right Side Cart Area ##### -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['renew_package'])){
        $pbId = $_POST['pbId'];
        $duration = $_POST['duration'];
        $renew_package = $pkg->renew_package_customer($duration,$pbId);
    }
?>
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
<div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg); margin-top: 60px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Package Details</h2>
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
                                                            <div class="py-2 text-uppercase">Package Name</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Date</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Duration</div>
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
                                                    $getBookPackage = $pkg->getBookPackage($cusid);
                                                    if($getBookPackage){
                                                        while($result = $getBookPackage->fetch_assoc()){
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['pkg_name'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $fm->formatDate($result['date']);?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['duration'];?></strong></td>
                                                                <td class="border-0 align-middle">
                                                                    <a href="singlePackageDetails.php?packageBookId=<?php echo $result['pkg_id'];?>">
                                                                    <button type="button"  class="btn btn-info">
                                                                        Package Details
                                                                    </button>
                                                                    </a>
                                                                </td>
                                                                <td class="border-0 align-middle">
                                                                    <strong>
                                                                        <?php
                                                                        if($result['status'] == 'Pending'){
                                                                            echo '<button type="button"  class="btn">Pending</button>';
                                                                        }else{
                                                                            echo '<button type="button"  class="btn btn-danger disabled">Confirm</button>';
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
                                                            <div class="py-2 text-uppercase">Package Name</div>
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
                                                            <div class="py-2 text-uppercase">Remaining</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Plants</div>
                                                        </th>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                        <div class="py-2 text-uppercase">Package Details</div>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Status</div>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $cusid = Session::get("cusid");
                                                    $i = 0;
                                                    $getBookPackage = $pkg->getBookPackageRunning($cusid);
                                                    if($getBookPackage){
                                                        while($result = $getBookPackage->fetch_assoc()){
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['pkg_name'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['startDate'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['endDate'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['duration'];?> Month</strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['remaining_days'];?> Days</strong></td>
                                                                <td class="border-0 align-middle"><strong>
                                                                        <a style="color:#fff" href="packagePlants.php?package_book_id=<?php echo $result['package_book_id']; ?>&package_id=<?php echo $result['pkg_id']; ?>&cus_id=<?php echo $result['cus_id']; ?>">
                                                                        <button type="button"  class="btn">View Plants</button>
                                                                        </a>
                                                                </td>
                                                                <td class="border-0 align-middle">
                                                                    <a href="singlePackageDetails.php?packageBookId=<?php echo $result['pkg_id'];?>">
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
                                                                            <div class="col-md-10">
                                                                                <select name="duration" class="form-control" >
                                                                                    <option value="1">1 Month</option>
                                                                                    <option value="12">1 Year</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <input type="hidden" name="pbId" value="<?php echo $result['package_book_id'];?>">
                                                                                <input type="hidden" name="endDate" value="<?= $result['endDate'] ?>">
                                                                                <button class="btn btn-custon-four btn-warning" name="renew_package">Renew</button>
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
                                                            <div class="py-2 text-uppercase">Package Name</div>
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
                                                    $getBookPackage = $pkg->getBookPackageComplete($cusid);
                                                    if($getBookPackage){
                                                        while($result = $getBookPackage->fetch_assoc()){
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['pkg_name'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $fm->formatDate($result['startDate']);?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $fm->formatDate($result['endDate']);?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['duration'];?> Month</strong></td>
                                                                <td class="border-0 align-middle">
                                                                    <a href="singlePackageDetails.php?packageBookId=<?php echo $result['pkg_id'];?>">
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
<div class="modal fade" id="Modal-large-demo" tabindex="-1" role="dialog" aria-labelledby="Modal-large-demo-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Modal-large-demo-label">Large sized Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table">
                        <thead>
                        <tr>
                            <th  scope="col" class="border-0 bg-light">
                                <div class="p-2 px-3 text-uppercase">SL</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Package Name</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Date</div>
                            </th>
                            <th  scope="col" class="border-0 bg-light">
                                <div class="py-2 text-uppercase">Duration</div>
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
                        $getBookPackage = $pkg->getBookPackage($cusid);
                        if($getBookPackage){
                            while($result = $getBookPackage->fetch_assoc()){
                                $i++;
                                ?>
                                <tr>
                                    <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                    <td class="border-0 align-middle"><strong><?php echo $result['pkg_name'];?></strong></td>
                                    <td class="border-0 align-middle"><strong><?php echo $fm->formatDate($result['date']);?></strong></td>
                                    <td class="border-0 align-middle"><strong><?php echo $result['duration'];?></strong></td>
                                    <td class="border-0 align-middle">
                                        <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#Modal-large-demo">
                                            <a href="?packageBookId=<?php echo $result['package_book_id'];?>"> Package Details </a>
                                        </button>
                                    </td>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!--model end-->

<?php include 'tamp/footer.php'; ?>
</body>

</html>
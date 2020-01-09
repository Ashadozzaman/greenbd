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

                                    <a href="CustomizePackageHistory.php">
                                        <button type="button"  class="btn btn-info">
                                            <i class="fa fa-arrow-left"></i>Back Package History
                                        </button>
                                    </a>
                                    <!-- Shopping cart table -->
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th  scope="col" class="border-0 bg-light">
                                                    <div class="p-2 px-3 text-uppercase">Plant</div>
                                                </th>
                                                <th  scope="col" class="border-0 bg-light">
                                                    <div class="p-2 px-3 text-uppercase">Plant Name</div>
                                                </th>
                                                <th  scope="col" class="border-0 bg-light">
                                                    <div class="p-2 px-3 text-uppercase">Price</div>
                                                </th>
                                                <th  scope="col" class="border-0 bg-light">
                                                    <div class="py-2 text-uppercase">Quantity</div>
                                                </th>

                                                <th  scope="col" class="border-0 bg-light">
                                                    <div class="py-2 text-uppercase">Duration</div>
                                                </th>
                                                <th  scope="col" class="border-0 bg-light">
                                                    <div class="py-2 text-uppercase">Total Price</div>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $cusid = Session::get("cusid");
                                            if (!isset($_GET['packageBookId']) || $_GET['packageBookId'] == 'NULL'){
                                                echo "<script>window.location = 'customizePackagehistory.php';</script>";
                                            }else{
                                                $id = $_GET['packageBookId'];
                                            }
                                            $getorder = $pkgCart->showPackageDetails($cusid,$id);
                                            if($getorder){
                                                while($result = $getorder->fetch_assoc()){
                                                    ?>
                                                    <tr>
                                                        <td scope="row" class="border-0">
                                                            <div class="p-2">
                                                                <img src="admin/<?php echo $result['image'];?>" alt="" style="height: 70px; width: 75px;" class="img-fluid rounded shadow-sm">

                                                            </div>
                                                        </td>
                                                        <td class="border-0 align-middle"><strong><?php echo $result['plant_name'];?></strong></td>
                                                        <td class="border-0 align-middle"><strong><?php echo $result['price'];?></strong></td>
                                                        <td class="border-0 align-middle"><strong><?php echo $result['quantity'];?> Piece</strong></td>
                                                        <td class="border-0 align-middle"><strong><?php echo $result['duration'];?> Days</strong></td>
                                                        <td class="border-0 align-middle"><strong>৳<?php echo $result['total_price'];?></strong></td>
                                                    </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End -->
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
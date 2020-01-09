<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
<!-- ##### Right Side Cart Area ##### -->
<?php
    if (!isset($_GET['packageBookId']) && $_GET['packageBookId'] == "NULL"){
        echo "<script>window.location = 'package_page.php ';</script>";
    }else{
        $pb_id = $_GET['packageBookId'];
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
                    <h2>Package Details</h2>
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

                                    <div class="tab-content py-4">
                                        <a href="package_page.php">
                                            <button type="button"  class="btn btn-info">
                                                <i class="fa fa-arrow-left" aria-hidden="true"></i>Back
                                            </button>
                                        </a>
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
                                                            <div class="py-2 text-uppercase">Plant Quantity</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Initial</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Monthly</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Yearly</div>
                                                        </th>
                                                        <th  scope="col" class="border-0 bg-light">
                                                            <div class="py-2 text-uppercase">Max Quantity</div>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $cusid = Session::get("cusid");
                                                    $i = 0;
                                                    $getBookPackage = $pkg->getBookPackageDetails($cusid,$pb_id);
                                                    if($getBookPackage){
                                                        while($result = $getBookPackage->fetch_assoc()){
                                                            $i++;
                                                            ?>
                                                            <tr>
                                                                <td class="border-0 align-middle"><strong><?php echo $i ;?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['pkg_name'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['plant_quantity'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['Initial_cost'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['monthly_cost'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['yearly_cost'];?></strong></td>
                                                                <td class="border-0 align-middle"><strong><?php echo $result['max_plant'];?></strong></td>
                                                            </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--/row-->
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

<?php include 'tamp/footer.php'; ?>
</body>

</html>
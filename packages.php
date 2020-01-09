<!DOCTYPE html>
<html lang="en">
<?php include 'tamp/header.php'; ?>

<!-- ##### Right Side Cart Area ##### -->
<?php include 'tamp/carts.php'; ?>
<!-- ##### Right Side Cart End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area breadcumb-style-two bg-img" style="background-image: url(img/01.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Fixed Packages Here</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Wrapper Area Start ##### -->
<div class="blog-wrapper section-padding-80">
    <div class="container">
        <div class="row">
            <?php
                $getallpackages = $pkg->getpackage();
                if($getallpackages){
                    while ($row = $getallpackages->fetch_assoc()){
                        ?>

            <!-- Single Blog Area -->
            <div class="col-12 col-lg-6">
                <div class="single-blog-area mb-50">
                    <img style="height: 300px;" src="admin/<?php echo $row['image'];?>" alt="">
                    <!-- Post Title -->
                    <div class="post-title">
                        <a style="text-transform: uppercase;" href="#"><h3><?php echo $row['pkg_name'];?></h3></a>
                        <p style="font-weight: bold;">Initial Cost: <?php echo $row['Initial_cost'];?> Taka</p>
                    </div>
                    <!-- Hover Content -->
                    <div class="hover-content">
                        <!-- Post Title -->
                        <div class="hover-post-title">
                            <h2 style="text-transform: uppercase;"><?php echo $row['pkg_name'];?></h2>
                        </div>
                        <p><?php echo $fm->textShorten($row['pkg_description'],100) ?></p>
                        <a href="singlepackage.php?pkg_id=<?php echo $row['pkg_id'] ?> ">Package Details <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <?php }} ?>

        </div>
    </div>
</div>
<!-- ##### Blog Wrapper Area End ##### -->

<?php include 'tamp/footer.php';?>
</body>

</html>
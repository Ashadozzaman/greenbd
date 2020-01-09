<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/category.php';?>
<?php
    $cat = new Category();
    if (isset($_GET['delcat'])) {
        $id = $_GET['delcat'];
        $delcat = $cat->delcatbyid($id);
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
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1> <span class="table-project-n">Category</span> List</h1>
                                </div>

                                <?php
                                if (isset($delcat)) {
                                    echo $delcat;
                                }
                                ?> 
                            </div>
                             <div class="product-status-wrap drp-lst">
                                    <div class="asset-inner">
                                        <table>
                                        <thead>
                                            <tr>
                                                <th data-field="id">No</th>
                                                <th data-field="name" data-editable="true">Category Name</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $getcat = $cat->getcategory();
                                                    if ($getcat) {
                                                        $i = 0;
                                                        while ($result = $getcat->fetch_assoc()) {
                                                            $i++;
                                                             ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $result['cat_name'] ?></td>
                                                    <td class="datatable-ct">
                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a onclick="return confirm('Are you sure to delete this!!')" href="catlist.php?delcat=<?php echo $result['cat_id'];?>"><i class="fa fa-trash-o"></i></a></button>
                                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="editcat.php?catid=<?php echo $result['cat_id'];?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                                    </td>
                                                </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
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
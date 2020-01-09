<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/brand.php';?>
<?php
    $bnd = new Brand();
    if (isset($_GET['delbnd'])) {
        $id = $_GET['delbnd'];
        $delbnd= $bnd->delbndbyid($id);
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
                                    <h1><span class="table-project-n">Brand</span> List</h1>
                                </div>

                                <?php
                                if (isset($delbnd)) {
                                    echo $delbnd;
                                }
                                ?> 
                            </div>

                            <div class="product-status-wrap drp-lst">
                                    <div class="asset-inner">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Brand Name</th>
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $getbnd = $bnd->getbrand();
                                                        if ($getbnd) {
                                                            $i = 0;
                                                            while ($result = $getbnd->fetch_assoc()) {
                                                                $i++;
                                                         ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $result['brand_name'] ?></td>
                                                        <td class="datatable-ct">
                                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a onclick="return confirm('Are you sure to delete this!!')" href="?delbnd=<?php echo $result['brand_id'];?>"><i class="fa fa-trash-o"></i></a></button>
                                                            <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="editbnd.php?bndid=<?php echo $result['brand_id'];?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
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
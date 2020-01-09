<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/package.php';?>
<?php include_once '../helpers/format.php';?>
<?php
    $fm  = new Format();
    $pkg = new Package();
    if (isset($_GET['delpkg'])) {
        $id = $_GET['delpkg'];
        $delpkg= $pkg->delpkgbyid($id);
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
                                <h1>Package <span class="table-project-n">List</span> </h1>
                                <?php
                                if (isset($delpkg)) {
                                    echo $delpkg;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="15%">Name</th>
                                        <th width="5%">Quantity</th>
                                        <th width="5%">Initial Cost</th>
                                        <th width="5%">Monthly Cost</th>
                                        <th width="5%">Yearly Cost</th>
                                        <th width="20%" >Service</th>
                                        <th width="20%">Description</th>
                                        <th width="10%">Image</th>
                                        <th width="10%" data-field="action">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getpackage = $pkg->getpackage();
                                    if ($getpackage) {
                                        $i = 0;
                                        while ($result = $getpackage->fetch_assoc()) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $result['pkg_name'] ?></td>
                                                <td><?php echo $result['plant_quantity'] ?></td>
                                                <td><?php echo $result['Initial_cost'] ?></td>
                                                <td><?php echo $result['monthly_cost'] ?></td>
                                                <td><?php echo $result['yearly_cost'] ?></td>
                                                <td><?php echo $fm->textShorten($result['pkg_service'],100) ?></td>
                                                <td><?php echo $fm->textShorten($result['pkg_description'],100) ?></td>
                                                <td><img src="<?php echo $result['image']; ?>" style="height:40px; width:50px;" />
                                                </td>
                                                <td class="datatable-ct">
                                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a onclick="return confirm('Are you sure to delete this!!')" href="?delpkg=<?php echo $result['pkg_id'];?>"><i class="fa fa-trash-o"></i></a></button>
                                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="editpackage.php?packageid=<?php echo $result['pkg_id'];?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
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
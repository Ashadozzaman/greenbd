<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php
    $pro = new Product();
    $fm  = new Format();
?> 
<?php
    if (isset($_GET['delpro'])){
        $id = $_GET['delpro'];
        $delproduct = $pro->delProductbyid($id);
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
                                    <h1>Products <span class="table-project-n">List</span> </h1>
                                    <?php
                                        if (isset($delproduct)) {
                                            echo $delproduct;
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">ID</th>
                                                <th data-field="name" data-editable="true">Product Name</th>
                                                <th data-field="email" data-editable="true">Category Name</th>
                                                <th data-field="phone" data-editable="true">Brand Name</th>
                                                <th data-field="complete">Description</th>
                                                <th data-field="task" >Image</th>
                                                <th data-field="price" data-editable="true">Price</th>
                                                <th data-field="stock" data-editable="true">Stock</th>
                                                <th data-field="remaining_days">Days</th>
                                                <th data-field="Discount">Discount</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $getpro = $pro->getallpro();
                                                $i = 0;
                                                if ($getpro) {
                                                    while ($result = $getpro->fetch_assoc()) {
                                                        $i++;
                                                        $pro_id = $result['pro_id'];
                                                        if ($result['remaining_days'] < 0){
                                                            $offDiscount = $pro->DiscountOffBy($pro_id);
                                                        }
                                                ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['pro_name']; ?></td>
                                                <td><?php echo $result['cat_name']; ?></td>
                                                <td><?php echo $result['brand_name']; ?></td>

                                                <td class="datatable-ct"><?php echo $fm->textShorten($result['body'],20); ?>
                                                </td>
                                                <td><img src="<?php echo $result['image']; ?>" style="height:40px; width:50px;" />
                                                </td>
                                                <td>$<?php echo $result['price']; ?></td>
                                                <td><?php echo $result['stock']; ?></td>
                                                <td><?php echo $result['remaining_days']; ?></td>
                                                <td>
                                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="add-discount.php?discount=<?php echo $result['pro_id']; ?>" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></button>
                                                    <?php if ($result['discount'] > 0){?>
                                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="discount-list.php?discountID=<?php echo $result['pro_id']; ?>" ><i class="fa fa-eye" aria-hidden="true"></i></a></button>
                                                    <?php } ?>
                                                </td>
                                                <td class="datatable-ct">
                                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a onclick="return confirm('Are you sure to delete this!!')" href="?delpro=<?php echo $result['pro_id']; ?>"><i class="fa fa-trash-o"></i></a></button>

                                                    <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><a href="editproduct.php?proId=<?php echo $result['pro_id']; ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></button>
                                                </td>
                                            </tr>
                                         <?php } } ?>
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
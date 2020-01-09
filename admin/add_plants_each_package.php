<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
<?php include_once '../helpers/format.php';?>
<?php include_once '../classes/package.php';?>
<?php
$pkg = new Package();
if (!isset($_GET['package_book_id']) && $_GET['cus_id'] == "NULL") {
    echo "<script>window:location = 'book-packageList.php';</script>";
}else{
    $pkg_id = $_GET['package_id'];
    $package_book_id = $_GET['package_book_id'];
    $cus_id = $_GET['cus_id'];
}


//    if ($_SERVER['REQUEST_METHOD'] == "POST") {
//        $output = '';
//        foreach ($_POST['quantity'] as $key => $value){
////            echo "<script>alert('gfjhkhk');</script>";
//            $output.= $key . ": " . $value;
//        }
//        echo "<script>alert('$output');</script>";
////        $quantity = $_POST['quantity'];
////        $add_tree_package = $pkg->add_plants_In_package($quantity,$id,$pkg_id);
//
//    }

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
                            <form action="" method="post" id="demo1-upload" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Serial No</td>
                                        <td>Plants Name</td>
                                        <td>Plants Image</td>
                                        <td>Plants Quantity</td>
                                    </tr>
                                    <?php
                                    $pkg = new Package();
                                    $fm = new Format();
                                    $get_plants = $pkg->get_all_plants();
                                    $i = 0;
                                    if ($get_plants) {
                                        while ($result = $get_plants->fetch_assoc()) {
                                            $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td width="35%"><?php echo $result['plant_name'];?></td>
                                                <td width="50%"><img style="height:100px;width:100px; " src="<?php echo $result['image'];?>" alt=""></td>
                                                <td width="15%">
                                                    <div class="form-group">
                                                        <input data-plant-id="<?=$result['plant_id']?>" data-package-id="<?=$pkg_id?>" data-book-id="<?= $package_book_id ?>" data-cus-id="<?=$cus_id?>" name="quantity" type="number" min="1" class="form-control quantity" placeholder="Enter Quantity">
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } } ?>
                                </table>
                                <div class="col-12 mb-4">
                                    <input type="submit" style="float:right ;" class="btn btn-primary btn-lg float-right add-plant-to-package" name="submit_plant" value="Add plants Specific Packages" onclick="addPlant();">
                                </div>
                            </form>
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
<script>
    function addPlant() {
        let items = [];
        let output = '';
        $(".quantity").each(function(){
            if($(this).val()!=''){
                let plant_id = $(this).attr('data-plant-id');
                let package_id = $(this).attr('data-package-id');
                let package_book_id = $(this).attr('data-book-id');
                let cus_id = $(this).attr('data-cus-id');
                let quantity = $(this).val();
                let item = {
                    "plant_id":plant_id,
                    "package_id":package_id,
                    "package_book_id":package_book_id,
                    "cus_id":cus_id,
                    "quantity":quantity
                }
                items.push(item)

                // output +='Package ID: '+package_id+'; Plant ID: '+plant_id+'; Quantity: ' + quantity+"\n";
            }
        });
        if (Array.isArray(items) && items.length) {
            // items.forEach(function(entry) {
            //     output +="Package ID: "+entry.package_id + "; Plant ID: " +entry.plant_id+"; Quantity: " +entry.quantity+"\n";
            // });
            // alert(output);
            let test = 'Test';
            $.ajax({
                url: 'plant_input_each_package.php',
                type: 'post',
                data: {items: items},
                beforeSend: function () {
                    $('.add-plant-to-package').attr("disabled","disabled");
                },
                success:function(output){
                    if(output.trim() == 'ok'){
                        alert("Tanks Sir!! Plants Added Successfully");
                    }else{
                        alert(output);
                        $('.quantity').val('');
                    }
                    $('.add-plant-to-package').removeAttr("disabled");
                },
                error: function(request, status, error){
                    alert(error);
                }
            });
        }else {
            alert("Sorry Boss! I am empty.");
        }


        // console.log($('.quantity').val());
    }
</script>
</body>

</html>
<!--$('.quantity').val('');-->
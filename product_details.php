
<!DOCTYPE html>
<html lang="en">

<?php include 'tamp/header.php'; ?>
    <?php
        if (!isset($_GET['pro_id']) || $_GET['pro_id'] == NULL ) {
         echo "<script> window:location = '404.php';</script>";  
        }else{
            $id = $_GET['pro_id'];
            $cat_id = $_GET['cat_id'];
        } 


    ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $addtocart = $cart->cartadd($quantity,$id);


    }

?>


  <!--   <?php
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_review'])) {
           $cus_name  = $_POST['cus_name'];
           $cus_email = $_POST['cus_email'];
           $review    = $_POST['review'];
           $rated_value = $_POST['rated_value'];
           $pro_id = $_POST['pro_id'];
           $addreview = $pro->reviewadd($_POST);

        }
    ?> -->
    <!-- ##### Right Side Cart Area ##### -->
<?php include 'tamp/carts.php'; ?>
    <!-- ##### Right Side Cart End ##### -->
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">
     <?php 
            $getproDetails = $pro->getDbyId($id);
            if ($getproDetails) {
                while ($result = $getproDetails->fetch_assoc()) {
            ?>

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <img src="admin/<?php  echo $result['image']; ?>" alt="">
           
        </div>
   
        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span style="color:red; font-size:18px;">
                <?php
                    if (isset($addtocart )) {
                      echo $addtocart ;
                    }
                ?>
            </span>
            <span><?php echo $result['brand_name'];?></span>
            <a href="cart.php">
                <h2><?php echo $result['pro_name'];?></h2>
            </a>
            <!-- =============Ratting=========== -->
            <div class="rating-avg">
                <?php
                    $getratting = $pro->getAllratting($id);
                    if (isset($getratting)) {
                        while ($row = $getratting->fetch_assoc()){

                ?>
                <div class="row">
                <div class="col-sm-4">
                    <div id="overall-ratting-intro" data-rating="<?php echo round($row['Avg_ratting'],2); ?>">
                    </div>
                </div>
                    <div class="col-sm-8"><span style="font-size: 20px; color: #45562ecf;font-weight: bold;"><?php echo round($row['Avg_ratting'],2); ?>%</span></div>
                </div>
            <?php }} ?>
            </div>
            <!-- ===================end ratting================ -->
            <?php if ($result['discount'] > 0){?>
                <p class="product-price"><span class="old-price">৳ <?php echo $result['price']; ?></span>
                    ৳<?php echo ($result['price']-($result['price']*($result['discount']/100))); ?></p>
            <?php }else{ ?>
                <p class="product-price">
                    ৳<?php echo $result['price']; ?></p>
            <?php } ?>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                </div>
                <div class="select-box d-flex mt-50 mb-30" class="mr-5" />
                    <span style="width: 20%; font-size: 16px;">Quantity</span>
                    <input style=" font-size: 16px;border: 2px solid #ebebeb;" type="number" name="quantity" value="1" min="0" max="100" />
                </div>
                
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <button type="submit" name="submit" value="5" class="btn essence-btn" >Add to cart</button>
                    <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
    <?php } } ?>

    </section>
<!-- =============================Start============================= -->
<?php
    if (isset($addreview)) {
        echo "Add success";
    }
?>
 <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active ">Description</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Product Details</a>
                </li>
                <li class="nav-item">
                                                  
                        <?php
                            $getratting = $pro->getAllratting($id);
                            if (isset($getratting)) {
                                while ($row = $getratting->fetch_assoc()){
                           
                        ?>                           
                    <a href="" data-target="#reviews_tab" data-toggle="tab" class="nav-link">Review & Rating (<?php echo $row['total_review'];?>)
                    </a>
                <?php } }?>
                </li>
            </ul>
            <div class="tab-content py-4">
              <!-- recent order -->
                <div class="tab-pane active" id="profile">
                    <div class="row">
                         <?php 
                            $getproDetails = $pro->getDbyId($id);
                            if ($getproDetails) {
                                while ($result = $getproDetails->fetch_assoc()) {
                            ?>
                        <div style="margin-left: 15px;"><?php echo $result['body'];?></div>
                    <?php } } ?>
                    </div>
                    <!--/row-->
                </div>
                <!-- end -->
                <!-- order history -->
                <div class="tab-pane" id="messages">
                    
                </div>
                <!-- ===================review start====================== -->

                <div class="tab-pane" id="reviews_tab">
                    <div class="row">
                        <!-- Rating -->
                        <div class="col-md-3">
                            <div id="rating">
                                <div class="rating-avg">
                                    <?php
                                        $getratting = $pro->getAllratting($id);
                                        if (isset($getratting)) {
                                            while ($row = $getratting->fetch_assoc()){
                                       
                                    ?>
                                    <div class="row">
                                    <div class="col-sm-7">
                                        <div class="rating">
                                        <div id="overall-ratting" data-rating="<?php echo round($row['Avg_ratting'],2); ?>">
                                            
                                        </div>
                                        </div>
                                    </div>
                                        <div class="col-sm-5"><span style="font-size: 20px; color: #45562ecf;font-weight: bold;"><?php echo round($row['Avg_ratting'],2); ?>%</span></div>
                                    </div>
                                <?php }} ?>
                                </div><br>
                                <ul class="rating">
                                    <h5 style="color: #45562ecf;">Total Ratting</h5>
                                    <?php
                                    $resultRating = $pro->getsingleratting($id);
                                        if ($resultRating) {
                                            while ( $pwr=$resultRating->fetch_assoc()) {?>
                                    <li>
                                        <div class="rating-stars point_wise_rating" data-rating="<?=$pwr['ratings']?>">
                                            
                                        </div>
                                        <!-- <span class="sum"><?=$pwr['per_total_rating']?></span> -->
                                        <div class="rating-progress">
                                            <div style="width: <?=$pwr['percentage']?>%;"></div>
                                        </div>
                                    </li>
                                    <?php }  } ?>   
                                </ul>
                            </div>
                        </div>
                        <!-- /Rating -->

                            <!-- Reviews -->
                            <div class="col-md-6">
                                <div id="reviews" style="max-height: 480px; overflow-y: scroll;">
                                    <ul class="reviews">
                                        <?php
                                        $getReview = $pro->getreviewByID($id);
                                        if ($getReview) {
                                            while ($Review = $getReview->fetch_assoc()) {
                                        ?>
                                        <li> 
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 class="name"><?=$Review['cus_name']?></h5>
                                                <p class="date"><?=$Review['ratingDate']?></p>
                                                <div class="review-rating" data-rating="<?=$Review['ratings']?>"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <p><?=$Review['review']?></p>
                                            </div>
                                        </div>
                                        </li>
                                        <?php } } ?>                                                  
                                    </ul>                                               
                                </div>
                            </div>
                            <!-- /Reviews -->

                            <!-- Review Form -->
                            <div class="col-md-3">
                                <?php if(isset($_SESSION['cusid']) && $_SESSION['cusid'] == TRUE){ ?>
                                <p id="thanksmsg"></p>
                                <div id="review-form">
                                    <form method="POST" id="postReviewForm">
                                        <input type="hidden" name="pro_id" id="pro_id" value="<?php if(isset($id)) echo $id;?>">
                                    <div class="col-md-12 mb-3">
                                        <input class="form-control" class="input" type="text" name="cus_name" id="cus_name" value="<?php if(isset($_SESSION['fname'])) echo $_SESSION['fname'];?>" readonly>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <input class="form-control" class="input" type="email" name="cus_email" id="cus_email" value="<?php if(isset($_SESSION['email']))  echo $_SESSION['email'];?>" readonly>
                                    </div>
                                     <div class="col-md-12 mb-3">
                                        <textarea class="form-control" class="input" name="user_review" id="user_review" placeholder="Your Review"></textarea>
                                    </div>

                                     <div class="col-md-12 mb-3">

                                        <div>
                                            <p>Your Rating: </p>
                                            <span class="user-rating" data-rating="0"></span>
                                            <span class="pull-right"><h3 class="live-rating"></h3></span>
                                            <input type="hidden" name="rated_value" id="rated_value">
                                            
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-3">

                                        <button class="btn btn-primary" id="submit_review" name="submit_review" onclick="submitReviews()">Submit</button>
                                    </div>
                                    </form> 
                                    
                                     
                                </div>
                                <?php }else{ ?>
                                    <div class="text-center">
                                        <h4>To Post Review & Ratings <a class="btn btn-primary signin_link">SIGN IN</a> First</h4>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- /Review Form -->
                        </div>
                    <!--/row-->
                </div>
                <!-- =============================End Review============================= -->
                
            </div>
        </div>
<!-- ============================End ============================== -->
<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Feature Product ##### -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">
                    <?php
                    $getRelatedproduct = $pro->relatedproduct($cat_id);
                    if ($getRelatedproduct) {
                        while ($result = $getRelatedproduct->fetch_assoc()) {
                            ?>
                            <!-- Single Product -->
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img style="width:255px; height:348px;"; src="admin/<?php  echo $result['image']; ?>" alt="">
                                    <!-- Hover Thumb -->
                                    <img class="hover-img" style="width:255px; height:348px;"; src="admin/<?php  echo $result['image']; ?>" alt="">
                                    <!-- Favourite -->
                                    <div class="product-favourite">
                                        <a href="#" class="favme fa fa-heart"></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <span>topshop</span>
                                    <a href="single-product-details.html">
                                        <h6><?php echo $result['pro_name'];?></h6>
                                    </a>
                                    <p class="product-price"><?php echo $result['price'];?></p>

                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <!-- Add to Cart -->
                                        <div class="add-to-cart-btn">
                                            <a href="#" class="btn essence-btn">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->
    
    <!-- ##### Single Product Details Area End ##### -->
<?php include 'tamp/footer.php'; ?>
<script>
$(function() {
  $('#overall-ratting-intro').starRating({
    starSize: 30,
    strokeWidth: 0,
    strokeColor: 'black',
    useGradient: false,
    readOnly: true,
  });

  $('.book-rating').starRating({
    starSize: 20,
    strokeWidth: 0,
    strokeColor: 'black',
    useGradient: false,
    readOnly: true,
  });

  //overall rating
  $('#overall-ratting').starRating({
    starSize: 30,
    strokeWidth: 0,
    strokeColor: 'black',
    useGradient: false,
    readOnly: true,
  });


  //point_wise_rating
  $('.point_wise_rating').starRating({
    starSize: 20,
    strokeWidth: 0,
    strokeColor: 'black',
    useGradient: false,
    readOnly: true,
  });

  // specify the gradient start and end for the selected stars
  $(".user-rating").starRating({
    starSize: 30,
    strokeWidth: 0,
    strokeColor: 'black',
    useGradient: false,
    disableAfterRate: false,
    emptyColor: 'lightgray',
    hoverColor: 'gold',
    activeColor: 'cornflowerblue',
    useGradient: false,
    onHover: function(currentIndex, currentRating, $el){
      $('.live-rating').text(currentIndex);
    },
    onLeave: function(currentIndex, currentRating, $el){
      $('.live-rating').text(currentRating);
    },
    callback: function(currentRating, $el){
        $('#rated_value').val(currentRating);
    }
  });

});
</script>
<script type="text/javascript">
    function submitReviews(){
        var pro_id = $('#pro_id').val();
        var cus_name = $('#cus_name').val();
        var cus_email = $('#cus_email').val();
        var review = $('#user_review').val();
        var ratedValue = $('#rated_value').val();
        if (cus_name.trim() == '') {
            alert('Please Enter Customer name');
            $('#cus_name').focus();
            //return false;
        }else if(cus_email.trim() == ''){
            alert('Please enter email');
            $('#cus_email').focus();
           // return false;
        }else if(review.trim() == ''){
            $('#thanksmsg').html('<span style="color:red;">Warning! Please Enter Your Review.</span>');
           // $('#review').focus();
            //return false;
        } else if(ratedValue.trim() == ''){
            $('#thanksmsg').html('<span style="color:red;">Warning! Please Rate This.</span>');
            //$('#rated-value').focus();
            //return false;
        } else{
            var fd = new FormData($('#postReviewForm')[0]);
            $.ajax({
                url: 'pro_reviews.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#submit_review').attr("disabled","disabled");
                },
                success:function(msg){
                    if(msg == 'ok'){
                        $('#cus_name').val('');
                        $('#cus_email').val('');
                        $('#user_review').val('');
                        swal({
                            text: "Thanks For Your Review And Ratings.",
                            icon: "success",
                            buttons: {Ok:true,},
                        })
                        .then((value) => {
                            switch (value) {
                                case "Ok": location.reload(true); break;
                                default: break;
                            }
                        });
                        // $('#thanksmsg').html('<span style="color:green;">Thanks For Your Review And Ratings.</span>');
                    }else{
                        $('#rated_value').val('');
                        
                        $('#thanksmsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                    }
                    $('#submit_review').removeAttr("disabled");
                }
            });

        }  
    }
</script>


</body>

</html>
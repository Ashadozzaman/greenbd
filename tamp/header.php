<?php
    // include_once 'lib/Session.php';
    // Session::init();
    // include 'lib/database.php';
    // include 'helpers/format.php';

    $realpath = realpath(dirname(__FILE__));
    include ($realpath.'/../lib/Session.php');
    Session::init();
    $realpath = realpath(dirname(__FILE__));
    include_once ($realpath.'/../lib/database.php');
    include_once ($realpath.'/../helpers/format.php');

    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
    });
    $pro = new Product();
    $cart = new Cart();
    $cus = new Customer();
    $fm = new Format();
    $pkg = new Package();
    $pkgCart = new PackageCart();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Green Bangladesh</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/finallogo.jpg">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <!-- chatting -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="css/style.css"/>
        <link type="text/css" rel="stylesheet" href="css/theme-custom.css"/>

    <!-- Jquery Star Ratting -->
    <script src="custom/js/jquery.min.js"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
<!--    <link rel="stylesheet" type="text/css" href="custom/js/jquery.min.js">-->
    <link rel="stylesheet" type="text/css" href="custom/css/star-rating-svg.css">




    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img style="height:50px;width: 50px; " src="img/core-img/finallogo.jpg" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <?php
                            $cus_id = Session::get("cusid");
                            if ($cus_id){ ?>
                                <li><a href="#">Details</a>
                                    <ul class="dropdown">
                                        <?php
                                        $cusid = Session::get("cusid");
                                        $cqorder = $cart->showOrderpage($cusid);
                                        if ($cqorder) { ?>
                                            <li><a href="orderpage.php">Orders</a></li>
                                        <?php } ?>
                                        <?php
                                        $cusid = Session::get("cusid");
                                        $show_package = $pkg->showPackagepage($cusid);
                                        if ($show_package) { ?>
                                            <li><a href="package_page.php">Packages</a></li>
                                        <?php } ?>
                                        <?php
                                        $cusid = Session::get("cusid");
                                        $show_package = $pkg->showPackagepage($cusid);
                                        if ($show_package) { ?>
                                            <li><a href="customizepackagehistory.php">Customize Packages</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>

                            <?php } ?>

                            <?php
                            $ctchq = $cart->showCart();
                            if ($ctchq) { ?>
                               <li><a href="cartpage.php">Cart</a></li>
<!--                                <li><a href="checkout.php">Checkout</a></li>-->
                            <?php } ?>
                            <?php
                            $ctchq = $pkgCart->showCart();
                            if ($ctchq) { ?>
                                <li><a href="packageCartPage.php">Package Cart</a></li>
<!--                                <li><a href="checkout.php">Checkout</a></li>-->
                            <?php } ?>

                            <li><a href="contact.php">Contact</a></li>
                           
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div>
                  <!-- Cart Area -->

               <?php
                     $getCart = $cart->showCart();
                     if ($getCart) {
                         $cc = $getCart->num_rows;
                     }
                ?>
                <?php if(isset($cc) > '0'){ ?>
                    <div class="cart-area">
                        <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt="">
                            <span><?php echo $cc;?></span>
                        </a>
                     </div>
                <?php }else{ ?>
                     <div class="cart-area">
                        <a href="#" ><img src="img/core-img/bag.svg" alt="">
                          <span>0</span>
                        </a>
                     </div>
                <?php } ?>
                <!-- User Login Info -->
                <?php
                if (isset($_GET['ctID'])) {
                    $delcart = $cart->cartdel();
                    $delcart = $pkgCart->cartdel();

                    Session::destroy();
                }
                ?>


                <?php
                $login = Session::get("cuslog");
                if ($login  == true) { ?>
                    <div class="classynav">
                        <ul>
                            <li><a href="#"><img style="
                                 width: 50px;
                                height:50px;
                                border-radius: 50%;
                                "
                                                 src="admin/<?php echo Session::get('image'); ?>" alt=""></a>
                                <ul class="dropdown" >
                                    <li><a href="?ctID=<?php echo Session::get("cusid"); ?>">Logout</a></li>
                                    <li><a href="profile.php">Profile</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
              <?php }else{ ?>
                <div class="user-login-info">
                    <a href="login.php"><img src="img/core-img/user.svg" alt=""></a>
                </div>
            <?php } ?>
              
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

 
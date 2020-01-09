
<?php include 'tamp/link.php';?>
<?php
    include "../classes/Adminlogin.php";
    $al = new Adminlogin();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $ademail = $_POST['ademail'];
        $adpass = $_POST['adpass'];

        $loginCheck = $al->adminlogin($ademail,$adpass);
    }

?>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>PLEASE LOGIN TO APP</h3>
				<p>This is the best app ever!</p>
			</div>
            <?php
                    if(isset($loginCheck)) {
                        echo $loginCheck;
                    }
                ?>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="" method="post" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" value="" name="ademail"  class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" value="" name="adpass"  class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                            <!-- <a class="btn btn-default btn-block" href="#">Register</a> -->
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2018. Green Bangladesh <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
			</div>
		</div>   
    </div>
<?php include 'tamp/scriptlink.php';?>
   
</body>

</html>
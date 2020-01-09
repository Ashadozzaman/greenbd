<?php include 'tamp/link.php';?>
<?php include 'tamp/sidber.php';?>
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
        <!-- Charts Start-->
        <div class="charts-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="charts-single-pro responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Basic Line Chart</h2>
                                <p>A bar chart provides a way of showing data values. It is sometimes used to show trend data. we create a bar chart for a single dataset and render that in our page.</p>
                            </div>
                            <div id="basic-chart">
                                <canvas id="basiclinechart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="charts-single-pro">
                            <div class="alert-title">
                                <h2>Line Chart Multi Axis</h2>
                                <p>A bar chart provides a way of showing data values. It is sometimes used to show trend data. we create a bar chart for a single dataset and render that in our page.</p>
                            </div>
                            <div id="axis-chart">
                                <canvas id="linechartmultiaxis"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="charts-single-pro mg-tb-30 responsive-mg-b-0">
                            <div class="alert-title">
                                <h2>Line Chart Stepped</h2>
                                <p>A bar chart provides a way of showing data values. It is sometimes used to show trend data. we create a bar chart for a single dataset and render that in our page.</p>
                            </div>
                            <div id="stepped-chart">
                                <canvas id="linechartstepped"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="charts-single-pro mg-tb-30">
                            <div class="alert-title">
                                <h2>Line Chart Interpolation</h2>
                                <p>A bar chart provides a way of showing data values. It is sometimes used to show trend data. we create a bar chart for a single dataset and render that in our page.</p>
                            </div>
                            <div id="polation-chart">
                                <canvas id="linechartinterpolation"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="charts-single-pro responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Chart Line styles</h2>
                                <p>A bar chart provides a way of showing data values. It is sometimes used to show trend data. we create a bar chart for a single dataset and render that in our page.</p>
                            </div>
                            <div id="styles-chart">
                                <canvas id="linechartstyles"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="charts-single-pro">
                            <div class="alert-title">
                                <h2>Chart Line point circle</h2>
                                <p>A bar chart provides a way of showing data values. It is sometimes used to show trend data. we create a bar chart for a single dataset and render that in our page.</p>
                            </div>
                            <div id="circle-chart">
                                <canvas id="linechartpointcircle"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="charts-single-pro mg-t-30">
                            <div class="alert-title">
                                <h2>Chart Line Point rectRot</h2>
                                <p>A bar chart provides a way of showing data values. It is sometimes used to show trend data. we create a bar chart for a single dataset and render that in our page.</p>
                            </div>
                            <div id="rectRot-chart">
                                <canvas id="linechartpointrectRot"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="charts-single-pro mg-t-30">
                            <div class="alert-title">
                                <h2>Chart Line point cross</h2>
                                <p>A bar chart provides a way of showing data values. It is sometimes used to show trend data. we create a bar chart for a single dataset and render that in our page.</p>
                            </div>
                            <div id="cross-chart">
                                <canvas id="linechartpointcross"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Charts End-->
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- Charts JS
		============================================ -->
    <script src="js/charts/Chart.js"></script>
    <script src="js/charts/line-chart.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>
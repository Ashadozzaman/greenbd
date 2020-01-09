 <div class="shop_sidebar_area">
                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <!--  Catagories  -->
                        <div class="widget brands mb-50">
                            <!-- Widget Title 2 -->
                            <h6 class="widget-title mb-30">Catagories</h6>
                            <div class="widget-desc">
                                <ul>
                                    <?php 
                                        $cat = new Category();
                                        $getcat = $cat->getcategory();
                                            if ($getcat) {
                                                while ($result = $getcat->fetch_assoc()) {  ?>
                                    <li><a  href="cetagorybase.php?cat_id=<?php echo $result['cat_id'] ?>"><?php echo $result['cat_name'] ?></a></li>     
                                    <?php } } ?>
                                </ul>
                            </div>
                        </div>

                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#shoes" class="collapsed">
                                        <a href="#">shoes</a>
                                        <ul class="sub-menu collapse" id="shoes">

                                    <?php 
                                        $cat = new Category();
                                        $getcat = $cat->getcategory();
                                            if ($getcat) {
                                                while ($result = $getcat->fetch_assoc()) {         
                                     ?>
                                        <li><a href="cetagorybase.php?cat_id=<?php echo $result['cat_id'] ?>"><?php echo $result['cat_name'] ?></a></li>     
                                    <?php } } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget price mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Filter by</h6>
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Price</p>

                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="49" data-max="360" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49" data-value-max="360" data-label-result="Range:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Range: $49.00 - $360.00</div>
                                </div>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget brands mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Brands</p>
                            <div class="widget-desc">
                                <ul>
                                    <?php 
                                    $bnd = new brand();
                                        $getbnd = $bnd->getbrand();
                                            if ($getbnd) { $i = 0;
                                                while ($result = $getbnd->fetch_assoc()) {
                                                   
                                     ?>
                                    <li><a href="brandbase.php?bnd_id=<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></a></li>     
                        <?php } } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
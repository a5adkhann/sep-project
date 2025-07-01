	<?php
	include("./base/mainHeader.php");
	
	?>
	<!-- Slider -->
	<section class="section-slide">
	    <div class="wrap-slick1 rs2-slick1">
	        <div class="slick1">
	            <div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-05.jpg);"
	                data-thumb="images/thumb-01.jpg" data-caption="Women’s Wear">
	                <div class="container h-full">
	                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
	                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
	                            <span class="ltext-202 txt-center cl0 respon2">
	                                Women Collection 2018
	                            </span>
	                        </div>

	                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
	                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
	                                New arrivals
	                            </h2>
	                        </div>

	                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
	                            <a href="product.php"
	                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
	                                Shop Now
	                            </a>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-06.jpg);"
	                data-thumb="images/thumb-02.jpg" data-caption="Men’s Wear">
	                <div class="container h-full">
	                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
	                        <div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
	                            <span class="ltext-202 txt-center cl0 respon2">
	                                Men New-Season
	                            </span>
	                        </div>

	                        <div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
	                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
	                                Jackets & Coats
	                            </h2>
	                        </div>

	                        <div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
	                            <a href="product.php"
	                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
	                                Shop Now
	                            </a>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="item-slick1 bg-overlay1" style="background-image: url(images/slide-07.jpg);"
	                data-thumb="images/thumb-03.jpg" data-caption="Men’s Wear">
	                <div class="container h-full">
	                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
	                        <div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
	                            <span class="ltext-202 txt-center cl0 respon2">
	                                Men Collection 2018
	                            </span>
	                        </div>

	                        <div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight"
	                            data-delay="800">
	                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
	                                NEW SEASON
	                            </h2>
	                        </div>

	                        <div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
	                            <a href="product.php"
	                                class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
	                                Shop Now
	                            </a>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="wrap-slick1-dots p-lr-10"></div>
	    </div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-95 p-b-55">
	    <div class="container">
	        <div class="row">
	            <?php
					$select_query = "SELECT * FROM categories";
					$execute = mysqli_query($connection, $select_query);
					while($fetch_categories = mysqli_fetch_array($execute)){
					?>
	            <div class="col-md-4 p-b-30 m-lr-auto">
	                <!-- Block1 -->
	                <div class="block1 wrap-pic-w">
	                    <img src="./admin/uploads/<?php echo $fetch_categories['category_image']?>" alt="IMG-BANNER">

	                    <a href="products.php?id=<?php echo $fetch_categories['category_id']?>"
	                        class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
	                        <div class="block1-txt-child1 flex-col-l">
	                            <span class="block1-name ltext-102 trans-04 p-b-8">
	                                <?php echo $fetch_categories['category_name']?>
	                            </span>

	                            <span class="block1-info stext-102 trans-04">
	                                New Trend
	                            </span>
	                        </div>

	                        <div class="block1-txt-child2 p-b-4 trans-05">
	                            <div class="block1-link stext-101 cl0 trans-09">
	                                Shop Now
	                            </div>
	                        </div>
	                    </a>
	                </div>

	            </div>
	            <?php
					}
					?>
	        </div>
	    </div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-130">
	    <div class="container">
	        <div class="p-b-10">
	            <h3 class="ltext-103 cl5">
	                Product Overview
	            </h3>
	        </div>

	        <div class="flex-w flex-sb-m p-b-52">
	            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
	                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
	                    All Products
	                </button>

	                <?php
					$select_query = "SELECT * FROM categories";
					$execute = mysqli_query($connection, $select_query);
					while($fetch_categories = mysqli_fetch_array($execute)){
					?>
	                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
	                    data-filter=".<?php echo strtolower($fetch_categories['category_name'])?>">
	                    <?php echo $fetch_categories['category_name']?>
	                </button>
	                <?php
					}
					?>

	            </div>

	            <div class="flex-w flex-c-m m-tb-10">

	                <form method="GET" class="mb-4" class="form">
	                    <select name="price_range" onchange="this.form.submit()" class="form-control">
	                        <option value="">Filter by Price</option>
	                        <option value="0-1000" <?php if (@$_GET['price_range'] == '0-1000') echo 'selected'; ?>>Under
	                            1000</option>
	                        <option value="1000-3000" <?php if (@$_GET['price_range'] == '1000-3000') echo 'selected'; ?>>
	                            1000 - 3000</option>
	                        <option value="3000-5000" <?php if (@$_GET['price_range'] == '3000-5000') echo 'selected'; ?>>
	                            3000 - 5000</option>
	                        <option value="5000+" <?php if (@$_GET['price_range'] == '5000+') echo 'selected'; ?>>Above
	                            5000</option>
	                    </select>
	                </form>


	            </div>
	        </div>

	        <div class="row isotope-grid">

	            <?php
				$price_filter = '';

				if (isset($_GET['price_range']) && $_GET['price_range'] != '') {
					$range = $_GET['price_range'];

					if ($range == '0-1000') {
						$price_filter = "AND product_price <= 1000";
					} elseif ($range == '1000-3000') {
						$price_filter = "AND product_price BETWEEN 1000 AND 3000";
					} elseif ($range == '3000-5000') {
						$price_filter = "AND product_price BETWEEN 3000 AND 5000";
					} elseif ($range == '5000+') {
						$price_filter = "AND product_price > 5000";
					}
				}

				$select_query = "SELECT * FROM products 
				INNER JOIN categories ON category_id = product_category_id 
				WHERE 1 $price_filter";

			$execute = mysqli_query($connection, $select_query);
			while($fetch_products = mysqli_fetch_array($execute)){

			?>
	            <form method="POST" action="shoping-cart.php">
	                <input type="hidden" name="product_id" value="<?php echo $fetch_products['product_id']?>">
	                <input type="hidden" name="product_name" value="<?php echo $fetch_products['product_name']?>">
	                <input type="hidden" name="product_price" value="<?php echo $fetch_products['product_price']?>">
	                <input type="hidden" name="product_image" value="<?php echo $fetch_products['product_image']?>">
	                <input type="hidden" name="product_description"
	                    value="<?php echo $fetch_products['product_description']?>">
	                <input type="hidden" name="product_quantity" value="1">
	                <a href="product-detail.php?id=<?php echo $fetch_products['product_id']?>">
	                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo strtolower($fetch_products['category_name'])?>"
	                        data-price="<?php echo $fetch_products['product_price']; ?>">
	                        <!-- Block2 -->
	                        <div class="block2">
	                            <div class="block2-pic hov-img0">
	                                <img src="./admin/uploads/<?php echo $fetch_products['product_image']?>"
	                                    alt="IMG-PRODUCT">
	                            </div>

	                            <div class="block2-txt flex-w flex-t p-t-14">
	                                <div class="block2-txt-child1 flex-col-l ">
	                                    <a href="product-detail.php"
	                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
	                                        <?php echo $fetch_products['product_name']?>
	                                    </a>

	                                    <span class="stext-105 cl3">
	                                        RS-<?php echo $fetch_products['product_price']?>
	                                    </span>

	                                </div>

	                                <div class="block2-txt-child2 flex-r p-t-3">
	                                    <button name="addToCart" id="addToCart">
	                                        <i class="ri-shopping-basket-line fs-20" style="color: red;"></i>
	                                    </button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </a>
	            </form>
	            <?php
				}
				?>

	        </div>
	    </div>
	</section>


	<?php
	include("./base/footer.php");
	?>
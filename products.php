<?php
include("./base/header.php");
?>

<!-- Product Section -->
<div class="bg0 m-t-23 p-b-140">
    <div class="container">

        <!-- Filter buttons (Category) -->
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>

                <?php
                $select_query = "SELECT * FROM categories";
                $execute = mysqli_query($connection, $select_query);
                while ($fetch_categories = mysqli_fetch_array($execute)) {
                ?>
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                        data-filter=".<?php echo strtolower($fetch_categories['category_name']) ?>">
                        <?php echo $fetch_categories['category_name'] ?>
                    </button>
                <?php } ?>
            </div>

            <!-- Price Dropdown Filter -->
            <div class="flex-w flex-c-m m-tb-10">
                <form method="GET" class="mb-4 form">
                    <select name="price_range" onchange="this.form.submit()" class="form-control">
                        <option value="">Filter by Price</option>
                        <option value="0-1000" <?php if (@$_GET['price_range'] == '0-1000') echo 'selected'; ?>>Under 1000</option>
                        <option value="1000-3000" <?php if (@$_GET['price_range'] == '1000-3000') echo 'selected'; ?>>1000 - 3000</option>
                        <option value="3000-5000" <?php if (@$_GET['price_range'] == '3000-5000') echo 'selected'; ?>>3000 - 5000</option>
                        <option value="5000+" <?php if (@$_GET['price_range'] == '5000+') echo 'selected'; ?>>Above 5000</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row isotope-grid">
            <?php
            // Price filter logic
            $price_filter = '';
            if (isset($_GET['price_range']) && $_GET['price_range'] != '') {
                $range = $_GET['price_range'];
                if ($range == '0-1000') {
                    $price_filter = " AND product_price <= 1000";
                } elseif ($range == '1000-3000') {
                    $price_filter = " AND product_price BETWEEN 1000 AND 3000";
                } elseif ($range == '3000-5000') {
                    $price_filter = " AND product_price BETWEEN 3000 AND 5000";
                } elseif ($range == '5000+') {
                    $price_filter = " AND product_price > 5000";
                }
            }

            // Final SQL with optional category + price filters
            if (isset($_GET['id'])) {
                $category_id = $_GET['id'];
                $select_query = "SELECT * FROM products 
                    INNER JOIN categories ON categories.category_id = products.product_category_id 
                    WHERE product_category_id = $category_id $price_filter";
            } else {
                $select_query = "SELECT * FROM products 
                    INNER JOIN categories ON categories.category_id = products.product_category_id 
                    WHERE 1 $price_filter";
            }

            $execute = mysqli_query($connection, $select_query);
            while ($fetch_product = mysqli_fetch_array($execute)) {
            ?>
                <form method="POST" action="shoping-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $fetch_product['product_id'] ?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name'] ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['product_price'] ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['product_image'] ?>">
                    <input type="hidden" name="product_description" value="<?php echo $fetch_product['product_description'] ?>">
                    <input type="hidden" name="product_quantity" value="1">

                    <a href="product-detail.php?id=<?php echo $fetch_product['product_id'] ?>">
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo strtolower($fetch_product['category_name']) ?>">
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="./admin/uploads/<?php echo $fetch_product['product_image'] ?>" alt="IMG-PRODUCT">
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l">
                                        <a href="product-detail.php?id=<?php echo $fetch_product['product_id'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            <?php echo $fetch_product['product_name'] ?>
                                        </a>

                                        <span class="stext-105 cl3">
                                            RS-<?php echo $fetch_product['product_price'] ?>
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
            <?php } ?>
        </div>
    </div>
</div>

<?php include("./base/footer.php"); ?>

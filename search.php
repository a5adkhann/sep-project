<?php
include('./admin/db/db_connection.php');

if (isset($_POST['searchProduct'])) {
    $searchQuery = $_POST['searchProduct'];

    $query = "SELECT * FROM `products` 
              INNER JOIN `categories` 
              ON `categories`.`category_id` = `products`.`product_category_id` 
              WHERE `products`.`product_name` LIKE '%$searchQuery%' 
              OR `categories`.`category_name` LIKE '%$searchQuery%'";

    $execute = mysqli_query($connection, $query);

    if (mysqli_num_rows($execute) > 0) {
        while ($fetch = mysqli_fetch_array($execute)) {
            echo '<form method="POST" action="shoping-cart.php">
                <input type="hidden" name="product_id" value="' . $fetch['product_id'] . '">
                <input type="hidden" name="product_name" value="' . $fetch['product_name'] . '">
                <input type="hidden" name="product_price" value="' . $fetch['product_price'] . '">
                <input type="hidden" name="product_image" value="' . $fetch['product_image'] . '">
                <input type="hidden" name="product_description" value="' . $fetch['product_description'] . '">
                <input type="hidden" name="product_quantity" value="1">

                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ' . strtolower($fetch['category_name']) . '">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <a href="product-detail.php?id=' . $fetch['product_id'] . '">
                                <img src="./admin/uploads/' . $fetch['product_image'] . '" alt="IMG-PRODUCT">
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l">
                                <a href="product-detail.php?id=' . $fetch['product_id'] . '" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    ' . $fetch['product_name'] . '
                                </a>

                                <span class="stext-105 cl3">
                                    RS-' . $fetch['product_price'] . '
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <button name="addToCart" id="addToCart" style="background: none; border: none;">
                                    <i class="ri-shopping-basket-line fs-20" style="color: red;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>';
        }
    } else {
        echo "<div class='text-center text-gray-500'>No product found</div>";
    }
}
?>

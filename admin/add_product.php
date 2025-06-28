<?php
include("./base/header.php");

if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $product_stock_quantity = $_POST['product_stock_quantity'];

    $product_image = $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];
    $extension = pathinfo($product_image, PATHINFO_EXTENSION);
    $destination = "uploads/" . $product_image;

    if ($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg') {
        if (move_uploaded_file($tmp_name, $destination)) {
            $insert_query = "INSERT INTO products (product_name, product_description, product_price, product_category_id, product_stock_quantity, product_image)
                       VALUES ('$product_name', '$product_description', '$product_price', '$product_category', '$product_stock_quantity', '$product_image')";
            mysqli_query($connection, $insert_query);
            echo "<script>
            location.assign('view_product.php');
            </script>";
        }
    }
}
?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Add Product</h2>
                    <a href="view_products.php">View Products</a>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" method="POST">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Name</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Product Name" name="product_name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Description</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Product Description" name="product_description" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Price</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Product Price" name="product_price" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Category</label>
                            <select id="validationCustom01" class="form-select" name="product_category" required>
                                <?php
                                $select_query = "SELECT * FROM categories";
                                $execute = mysqli_query($connection, $select_query);
                                while($fetch_categories = mysqli_fetch_array($execute)){
                                ?>
                                <option value="<?php echo $fetch_categories['category_id']?>"><?php echo $fetch_categories['category_name']?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Stock quantity</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Product Stock Quantity" name="product_stock_quantity" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Image</label>
                            <input type="file" class="form-control" name="product_image" id="validationCustom01"
                                 required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="add_product">ADD</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div>
    </div>
</div>

<?php
include("./base/footer.php");
?>
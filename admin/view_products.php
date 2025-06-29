<?php
include("./base/header.php");

if (isset($_POST['update_product'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];
    $update_description = $_POST['update_description'];
    $update_price = $_POST['update_price'];
    $update_category = $_POST['update_category'];
    $update_stock = $_POST['update_stock'];

    if ($_FILES['update_image']['name'] != '') {
        $image_name = $_FILES['update_image']['name'];
        $tmp_name = $_FILES['update_image']['tmp_name'];
        move_uploaded_file($tmp_name, "uploads/" . $image_name);
        $update_query = "UPDATE products SET product_name='$update_name', product_description='$update_description', product_price='$update_price', product_category_id='$update_category', product_stock_quantity='$update_stock', product_image='$image_name' WHERE product_id=$update_id";
    } else {
        $update_query = "UPDATE products SET product_name='$update_name', product_description='$update_description', product_price='$update_price', product_category_id='$update_category', product_stock_quantity='$update_stock' WHERE product_id=$update_id";
    }

    mysqli_query($connection, $update_query);
    echo "<script>location.assign('view_products.php');</script>";
}

if (isset($_GET['delete_product'])) {
    $product_id = $_GET['delete_product'];
    $delete_query = "DELETE FROM products WHERE product_id = $product_id";
    $execute = mysqli_query($connection, $delete_query);
    echo "<script>location.assign('view_products.php');</script>";
}
?>

<div class="content-page">
    <div class="content">

     <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                            <li class="breadcrumb-item active">View Products</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>All Products</h2>
                    <a href="add_product.php">Add Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Index</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Price</th>
                                    <th>Product Category</th>
                                    <th>Product Stock Quantity</th>
                                    <th>Product Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $index = 1;
                                $editingId = $_GET['editingId'] ?? null;

                                $select_query = "SELECT * FROM products INNER JOIN categories ON category_id = product_category_id";
                                $execute = mysqli_query($connection, $select_query);
                                while ($fetch_products = mysqli_fetch_array($execute)) {
                                    $product_id = $fetch_products['product_id'];

                                    if ($editingId == $product_id) {
                                ?>
                                <tr>
                                    <form method="POST" enctype="multipart/form-data">
                                        <td><?php echo $index++; ?></td>
                                        <td>
                                            <input type="text" name="update_name"
                                                value="<?php echo $fetch_products['product_name']; ?>" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="update_description"
                                                value="<?php echo $fetch_products['product_description']; ?>" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="text" name="update_price"
                                                value="<?php echo $fetch_products['product_price']; ?>" class="form-control" required>
                                        </td>
                                        <td>
                                            <select name="update_category" class="form-control" required>
                                                <?php
                                                $category_query = mysqli_query($connection, "SELECT * FROM categories");
                                                while ($cat = mysqli_fetch_array($category_query)) {
                                                    $selected = ($cat['category_id'] == $fetch_products['product_category_id']) ? 'selected' : '';
                                                    echo "<option value='{$cat['category_id']}' $selected>{$cat['category_name']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="update_stock"
                                                value="<?php echo $fetch_products['product_stock_quantity']; ?>" class="form-control" required>
                                        </td>
                                        <td>
                                            <input type="file" name="update_image" class="form-control">
                                            <img src="./uploads/<?php echo $fetch_products['product_image']; ?>" width="60"
                                                class="mt-1">
                                        </td>
                                        <td class="text-center">
                                            <input type="hidden" name="update_id" value="<?php echo $product_id; ?>">
                                            <button type="submit" name="update_product"
                                                class="btn btn-sm bg-success-subtle text-success">Save</button>
                                            <a href="view_products.php"
                                                class="btn btn-sm bg-danger-subtle text-danger">Cancel</a>
                                        </td>
                                    </form>
                                </tr>
                                <?php
                                    } else {
                                ?>
                                <tr>
                                    <td><?php echo $index++; ?></td>
                                    <td><?php echo $fetch_products['product_name']; ?></td>
                                    <td><?php echo $fetch_products['product_description']; ?></td>
                                    <td><?php echo $fetch_products['product_price']; ?></td>
                                    <td><?php echo $fetch_products['category_name']; ?></td>
                                    <td><?php echo $fetch_products['product_stock_quantity']; ?></td>
                                    <td>
                                        <img src="./uploads/<?php echo $fetch_products['product_image']; ?>" width="100">
                                    </td>
                                    <td class="text-center">
                                        <a href="?editingId=<?php echo $fetch_products['product_id']; ?>"
                                            class="text-reset fs-16 px-2 py-1 badge bg-info-subtle text-info">Edit</a>
                                        <a href="?delete_product=<?php echo $product_id; ?>"
                                            class="text-reset fs-16 px-2 py-1 badge bg-danger-subtle text-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive -->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div>
    </div>
</div>

<?php include("./base/footer.php"); ?>

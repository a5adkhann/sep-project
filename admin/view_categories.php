<?php
include("./base/header.php");

if (isset($_POST['update_category'])) {
    $update_id = $_POST['update_id'];
    $update_name = $_POST['update_name'];

    if ($_FILES['update_image']['name'] != '') {
        $image_name = $_FILES['update_image']['name'];
        $tmp_name = $_FILES['update_image']['tmp_name'];
        move_uploaded_file($tmp_name, "uploads/" . $image_name);
        $update_query = "UPDATE categories SET category_name='$update_name', category_image='$image_name' WHERE category_id=$update_id";
        echo "<script>
        location.assign('view_categories.php');
        </script>";
    } else {
        $update_query = "UPDATE categories SET category_name='$update_name' WHERE category_id=$update_id";
        echo "<script>
        location.assign('view_categories.php');
        </script>";
    }

    mysqli_query($connection, $update_query);
}

if(isset($_GET['delete_category'])){
    $category_id = $_GET['delete_category'];
    $delete_query = "DELETE FROM categories WHERE category_id = $category_id";
    $execute = mysqli_query($connection, $delete_query);
    echo "<script>
        location.assign('view_categories.php');
    </script>";
}
?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>All Categories</h2>
                    <a href="add_category.php">Add Category</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Index</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $index = 1;
                                    $editingId = $_GET['editingId'] ?? null;

                                    $select_query = "SELECT * FROM categories";
                                    $execute = mysqli_query($connection, $select_query);
                                    while ($fetch = mysqli_fetch_array($execute)) {
                                        $category_id = $fetch['category_id'];

                                        if ($editingId == $category_id) {
                                    ?>
                                <tr>
                                    <form method="POST" enctype="multipart/form-data">
                                        <td><?php echo $index++; ?></td>
                                        <td>
                                            <input type="text" name="update_name"
                                                value="<?php echo $fetch['category_name']; ?>" class="form-control"
                                                required>
                                        </td>
                                        <td>
                                            <input type="file" name="update_image" class="form-control">
                                            <img src="./uploads/<?php echo $fetch['category_image']; ?>" width="60"
                                                class="mt-1">
                                        </td>
                                        <td class="text-center">
                                            <input type="hidden" name="update_id" value="<?php echo $category_id; ?>">
                                            <button type="submit" name="update_category"
                                                class="btn btn-sm bg-success-subtle text-success">Save</button>
                                            <a href="view_categories.php" class="btn btn-sm bg-danger-subtle text-danger">Cancel</a>
                                        </td>
                                    </form>
                                </tr>
                                <?php
                                        } else {
                                    ?>
                                <tr>
                                    <td><?php echo $index++; ?></td>
                                    <td><?php echo $fetch['category_name']; ?></td>
                                    <td>
                                        <img src="./uploads/<?php echo $fetch['category_image']; ?>" width="60">
                                    </td>
                                    <td class="text-center">
                                        <a href="?editingId=<?php echo $fetch['category_id']; ?>" class="text-reset fs-16 px-2 py-1 badge bg-info-subtle text-info">
                                            <!-- <i class="ri-pencil-line"></i> -->
                                             Edit
                                        </a>
                                        <a href="?delete_category=<?php echo $category_id; ?>"
                                            class="text-reset fs-16 px-2 py-1 badge bg-danger-subtle text-danger">
                                            <!-- <i class="ri-delete-bin-2-line"></i> -->
                                             Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php
    }
}
?>


                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>

    <?php
    include("./base/footer.php");
    ?>
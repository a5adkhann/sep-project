<?php
include("./base/header.php");

if(isset($_POST['add_category'])){
    $category_name = $_POST['category_name'];

    $category_image = $_FILES['category_image']['name'];
    $imageTmpName = $_FILES['category_image']['tmp_name'];
    $extension = pathinfo($category_image,PATHINFO_EXTENSION);
    $destination = "uploads/".$category_image;
    if($extension == 'jpg' || $extension == 'png'){
          if(move_uploaded_file($imageTmpName,$destination)){
    $insert_query = "INSERT INTO `categories`(category_name, category_image) VALUES('$category_name', '$category_image')";
    $execute = mysqli_query($connection, $insert_query);
    echo "<script>
            location.assign('view_category.php');
            </script>";
  }
}
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Categories</a></li>
                            <li class="breadcrumb-item active">Add Category</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Add Category</h2>
                    <a href="view_categories.php">View Categories</a>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate enctype="multipart/form-data" method="POST">
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Name</label>
                            <input type="text" class="form-control" name="category_name" id="validationCustom01"
                                placeholder="Category Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Image</label>
                            <input type="file" class="form-control" name="category_image" id="validationCustom01"
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="add_category">ADD</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div>
    </div>
</div>

<?php
include("./base/footer.php");
?>
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
  }
}
}
?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header">
                    <h2>Add Category</h2>
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
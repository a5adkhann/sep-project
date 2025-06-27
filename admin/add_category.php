<?php
include("./base/header.php");
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
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Name</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Category Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Image</label>
                            <input type="file" class="form-control" id="validationCustom01"
                                 required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">ADD</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div>
    </div>
</div>

<?php
include("./base/footer.php");
?>
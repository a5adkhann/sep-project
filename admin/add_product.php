<?php
include("./base/header.php");
?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header">
                    <h2>Add Product</h2>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Name</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Product Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Description</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Product Description" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Price</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Product Name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Category</label>
                            <select id="validationCustom01" class="form-select" required>
                                <option value="">Men</option>
                            </select>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="validationCustom01">Stock quantity</label>
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Product Name" required>
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
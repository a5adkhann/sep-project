<?php
include("./base/header.php");
?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header">
                    <h2>All Products</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Index</th>
                                    <th>Product Name</th>
                                    <th>Product Desciption</th>
                                    <th>Product Price</th>
                                    <th>Product Category</th>
                                    <th>Product Stock Quantity</th>
                                    <th>Product Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-user">
                                        1
                                    </td>
                                    <td>Shoes</td>
                                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis, eligendi?'</td>
                                    <td>$25</td>
                                    <td>Men</td>
                                    <td>12</td>
                                    <td>Image</td>
                                    <td class="text-center">
                                        <a href="javascript: void(0);" class="text-reset fs-16 px-1"><i class="ri-pencil-line"></i>
                                        </a>
                                        <a href="javascript: void(0);" class="text-reset fs-16 px-1"> <i
                                                class="ri-delete-bin-2-line"></i></a>
                                    </td>
                                </tr>

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
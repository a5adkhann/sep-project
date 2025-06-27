<?php
include("./base/header.php");
?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header">
                    <h2>All Categories</h2>
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
                                <tr>
                                    <td class="table-user">
                                        1
                                    </td>
                                    <td>Men</td>
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
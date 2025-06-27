<?php
include("./base/header.php");
?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header">
                    <h2>All Orders</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table text-center table-bordered table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Index</th>
                                    <th>Order ID</th>
                                    <th>Order Amount</th>
                                    <th>Order Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-user">
                                        1
                                    </td>
                                    <td>OD115</td>
                                    <td>$300</td>
                                    <td><span class="badge bg-pink-subtle text-pink">Pending</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-primary btn-sm me-1">Shipped</button>
                                        <button class="btn btn-outline-success btn-sm me-1">Delivered</button>
                                        <button class="btn btn-outline-danger btn-sm">Cancelled</button>
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
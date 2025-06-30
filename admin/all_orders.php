<?php
include("./base/header.php");

if (isset($_GET['updateShipped'])) {
    $id = $_GET['updateShipped'];
    $update_query = "UPDATE orders SET order_status = 'shipped' WHERE order_id = $id";
    $execute = mysqli_query($connection, $update_query);
    echo "<script>
    alert('Order is shipped');
    location.assign('all_orders.php');
    </script>";
}

if (isset($_GET['updateDelivered'])) {
    $id = $_GET['updateDelivered'];
    $update_query = "UPDATE orders SET order_status = 'delivered' WHERE order_id = $id";
    $execute = mysqli_query($connection, $update_query);
    echo "<script>
    alert('Order is delivered');
    location.assign('all_orders.php');
    </script>";
}

if (isset($_GET['updateCancelled'])) {
    $id = $_GET['updateCancelled'];
    $update_query = "UPDATE orders SET order_status = 'cancelled' WHERE order_id = $id";
    $execute = mysqli_query($connection, $update_query);
    echo "<script>
    alert('Order is Cancelled');
    location.assign('all_orders.php');
    </script>";
}




?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="row">
                    <div class="card-header row">
                        <div class="col-6">
                            <h2>All Orders</h2>
                        </div>
                        <div class="col-6">
                            <form class="d-flex align-items-center" method="POST">
                                <label class="text-primary">S </label> &nbsp;
                                <input type="date" class="form-control" name="start_date">

                                &nbsp;

                                <label class="text-danger">E</label> &nbsp;
                                <input type="date" class="form-control" name="end_date">

                                &nbsp;

                                <button name="findByDate" class="btn btn-primary">Find</button>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <?php
                            $index = 1;

                            if (isset($_POST['findByDate'])) {
                                $start_date_raw = $_POST['start_date'];
                                $end_date_raw = $_POST['end_date'];

                                $start_date = date("Y-m-d", strtotime($start_date_raw));
                                $end_date = date("Y-m-d", strtotime($end_date_raw));

                                $select_query = "SELECT * FROM orders WHERE DATE(order_placed_date) BETWEEN '$start_date' AND '$end_date'";
                            } else {
                                $select_query = "SELECT * FROM orders";
                            }

                            $execute = mysqli_query($connection, $select_query);
                            while ($fetch_orders = mysqli_fetch_array($execute)) {
                            ?>
                                <tr>
                                    <td class="table-user">
                                        <?php echo $index++ ?>
                                    </td>
                                    <td><?php echo $fetch_orders['order_generated_id'] ?></td>
                                    <td>RS/<?php echo $fetch_orders['order_amount'] ?></td>

                                    <?php
                                    if ($fetch_orders['order_status'] == "pending") {
                                    ?>
                                        <td><span
                                                class="badge bg-pink-subtle text-pink"><?php echo $fetch_orders['order_status'] ?></span>
                                        </td>
                                    <?php
                                    } else if ($fetch_orders['order_status'] == "shipped") {
                                    ?>
                                        <td><span
                                                class="badge bg-success-subtle text-success"><?php echo $fetch_orders['order_status'] ?></span>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td><span
                                                class="badge bg-info-subtle text-info"><?php echo $fetch_orders['order_status'] ?></span>
                                        </td>
                                    <?php
                                    }
                                    ?>

                                    <td class="text-center">
                                        <?php
                                        $status = $fetch_orders['order_status'];

                                        if ($status !== "shipped" && $status !== "delivered" && $status !== "cancelled") {
                                            echo '<a href="?updateShipped=' . $fetch_orders['order_id'] . '" class="btn btn-outline-primary btn-sm me-1">Shipped</a>';
                                        }

                                        if ($status !== "delivered" && $status !== "cancelled") {
                                            echo '<a href="?updateDelivered=' . $fetch_orders['order_id'] . '" class="btn btn-outline-success btn-sm me-1">Delivered</a>';
                                        }

                                        if ($status !== "cancelled" && $status !== "delivered") {
                                            echo '<a href="?updateCancelled=' . $fetch_orders['order_id'] . '" class="btn btn-outline-danger btn-sm">Cancel</a>';
                                        }
                                        if ($status == "cancelled") {
                                            echo "Cannot Perform any Action";
                                        }
                                        if ($status == "delivered") {
                                            echo "Cannot Perform any Action";
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php
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
<?php
include("./base/header.php");
?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="row">
                    <div class="card-header row">
                        <div class="col-10">
                            <h2>Pending Orders</h2>
                        </div>
                        <div class="col-2">
                            <form>
                                <select onchange="" class="form-select">
                                    <option>Filter</option>
                                    <?php
                                $select_query = "SELECT order_status FROM orders";
                                $execute = mysqli_query($connection, $select_query);
                                while($fetch_order_status = mysqli_fetch_array($execute)){
                            ?>
                                    <option value="<?php echo $fetch_order_status['order_status']?>"><?php echo $fetch_order_status['order_status']?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $index = 1;
                                $select_query = "SELECT * FROM orders WHERE order_status = 'pending'";
                                $execute = mysqli_query($connection, $select_query);

                                $count_pending = mysqli_num_rows($execute);
                                if($count_pending > 0){
                                while($fetch_orders = mysqli_fetch_array($execute)){
                                ?>
                            <tr>
                                <td class="table-user">
                                    <?php echo $index++?>
                                </td>
                                <td><?php echo $fetch_orders['order_generated_id']?></td>
                                <td>RS/<?php echo $fetch_orders['order_amount']?></td>

                                <?php
                                    if($fetch_orders['order_status'] == "pending"){
                                    ?>
                                <td><span
                                        class="badge bg-pink-subtle text-pink"><?php echo $fetch_orders['order_status']?></span>
                                </td>
                                <?php
                                    }
                                    else if($fetch_orders['order_status'] == "shipped"){
                                    ?>
                                <td><span
                                        class="badge bg-success-subtle text-success"><?php echo $fetch_orders['order_status']?></span>
                                </td>
                                <?php
                                }
                                else {
                                    ?>
                                <td><span
                                        class="badge bg-info-subtle text-info"><?php echo $fetch_orders['order_status']?></span>
                                </td>
                                <?php
                                    }
                                    ?>
                            </tr>
                            <?php
                                }
                                }
                                else {
                                    echo "<script>
                                    alert('No pending orders');
                                    location.assign('all_orders.php');
                                    </script>";
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
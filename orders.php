<?php
include("./base/header.php");
?>

<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Index</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Amount</th>
                    <th scope="col">Order Status</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $select_query = "SELECT * FROM orders WHERE customer_id = {$_SESSION['user_id']}";
                $execute = mysqli_query($connection, $select_query);
                $serial = 1;
                while ($fetch_customers_orders = mysqli_fetch_array($execute)) {
                ?>
                <tr>
                    <th scope="row"><?php echo $serial++; ?></th>
                    <td><?php echo htmlspecialchars($fetch_customers_orders['order_generated_id']); ?></td>
                    <td><?php echo htmlspecialchars($fetch_customers_orders['order_amount']); ?> RS</td>
                    <td><?php echo htmlspecialchars($fetch_customers_orders['order_status']); ?></td>
                </tr>
                <?php
}
?>


            </tbody>
        </table>
    </div>
</div>




<?php
include("./base/footer.php");
?>
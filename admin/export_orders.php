<?php
include("./db/db_connection.php");

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=orders_report.xls");
header("Pragma: no-cache");
header("Expires: 0");

    echo "Index\tOrder ID\tAmount\tStatus\tOrder Date\n";

$index = 1;

$query = "SELECT * FROM orders";

if (isset($_GET['start']) && isset($_GET['end'])) {
    $start = $_GET['start'];
    $end = $_GET['end'];
    $query = "SELECT * FROM orders WHERE DATE(order_placed_date) BETWEEN '$start' AND '$end'";
}

$result = mysqli_query($connection, $query);

while ($order = mysqli_fetch_array($result)) {
    echo $index++ . "\t";
    echo $order['order_generated_id'] . "\t";
    echo "RS/" . $order['order_amount'] . "\t";
    echo $order['order_status'] . "\t";
}
exit;
?>

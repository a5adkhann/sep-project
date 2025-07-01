<?php
include("./db/db_connection.php");

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=orders_report.csv");
header("Pragma: no-cache");
header("Expires: 0");

$output = fopen('php://output', 'w');

// Add headers to the CSV
fputcsv($output, ["Index", "Order ID", "Amount", "Status", "Order Date"]);

// Fetch data
$index = 1;
$query = "SELECT * FROM orders";

if (isset($_GET['start']) && isset($_GET['end'])) {
    $start = $_GET['start'];
    $end = $_GET['end'];
    $query = "SELECT * FROM orders WHERE DATE(order_placed_date) BETWEEN '$start' AND '$end'";
}

$result = mysqli_query($connection, $query);

// Output data rows to the CSV file
while ($order = mysqli_fetch_array($result)) {
    $data = [
        $index++,                         
        $order['order_generated_id'],      
        "RS/" . $order['order_amount'],    
        $order['order_status'],            
    ];

    // Write the row to the CSV
    fputcsv($output, $data);
}

// Close the output stream
fclose($output);

exit;
?>

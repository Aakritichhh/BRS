<?php
session_start();
require('../database/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderId = $_POST["orderId"];
    
    
    $query = "UPDATE orders SET status = 'Accept' WHERE orderid = '$orderId'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Order accepted successfully.";
    } else {
        echo "Error accepting order.";
    }
}
?>

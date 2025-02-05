<?php 
include "conf.php";

if (isset($_GET['orderID'])) {
    $orderId = $_GET['orderID'];
    $sql = "UPDATE orders SET status='accepted' WHERE orderID=$orderId";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Order Accepted!'); window.location='pendingOrders.php';</script>";
    } else {
        echo "<script>alert('Error accepting order!'); window.location='pendingOrders.php';</script>";
    }
}
?>

<?php 
include "conf.php";

if (isset($_GET['orderID'])) {
    $orderId = $_GET['orderID'];
    $sql = "UPDATE orders SET status='rejected' WHERE orderID=$orderId";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Order rejected!'); window.location='pendingOrders.php';</script>";
    } else {
        echo "<script>alert('Error rejecting order!'); window.location='pendingOrders.php';</script>";
    }
}
?>

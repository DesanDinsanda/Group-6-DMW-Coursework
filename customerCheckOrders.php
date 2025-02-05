<?php session_start(); ?>
<?php 
include "conf.php";

$customerEmail = $_SESSION['email'];
$sql = "SELECT o.orderID, o.orderDate, o.status, o.eventDate, o.time, o.location, 
               p.eventType, p.packageName, p.price,c.email 
        FROM orders o
            INNER JOIN package p ON p.packageID = o.packageID
            INNER JOIN customer c ON c.customerID = o.customerID WHERE c.email = '$customerEmail'";
$result = mysqli_query($conn, $sql);

echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>All Orders details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    
</head>
<body>


    <div class="container my-4">
        <h2 class="text-center text-primary">All Order Details</h2><br>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Event Date</th>
                    <th>Event Type</th>
                    <th>Package Name</th>
                    <th>Event Time</th>
                    <th>Event Location</th>
                    <th>Event Cost</th>
                    
                    
                </tr>
            </thead>
            <tbody>
HTML;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo <<<HTML
            <tr>
                <td>{$row['orderID']}</td>
                <td>{$row['orderDate']}</td>
                <td>{$row['status']}</td>
                <td>{$row['eventDate']}</td>
                <td>{$row['eventType']}</td>
                <td>{$row['packageName']}</td>
                <td>{$row['time']}</td>
                <td>{$row['location']}</td>
                <td>{$row['price']}</td>
                
                
                
            </tr>
HTML;
    }
}

echo <<<HTML
            </tbody>
        </table>
    </div> 
</body>
</html>
HTML;
?>

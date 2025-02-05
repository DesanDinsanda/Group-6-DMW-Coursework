<?php
session_start(); // Start session to get customerID
include 'conf.php'; // Include database connection

// SQL query to get customerID from database
$sql2 = "SELECT customerID FROM customer WHERE email = '".$_SESSION['email']."' ";
$result2 = mysqli_query($conn, $sql2);

// Fetch customerID from the result
if ($row = mysqli_fetch_assoc($result2)) {
    $customerID = $row['customerID'];
} else {
    // Handle case where no customerID is found
    echo "Customer not found.";
}



if (isset($_POST['btnOrder'])) {
    $location = mysqli_real_escape_string($conn, $_POST['evntLocation']);
    $eventDate = mysqli_real_escape_string($conn, $_POST['eventDate']);
    $eventTime = mysqli_real_escape_string($conn, $_POST['eventTime']);

    // Get the current date for orderDate
    $orderDate = date('Y-m-d');

    // Set order status to 'Pending'
    $status = 'Pending';




    // Get packageID from the session (should be stored when adding to cart)
    if (isset($_SESSION['packageID'])) {
        $packageID = $_SESSION['packageID'];
    } else {
        die("Package not selected.");
    }

    // Insert data into the orders table
    $sql = "INSERT INTO orders (orderDate, status, eventDate, time, location, packageID, customerID) 
            VALUES ('$orderDate', '$status', '$eventDate', '$eventTime', '$location', '$packageID', '$customerID')";

    if (mysqli_query($conn, $sql)) {
        echo "
        <script>
            // Wait for the document to fully load
            window.onload = function() {
                // Show the custom modal
                var confirmationModal = document.getElementById('confirmationModal');
                confirmationModal.style.display = 'block';

                // Handle the 'Order Now' button click
                document.getElementById('orderNowBtn').onclick = function() {
                    window.location.href = 'ser.php'; // Redirect to ser.php
                };s
            };
        </script>
        
        <!-- Custom Modal for Confirmation -->
        <div id='confirmationModal' style='display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background:ivory; display: flex; justify-content: center; align-items: center; z-index: 1000;'>
            <div style='background-color: white; padding: 20px; border-radius: 8px; text-align: center;'>
                <h4>Order Placed Successfully!</h4>
                <p>Thank you for choosing us </p>
                <button id='orderNowBtn' style='padding: 10px 20px; margin: 10px; background-color: green; color: white; border: none; border-radius: 5px;'>Go to services</button>
            </div>
        </div>
        </script>
        ";

    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

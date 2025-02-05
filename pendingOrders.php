<?php 
include "conf.php";

$sql = "SELECT o.orderID, o.orderDate, o.status, o.eventDate, o.time, o.location, 
               p.eventType, p.packageName, p.price,c.firstName,c.number 
        FROM orders o
            INNER JOIN package p ON p.packageID = o.packageID
            INNER JOIN customer c ON c.customerID = o.customerID WHERE o.status = 'pending'";
$result = mysqli_query($conn, $sql);

echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Pending Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        var actionType = '';

        function confirmAction(orderId, action) {
            actionType = action; // Store the action (accept or reject)

            // Set the confirm button's href based on the action
            if (action === 'accept') {
                document.getElementById("confirmActionBtn").href = "accept.php?orderID=" + orderId;
            } else if (action === 'reject') {
                document.getElementById("confirmActionBtn").href = "reject.php?orderID=" + orderId;
            }

            // Show the Bootstrap modal
            var confirmModal = new bootstrap.Modal(document.getElementById("confirmModal"));
            confirmModal.show();
        }
    </script>
<style>*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background-color: #fcf6ec;  
}
.navbar{
    display: flex;
    align-items: center;
    padding: 20px;
    background: rgb(240, 230, 200);
}
nav{
    flex: 1;
    text-align: right;
}
nav ul{
    display: inline-block;
    list-style-type: none;
}
nav ul li{
    display: inline-block;
    margin-right: 20px;
   
}
nav ul li:hover{
    display: inline-block;
    margin-right: 20px;
    transform: scale(1.1);
}

a{
    text-decoration: none;
    color: #0a0a0a;
    font-size: large;
}
p{
    color: #363434;
    font-size: 20px;
}
button{
    background-color: #090909;
    margin-left: 10px;
    border-radius: 10px;
    padding: 10px;
    width: 90px;
}
button a{
    color:rgb(194, 181, 181);
    font-weight: bold;
    font-size: 15px;
}
.profile-img {
    width: 50px;       /* Adjust size as needed */
    height: 50px;
    border-radius: 50%;  /* Makes the image circular */
    object-fit: cover;   /* Ensures the image fits well */
    border: 2px solid #090909;  /* Optional: Adds a border */
    transition: transform 0.3s ease;  /* Smooth hover effect */
}

.profile-img:hover {
    transform: scale(1.1);  /* Slight zoom on hover */
}

</style>
<script>
  function confirmLogout() {
    const confirmation = confirm("Are you sure you want to logout?");
    if (confirmation) {
      window.location.href = "adminLogout.php"; // Redirect to logout if 'Yes' is clicked
    }
    // If 'No' is clicked, nothing happens and the user stays on the page
  }
</script>
</head>
<body>
<!-- Nav Bar -->
<div class="navbar">
		<div class="logo">
			<img src="images/event-management-logo.jpeg" width="125px" alt="">
		</div>
		<nav>
			<ul>
            <li><a href="adminHome.php">Users</a></li>
				<li><a href="managePackage.php">ManagePackages</a></li>
				<li><a href="allOrders.php">Orders</a></li>
				<li><a href="pendingOrders.php">PendingOrders</a></li>
				<li><a href="#" onclick="confirmLogout()">Logout</a></li>
               <li><a href="adminProfile.php">
                <img src="images\adminProfilePic.png" alt="Profile" class="profile-img">
               </a>
               </li>

			</ul>
		</nav>
	</div>



    <div class="container my-4">
        <h2 class="text-center text-primary">Pending Orders</h2><br>
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
                    <th>First Name</th>
                    <th>Phone number</th>
                    <th>Action</th>
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
                <td>{$row['firstName']}</td>
                <td>{$row['number']}</td>
                <td>
                    <button class="btn btn-info" onclick="confirmAction({$row['orderID']}, 'accept')">Accept</button>&nbsp;
                    <button class="btn btn-danger" onclick="confirmAction({$row['orderID']}, 'reject')">Reject</button>
                </td>
            </tr>
HTML;
    }
}

echo <<<HTML
            </tbody>
        </table>
    </div> 

    <!-- Bootstrap Modal for Confirming Action -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="fs-5" id="confirmMessage">Are you sure you want to perform this action?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a id="confirmActionBtn" class="btn btn-success">Yes, Proceed</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
HTML;
?>

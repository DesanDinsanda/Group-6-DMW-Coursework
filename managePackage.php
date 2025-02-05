<?php
include "conf.php";

// SQL query to get package and associated items
$sql = "SELECT p.packageID, p.packageName, p.price, p.eventType, 
               GROUP_CONCAT(i.itemName ORDER BY pi.itemID) AS items
        FROM package p
        LEFT JOIN package_item pi ON p.packageID = pi.packageID
        LEFT JOIN item i ON pi.itemID = i.itemID
        GROUP BY p.packageID";

$result = mysqli_query($conn, $sql);

echo '
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

 <script>
  function confirmDelete() {
    const confirmation = confirm("Are you sure you want to Delete this package?");
    if (confirmation) {
      window.location.href = "managePackage.php"; // Redirect to logout if  is clicked
    }
    // If  is clicked, nothing happens and the user stays on the page
  }
</script>

    <script>
  function confirmADD() {
    const confirmation = confirm("Are you sure you want to Add this package?");
    if (confirmation) {
      window.location.href = "managePackage.php"; // Redirect to logout if  is clicked
    }
    // If  is clicked, nothing happens and the user stays on the page
  }
</script>
<script>
  function confirmLogout() {
    const confirmation = confirm("Are you sure you want to logout?");
    if (confirmation) {
      window.location.href = "adminLogout.php"; // Redirect to logout if  is clicked
    }
    // If is clicked, nothing happens and the user stays on the page
  }


  
</script>

    <style>
    .form-container {
    background-color: #fdecf6;  /* Red background */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    
}
    
    *{
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
				<li><a href="">ManagePackages</a></li>
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
<div class="container1">
    <h2 class="mb-4 text-center">Manage Products</h2>
    <form action="doInsert.php" method="POST" class="border rounded p-4 w-50 mx-auto form-container ">
        <div class="mb-3">
            <label for="package_name" class="form-label fw-bold">Package Name</label>
            <input type="text" class="form-control" id="package_name" name="name">
        </div>
        <div class="mb-3">
            <label for="package_price" class="form-label fw-bold">Package Price</label>
            <input type="number" class="form-control" id="package_price" name="price">
        </div>
        <div class="mb-3">
            <label for="event_type" class="form-label fw-bold">Event Type</label>
            <select class="form-select" id="event_type" name="type">
                <option value="Wedding">Wedding</option>
                <option value="Birthday">Birthday</option> 
            </select>
        </div>';

        // Loop to generate item input fields
        for ($i = 1; $i <= 20; $i++) {
            echo '
                <div class="mb-3">
                    <label for="item-' . $i . '" class="form-label fw-bold">Item ' . $i . '</label>
                    <input type="text" class="form-control" id="item-' . $i . '" name="item' . $i . '">
                </div>';
        }

        echo '
        <button type="submit" class="btn btn-primary" onclick="confirmADD()" name="submit">Add Package</button>
    </form>
</div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Package Name</th>
                            <th>Price</th>
                            <th>Event Type">';
                            
                            // Loop to display headers for items
                            for ($i = 1; $i <= 20; $i++) {
                                echo '<th>Item ' . $i . '</th>';
                            }

                            echo '
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Split items by comma and handle each item dynamically
        $items = explode(',', $row['items']);
        echo '
                        <tr>
                            <td>' . $row['packageID'] . '</td>
                            <td>' . $row['packageName'] . '</td>
                            <td>' . $row['price'] . '</td>
                            <td>' . $row['eventType'] . '</td>';
                            
                            // Display item values dynamically
                            for ($i = 0; $i < 20; $i++) {
                                echo '<td>' . (isset($items[$i]) ? $items[$i] : '') . '</td>';
                            }

                            echo '
                            <td>
                                <a class="btn btn-info"  href="edit.php?packageID=' . $row['packageID'] . '">Edit</a>
                                <a class="btn btn-danger" onclick="confirmDelete()" href="delete.php?packageID=' . $row['packageID'] . '">Delete</a>
                            </td>
                        </tr>';
    }
} else {
    echo '
                        <tr>
                            <td colspan="22" class="text-center">No packages found</td>
                        </tr>';
}

echo '
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>';
?>

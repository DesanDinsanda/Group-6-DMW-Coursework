<?php 
include "conf.php";

$sql = "SELECT customerID, firstName,lastName, email, number FROM customer";
$result = mysqli_query($conn, $sql);

echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Registered Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



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
<body >
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
<!-- <table> </table> -->
    <div class="container my-4">
        <h2 class="text-center text-primary">Registered Customers</h2><br>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Contact</th>
                    
                </tr>
            </thead>
            <tbody>
HTML;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo <<<HTML
            <tr>
                <td>{$row['customerID']}</td>
                <td>{$row['firstName']}</td>
                <td>{$row['lastName']}</td>
                <td>{$row['email']}</td>
                <td>{$row['number']}</td>
                <td>
                    <a href='mailto:{$row['email']}' class='btn btn-success btn-sm'>Contact</a>
                </td>

              
                
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

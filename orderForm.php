<?php
session_start();
if (!isset($_SESSION['packageID'])) {
    die("Error: No package selected.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fill Event Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="cre.css">
    <link rel="stylesheet" href="ser.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">



    <style>
        .profile-container {
    position: relative;
    display: inline-block;
}

.profile-img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    cursor: pointer;
}

.dropdown {
    display: none;
    position: absolute;
    background:rgb(249, 244, 233) ;
    min-width: 90px;
    text-align: center;
    border: 1px solid black;
    top: 50px; /* Adjust dropdown position */
    right: 10;
    z-index: 1000;
}

.dropdown a {
    display: block;
    padding: 7px;
    text-decoration: none;
    color: black;
}

.profile-container:hover .dropdown {
    display: block;
}
    </style>





</head>
<body>




<!-- Navigation Bar -->
<nav class="navbar fixed-top navbar-expand-lg bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/drem11.jpeg" alt="Logo" width="125px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <!-- Test the session -->
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="ab.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="ser.php">Service</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                </ul>
                <div class="ms-3">
                <?php if (!isset($_SESSION['email'])): ?>
                    <a href="login.html" class="btn btn-dark me-2">Sign In</a>
                    <a href="create.html" class="btn btn-outline-dark">Sign Up</a>
                <?php endif; ?>                    
                    
                </div>

                <?php if(isset($_SESSION['email'])): ?>
                    <li class="profile-container">
        <img src="images/adminProfilePic.png" alt="Profile" class="profile-img">
        <div class="dropdown">
            <a href="profile.html">Profile</a>
            <a href="orders.html">Orders</a>
            <a href="logout.html">Logout</a>
        </div>
    </li>
                
                
                <?php endif; ?>

                
               

                <!-- Test the session -->
            </div>
        </div>
    </nav>

    <br><br><br><br><br><br><br><br><br><br><br><br>






    <div class="Wrapper">

                    <br><br><br>

        <form action="orderPackage.php" method="POST">
            <h1>Fill Details</h1>
            <div class="input-box">
                <input type="text" placeholder="Location" name="evntLocation" required>
            </div>
            <div class="input-box">
                <input type="date" placeholder="Event Date" name="eventDate" required>
            </div>
            <div class="input-box">
                <input type="time" placeholder="Event Time" name="eventTime" required>
            </div>
            <?php if (isset($_SESSION['email'])): ?>
            <button type="submit" class="btn" name="btnOrder">Order</button>
            <?php else: ?>
            <button type="button" class="btn" disabled>Order (Login Required)</button>
            <?php endif; ?>

        </form>
    </div>


    
</body>
</html>

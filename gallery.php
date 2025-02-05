<?php session_start(); ?>
<html>

<head>
  <title>image gallery</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="gal.css">
</head>
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

<body>


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
                    <li class="nav-item"><a class="nav-link" href="mailto:Dreamevent@gmail.com">Contact Us</a></li>
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
        <a href="customerProfile.php">Profile</a>
        <a href="customerCheckOrders.php">Orders</a>
            <a href="customerLogout.php">Logout</a>
        </div>
    </li>
                
                
                <?php endif; ?>

                
               

                <!-- Test the session -->
            </div>
        </div>
    </nav>


  <div class="title"> <br>
    <h1>Here are few pictures of events done by Dreams Events</h1>
  </div>
  <div class="container-fluid">

    <div class="row">
      <div class="column">
        <img src="images/gallery/img02.jpeg" />
        <img src="images/gallery/12.JPG" />
        <img src="images/gallery/img03.jpeg" />
      </div>
      <div class="column">
        <img src="images/gallery/img01.jpeg" />
        <img src="images/gallery/15.JPG" />
        <img src="images/gallery/16.JPG" />
        <img src="images/gallery/img06.jpeg" />


      </div>
      <div class="column">
        <img src="images/gallery/7.JPG" />
        <img src="images/gallery/8.JPG" />
        <img src="images/gallery/17.JPG" />
        <img src="images/gallery/img05.jpeg" />
        <img src="images/gallery/img04.jpeg" />
      </div>
    </div>
  </div>


  <footer>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4 footer-content">
          <h3>Contact Us</h3>



          <p><i class="fa-solid fa-location-dot"></i> Location: <a
              href="344/2 Thimbirigasyaya Rd, Colombo 00500, Sri Lanka">344/2 Thimbirigasyaya Rd, Colombo
              00500, Sri Lanka</a></p>
          <p><i class="fas fa-envelope text-primary me-2"></i> Email: <a
              href="mailto:Dreamevent@gmail.com">Dreamevent@gmail.com</a></p>
          <p><i class="fas fa-phone text-success me-2"></i> Phone: <a href="tel:0315678970">0315678970</a></p>
        </div>

        <div class="col-12 col-md-4 footer-content">
          <h3>Quick Links</h3>
          <ul class="list">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="ab.php">About</a></li>
                        <li><a href="ser.php">Services</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="mailto:Dreamevent@gmail.com">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-4 footer-content">
          <h3>Follow Us</h3>
          <ul class="social-icons">
          <li><a href="https://www.facebook.com/share/19oZv8CM1f/"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container text-center">
      <div class="bottom-bar">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
      </div>
    </div>
  </footer>




  <!-- Link to Bootstrap JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <!-- Font Awesome for social icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>






</html>
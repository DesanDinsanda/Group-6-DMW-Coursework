<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Dreams Event</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="body.css">
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
    <br><br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <img src="images/aboutus/about01.jpeg" class="img-fluid" alt="Full Width Image">
            </div>
        </div> <br><br><br>



        <div class="container">
            <div class="About us">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img src="images/aboutus/deco.jpeg" class="Wedding-img img-fluid" width="700px" height="500px" alt="Wedding">
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        <h1>Dreams Events Story</h1>
                        <small>We are <strong>Dreams Event</strong>, dedicated to making your special occasions
                            unforgettable. With years of expertise in event planning, we bring creativity, organization,
                            and
                            magic to every function.Dreams Event & Wedding planning company began organizing events in
                            Sri lanka
                            without even a brand name at the beginning. All the events Dreams Event planners organized
                            so far
                            have been very successful even without having a brand name. Dreams Wedding planners have
                            been able
                            to touch the minds of customers
                            and feel the taste of their emotional and social needs during the past ten years With the
                            experience, we have now by rendering a customer-oriented service during the past few years
                            both as a
                            hobby and a field of our studies, we thought of keeping one step forward to give our
                            customers a reliable and enjoyable service under our brand name The Dreams Events. Our
                            service is
                            unique and cost-effective. Yours and your loved ones’ satisfaction is our prime objective.
                            Contact
                            us for your next memorable event and be free yourself in facing with problematic issues in
                            organizing
                            your event. Leave the burden to us. As a team, the Dreams event planning crew will offer you
                            the
                            best and make it the most memorable moment in your life.</small>
                    </div>
                </div>
            </div>
        </div>




        <section class="boxs">
            <div class="container text-center my-5">
                <h6 class="text-uppercase">Our Best Service</h6>
                <h2 class="mb-4">Our Working Process</h2>
                <div class="row">

                    <div class="col-md-3 process-step">
                        <div class="icon">
                            <img src="images/aboutus/ven.png" alt="Vendor">
                        </div>
                        <h5>Connecting with the best vendor</h5>
                    </div>
                    <div class="col-md-3 process-step">
                        <div class="icon">
                            <img src="images/aboutus/org.png" alt="Organizing">
                        </div>
                        <h5>Organizing Your Event</h5>
                    </div>
                    <div class="col-md-3 process-step">
                        <div class="icon">
                            <img src="images/aboutus/enj.png" alt="Party">
                        </div>
                        <h5>Enjoy the party with your friends</h5>
                    </div>
                </div>
            </div>
        </section>



        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 footer-content">
                        <h3>Contact Us</h3>



                        <p><i class="fa-solid fa-location-dot"></i> Location: <a
                                href="344/2 Thimbirigasyaya Rd, Colombo 00500, Sri Lanka">344/2 Thimbirigasyaya Rd,
                                Colombo
                                00500, Sri Lanka</a></p>
                        <p><i class="fas fa-envelope text-primary me-2"></i> Email: <a
                                href="mailto:Dreamevent@gmail.com">Dreamevent@gmail.com</a></p>
                        <p><i class="fas fa-phone text-success me-2"></i> Phone: <a href="tel:0315678970">0315678970</a>
                        </p>
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

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>

</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="home.css">
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
    </nav> <br><br><br>

    <section class="header py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <h1><strong>THE GOLD</strong> reputation of<br>event planning industry!</h1>
                    <p class="mt-3">
                        Planning a Wedding and Birthday Party while managing a busy schedule is not easy. 
                        It requires specialized skills and time to make everything look perfect on the Big day....
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <div class="img-section">
                        <img src="images/WhatsApp Image 2025-01-31 at 17.29.19.jpeg" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="categories">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img src="images/td2fl.jpeg" class="img-fluid" alt="Image 1">
                </div>
                <div class="col-12 col-md-4">
                    <img src="images/td fl.jpeg" class="img-fluid" alt="Image 2">
                </div>
                <div class="col-12 col-md-4">
                    <img src="images/head flower.jpeg" class="img-fluid" alt="Image 3">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="Wedding">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="images/wedding2.jpeg" class="Wedding-img img-fluid" width="700px" height="500px" alt="Wedding">
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                    <h1>Wedding Function</h1>
                    <small>At Dream Event, we specialize in crafting unforgettable weddings  <br>tailored  to your unique
                        vision. From intimate ceremonies to grand celebrations, our team ensures every detail is
                        perfect, creating a seamless and stress-free experience...</small>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="Birthday">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="images/birthday1.jpeg" class="Birthday-img img-fluid" alt="Birthday">
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                    <h1>Birthday Function</h1>
                    <small>Make your birthday celebration unforgettable with Dream Event! <br> Whether it's a kids’ party,
                        milestone birthday, or a luxury celebration, we bring creativity, excitement, and flawless
                        execution to every event...</small>
                </div>
            </div>
        </div>
    </div>

    <section class="review py-5 bg-light">
        <div class="container text-center">
            <h1 class="mb-4">Customer Reviews</h1>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow p-4">
                        <i class="fa fa-quote-left fa-2x text-primary"></i>
                        <p class="mt-3">"Our wedding was a fairytale, thanks to this amazing team! Their attention to detail and personal touch made it perfect."</p>
                        <div class="rating text-warning mb-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="images/COUPLE1.jpg" class="rounded-circle img-fluid mt-3" width="80">
                        <h5 class="mt-2">James & Emily</h5>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card shadow p-4">
                        <i class="fa fa-quote-left fa-2x text-primary"></i>
                        <p class="mt-3">"We felt so special on our big day, thanks to the wonderful team. Everything was smooth, elegant, and well-organized."</p>
                        <div class="rating text-warning mb-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="images/ccccc.jpg" class="rounded-circle img-fluid mt-3" width="80">
                        <h5 class="mt-2">Elina</h5>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="card shadow p-4">
                        <i class="fa fa-quote-left fa-2x text-primary"></i>
                        <p class="mt-3">"Professional, creative, and truly passionate about making weddings memorable. We are beyond grateful for their hard work!"</p>
                        <div class="rating text-warning mb-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <img src="images/eee.jpg" class="rounded-circle img-fluid mt-3" width="80">
                        <h5 class="mt-2">Deric Kalvin</h5>
                    </div>
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

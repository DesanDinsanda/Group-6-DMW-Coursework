<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planner</title>

    <!-- Bootstrap and Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="ser.css">
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

    <br><br><br><br>

    <!-- Full-width Image -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <img src="images/pl03.jpeg" class="img-fluid" alt="Full Width Image">
            </div>
        </div>


        <!-- Event Sections -->
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="list-group">
                        <!-- Wedding Event Button -->
                        <a href="#wedding-theme"
                            class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
                            Wedding Events <i class="fas fa-angle-right"></i>
                        </a>
                        <!-- Birthday Event Button -->
                        <a href="#Birthday-theme"
                            class="list-group-item list-group-item-dark d-flex justify-content-between align-items-center">
                            Birthday Events <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <img src="images/se (1).jpeg" class="img-fluid rounded" alt="Wedding Event">
                </div>

                <div class="col-md-4 text-center">
                    <img src="images/se (2).jpeg" class="img-fluid rounded" alt="Celebration Event">
                </div>
            </div>
        </div>


    </div>
    </div>

    <!-- Event Categories -->
    <div class="container my-5">
        <div class="row">
            <!-- Wedding Categories -->
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Wedding Categories</h5>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Religious Wedding</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Cultural Wedding</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Classic Wedding</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Destination Wedding</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Beach Wedding</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Garden Wedding</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Micro Wedding</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Backyard Wedding</li>
                    </ul>
                </div>
            </div>

            <!-- Birthday Categories -->
            <div class="col-md-6">
                <div class="card p-3">
                    <h5>Birthday Categories</h5>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Classic Birthday Party</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Surprise Birthday Party</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Destination Birthday</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Home Birthday Party</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Outdoor Birthday Party</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Garden Party</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Micro Party</li>
                        <li><i class="fa-solid fa-check-circle text-success me-2"></i> Beach Birthday Party</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="container mt-4">
        <div class="service-section">
            <div class="service-header">
                <span class="toggle-icon" onclick="toggleService()">−</span>
                <h2 id="wedding-theme">Event / Wedding Themes and Concepts Design</h2>
            </div>
            <div class="service-content">
                <p>This section contains details about various event and wedding themes and design concepts.</p>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row">
            <!-- Image Column -->
            <div class="col-lg-6">
                <img src="images/ser.wed (2).jpeg" class="img-fluid" alt="Wedding Image">
            </div>

            <!-- Text Content Column -->
            <div class="col-lg-6"> <br>
                <h1 class="text-center">WEDDING</h1>
                <p class="text-muted" style="font-size: 1.2rem; text-align: justify;">
                    Dream Event Company specializes in creating unforgettable wedding experiences through unique and
                    personalized themes and concept designs. With a keen eye for detail and a passion for elegance,
                    Dream Event Company transforms every venue into a stunning visual masterpiece, tailored to your
                    vision and style. <br><br>
                    Whether you're dreaming of a classic romantic celebration, a whimsical fairytale affair, or a bold,
                    modern celebration, their expert team offers a wide range of themes, from vintage glamour to boho
                    chic and everything in between. They provide full-service wedding design, including custom decor,
                    lighting, floral arrangements, and themed set-ups, ensuring that every aspect of your big day
                    reflects your love story.
                </p>
            </div>


            <div class="row justify-content-center mt-4">
                <div class="col-md-3 text-center">
                <button class="btn btn-success order-btn" onclick="window.location.href='weddingPackage.php'">ORDER NOW</button>
                </div>
            </div>


        </div>
    </div>




    <div class="container mt-4">
        <div class="service-section">
            <div class="service-header">
                <span class="toggle-icon" onclick="toggleService()">−</span>
                <h2 id="Birthday-theme">Event / Birthday Themes and Concepts Design</h2>
            </div>
            <div class="service-content">
                <p>This section contains details about various event and Birthday themes and design concepts.</p>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row">
            <!-- Image Column -->
            <div class="col-lg-6"> <br>
                <img src="images/birthday22.jpeg" class="img-fluid" alt="Birthday Image">
            </div>

            <!-- Text Content Column -->
            <div class="col-lg-6">
                <h1 class="text-center">BIRTHDAY</h1>
                <p class="text-muted" style="font-size: 1.2rem; text-align: justify;">
                    At Dream Event Company, we specialize in creating magical and unforgettable birthday celebrations
                    tailored to your unique vision. Whether it’s a fun-filled kids’ birthday party, a stylish teen
                    celebration, or an elegant milestone birthday, we bring creativity and innovation to every event.
                    Our expert team curates customized themes ranging from fairy tales, superheroes, enchanted forests,
                    luxury glamour, tropical vibes, and futuristic designs, ensuring a breathtaking experience for you
                    and your guests. <br> <br> We handle everything from themed decorations, personalized cakes,
                    creative
                    backdrops, lighting effects, entertainment, and interactive activities to transform your special day
                    into a dream come true.

                    With our attention to detail and passion for perfection, we guarantee a birthday event that reflects
                    your personality and leaves lasting memories. Let us turn your dream birthday theme into a reality
                    with Dream Event Company!
                </p>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-3 text-center">
                <button class="btn btn-success order-btn" onclick="window.location.href='BirthdayPackage.php'">ORDER NOW</button>
                </div>
            </div>

        </div>
    </div>





    <!-- Contact Section -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Left Side - Contact Box -->
            <div class="col-md-6">
                <div class="card text-center p-4 shadow">
                    <h3 class="mb-3">Get in Touch</h3>
                    <p><i class="fa-solid fa-location-dot"></i> Location: <a href="Honey Business
                        24 Fifth st., Los Angeles, USA">Honey Business
                            24 Fifth st., Los Angeles, USA</a></p>
                    <p><i class="fas fa-envelope text-primary me-2"></i> Email: <a
                            href="Dreamevent@gmail.com">Dreamevent@gmail.com</a></p>
                    <p><i class="fas fa-phone text-success me-2"></i> Phone: <a href="tel:+1234567890">+1234567890</a>
                    </p>
                    <!-- <button class="btn btn-primary mt-3">Contact Us</button> -->
                </div>
            </div>

            <!-- Right Side - Text Box -->
            <div class="col-md-4">
                <div class="text-box p-4">
                    <h6 class="fw-bold">COMPETITIVE RATES</h6>
                    <p>In our industry, contacts, negotiating deals, and experience ensure you get the best prices.</p>
                    <h6 class="fw-bold">REDUCTION OF STRESS</h6>
                    <p>We guide you through the process, making wedding planning fun, exciting, and stress-free.</p>
                    <h6 class="fw-bold">PROFESSIONAL CONSULTANCY</h6>
                    <p>We work with the top vendors in Sri Lanka, giving you access to the best service providers.</p>
                    <h6 class="fw-bold">SAVE YOUR PRECIOUS TIME</h6>
                    <p>Don't waste hours trying to find reliable vendors. We present you with perfect matches.</p>
                </div>
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






    <!-- Bootstrap and Font Awesome JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
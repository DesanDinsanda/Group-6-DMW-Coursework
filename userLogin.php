<?php
include 'conf.php'; // Include your database connection file

if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check admin credentials
    $adminQuery = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $adminResult = mysqli_query($conn, $adminQuery);

    if (mysqli_num_rows($adminResult) == 1) {
        // Admin login successful
        session_start();
        $_SESSION['email'] = $email;  // Store session for admin
        header("Location: adminHome.php");
        exit();
    }

    // Check customer credentials if not admin
    $customerQuery = "SELECT * FROM customer WHERE email = '$email' AND password = '$password'";
    $customerResult = mysqli_query($conn, $customerQuery);

    if (mysqli_num_rows($customerResult) == 1) {
        // Customer login successful
        session_start();
        $_SESSION['email'] = $email;  // Store session for customer
        header("Location: home.php");
        exit();
    }

    // If neither matches, show error
    echo "<script>alert('Invalid email or password!'); window.location.href='login.html';</script>";;
}
?>


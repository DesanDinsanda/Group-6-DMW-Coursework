<?php session_start(); ?>

<?php
include "conf.php"; // Include your database connection file

$customerEmail = $_SESSION['email'];

// Query to get the customer details
$sql = "SELECT firstName, lastName, email, number, password FROM customer WHERE email = '$customerEmail' "; // Assuming you have only one admin and using adminID to fetch
$result = mysqli_query($conn, $sql);

// Check if data exists
if (mysqli_num_rows($result) > 0) {
    // Fetch the data into an associative array
    $CustomerData = mysqli_fetch_assoc($result);
} else {
    echo "No customer data found!";
    exit;
}


// code for updating admin details
if (isset($_POST['updateProfile'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $number = $_POST['mobile'];
    $password = $_POST['password']; 

    $sql = "UPDATE customer SET firstName = '$firstName', lastName = '$lastName', email = '$email', number = '$number', password = '$password' WHERE email = '$customerEmail' ";
    $result = mysqli_query($conn, $sql);

    if($result == true){
        echo "<script>alert('Updated succesfully!'); window.location='customerProfile.php';</script>";
    }else{
        echo "<script>alert('There is an Error'); window.location='customerProfile.php';</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Edit Profile</title>

  <script>
    function validateForm() {
        var firstName = document.getElementById("first-name").value.trim();
        var lastName = document.getElementById("last-name").value.trim();
        var email = document.getElementById("email").value.trim();
        var mobile = document.getElementById("mobile").value.trim();
        var password = document.getElementById("password").value.trim();

        // First Name Validation
        if (firstName === "") {
            alert("Please enter your first name");
            return false;
        }

        // Last Name Validation
        if (lastName === "") {
            alert("Please enter your last name");
            return false;
        }

        // Email Validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "") {
            alert("Please enter your email");
            return false;
        } else if (!emailRegex.test(email)) {
            alert("Please enter a valid email address");
            return false;
        }

        // Mobile Number Validation
        if (mobile === "") {
            alert("Please enter your mobile number");
            return false;
        } else if (isNaN(mobile)) {
            alert("Please enter a valid mobile number");
            return false;
        }

        // Password Validation
        if (password === "") {
            alert("Please enter your password");
            return false;
        }

        return true; // If all validations pass, form submission proceeds
    }
</script>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:rgb(249, 244, 233);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 400px;
      text-align: center;
    }

    h2 {
      margin-bottom: 25px;
      color: #333;
      font-size: 24px;
    }

    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #555;
    }

    input[type="text"], input[type="email"], input[type="tel"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-sizing: border-box;
      font-size: 14px;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn-cancel {
      background-color: #ccc;
      color: #333;
    }

    .btn-cancel:hover {
      background-color: #bbb;
    }

    .btn-save {
      background-color: #ff6600;
      color: #fff;
    }

    .btn-save:hover {
      background-color: #e65c00;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Edit Customer Profile</h2>
    <form method="POST" action="customerProfile.php" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="firstName"  value="<?php echo $CustomerData['firstName']; ?>" required>
      </div>
      <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" name="lastName" value="<?php echo $CustomerData['lastName']; ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo $CustomerData['email']; ?>" required readonly>
      </div>
      <div class="form-group">
        <label for="mobile">Mobile Number</label>
        <input type="tel" id="mobile" name="mobile" value="<?php echo $CustomerData['number']; ?>" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="text" id="password" name="password" value="<?php echo $CustomerData['password']; ?>" required>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-cancel" onclick="window.location.href='home.php'">Cancel</button>
        <button type="submit" class="btn btn-save" name="updateProfile">Update</button>
      </div>
    </form>
  </div>
</body>
</html>

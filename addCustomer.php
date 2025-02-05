<?php 
include 'conf.php';

if(isset($_POST['addCustomerBtn'])){


$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$number = $_POST['number'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];


//echo $valName . "<br>" . $valEmail . "<br>" . $valPhone . "<br>" . $valAddress . "<br>" . $valType . "<br>" . $valDuration . "<br>" .$valDate;
}
$sql = "INSERT INTO customer (firstName, lastName, email, number,password, confirmPassword) VALUES ( '$firstName', '$lastName', '$email', '$number', '$password', '$confirmPassword')";
//die($sql);
$result = mysqli_query($conn, $sql);
if($result == true){
    header("Location: login.html");
        exit;
}
else {
    echo "Error" . $sql . "<br>" . mysqli_error($conn);

}


?>
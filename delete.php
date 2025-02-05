<?php
include 'conf.php';

$packageID = $_GET['packageID'];

$sql1 = "DELETE FROM package_item WHERE packageID = $packageID";
$result1 = mysqli_query($conn,$sql1);

$sql2 = "DELETE FROM package WHERE packageID = $packageID";
$result2 = mysqli_query($conn,$sql2);

if($result1 && $result2){
    echo "<script>alert('Package deleted!'); window.location='managePackage.php';</script>";
} else {
    echo "Error deleting record!".mysqli_error($conn);
}
?>
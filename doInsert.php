<?php 
include 'conf.php';

if (isset($_POST['submit'])) {
    // Get package details
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    // Collect all items into an array
    $items = [];
    for ($i = 1; $i <= 20; $i++) {
        if (!empty($_POST["item$i"])) {
            $items[] = $_POST["item$i"];
        }
    }

    // Insert package details into the package table
    $sql = "INSERT INTO package (packageName, price, eventType) VALUES ('$name', '$price', '$type')";
    if (mysqli_query($conn, $sql)) {
        // Get the last inserted package ID
        $packageID = mysqli_insert_id($conn);

        // Insert package-item relationships
        foreach ($items as $itemName) {
            // Get the itemID from the item table (or insert if not exists)
            $itemQuery = "SELECT itemID FROM item WHERE itemName = '$itemName'";
            $itemResult = mysqli_query($conn, $itemQuery);
            
            if (mysqli_num_rows($itemResult) > 0) {
                $itemRow = mysqli_fetch_assoc($itemResult);
                $itemID = $itemRow['itemID'];
            } else {
                // Insert new item into the item table
                $insertItemQuery = "INSERT INTO item (itemName) VALUES ('$itemName')";
                mysqli_query($conn, $insertItemQuery);
                $itemID = mysqli_insert_id($conn);
            }

            // Insert into PackageItem table
            $packageItemQuery = "INSERT INTO package_item (packageID, itemID) VALUES ('$packageID', '$itemID')";
            mysqli_query($conn, $packageItemQuery);
        }

        header("Location: managePackage.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "No data received";
}
?>

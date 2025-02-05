<?php
include 'conf.php';

if (isset($_GET['packageID'])) {
    $packageID = $_GET['packageID'];

    // Fetch package details
    $sql = "SELECT * FROM package WHERE packageID = $packageID";
    $result = mysqli_query($conn, $sql);
    $package = mysqli_fetch_assoc($result);

    // Fetch associated items
    $itemQuery = "SELECT i.itemName FROM package_item pi
                  JOIN item i ON pi.itemID = i.itemID
                  WHERE pi.packageID = $packageID";
    $itemResult = mysqli_query($conn, $itemQuery);

    $items = [];
    while ($row = mysqli_fetch_assoc($itemResult)) {
        $items[] = $row['itemName'];
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];

    // Collect updated items
    $updatedItems = [];
    for ($i = 1; $i <= 20; $i++) {
        if (!empty($_POST["item$i"])) {
            $updatedItems[] = $_POST["item$i"];
        }
    }

    // Update package details
    $updatePackage = "UPDATE package SET packageName='$name', price='$price', eventType='$type' WHERE packageID=$packageID";
    mysqli_query($conn, $updatePackage);

    // Remove old package items
    $deleteOldItems = "DELETE FROM package_item WHERE packageID=$packageID";
    mysqli_query($conn, $deleteOldItems);

    // Insert updated items
    foreach ($updatedItems as $itemName) {
        $itemQuery = "SELECT itemID FROM item WHERE itemName = '$itemName'";
        $itemResult = mysqli_query($conn, $itemQuery);

        if (mysqli_num_rows($itemResult) > 0) {
            $itemRow = mysqli_fetch_assoc($itemResult);
            $itemID = $itemRow['itemID'];
        } else {
            $insertItemQuery = "INSERT INTO item (itemName) VALUES ('$itemName')";
            mysqli_query($conn, $insertItemQuery);
            $itemID = mysqli_insert_id($conn);
        }

        $packageItemQuery = "INSERT INTO package_item (packageID, itemID) VALUES ('$packageID', '$itemID')";
        mysqli_query($conn, $packageItemQuery);
    }

    echo "<script>alert('Package Edited!'); window.location='managePackage.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<script>
  function edit() {
    const confirmation = confirm("Are you sure you want to edit this package?");
    if (confirmation) {
      window.location.href = "managePackage.php"; // Redirect to logout if 'Yes' is clicked
    }
    // If 'No' is clicked, nothing happens and the user stays on the page
  }
</script>

<body>
    <h2 class="text-center mt-4">Edit Package</h2>
    <form method="POST" action="" class="border rounded p-4 w-50 mx-auto">
        <div class="mb-3">
            <label class="form-label fw-bold">Package Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $package['packageName']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Package Price</label>
            <input type="number" class="form-control" name="price" value="<?php echo $package['price']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Event Type</label>
            <select class="form-select" name="type">
                <option value="Wedding" <?php echo ($package['eventType'] == 'Wedding') ? 'selected' : ''; ?>>Wedding</option>
                <option value="Birthday" <?php echo ($package['eventType'] == 'Birthday') ? 'selected' : ''; ?>>Birthday</option>
            </select>
        </div>

        <?php
        for ($i = 1; $i <= 20; $i++) {
            $value = isset($items[$i - 1]) ? $items[$i - 1] : '';
            echo '
                <div class="mb-3">
                    <label class="form-label fw-bold">Item ' . $i . '</label>
                    <input type="text" class="form-control" name="item' . $i . '" value="' . $value . '">
                </div>';
        }
        ?>

        <button type="submit" class="btn btn-success" onclick="edit()"  name="submit">Update Package</button>
    </form>
</body>
</html>

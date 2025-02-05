<?php
include 'conf.php'; // Include the database connection file

// Fetch all birthday packages
$sql = "SELECT packageID, packageName, price, eventType FROM package WHERE eventType = 'Birthday'";
$result = mysqli_query($conn, $sql);

echo '<div class="container mt-5">';
echo '<div class="row">';

// Check if there are any packages available
if (mysqli_num_rows($result) > 0) {
    // Loop through each package
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-md-4 mb-4">';
        
        // Added a new class "card-hover" for hover effects
        echo '<div class="card h-100 shadow-sm card-hover">';

        // Display package details
        echo '<div class="card-body">';
        echo '<h5 class="card-title text-start text-primary mt-4 fw-bold">' . htmlspecialchars($row['packageName']) . '</h5>';
        echo '<h6 class="card-subtitle text-danger text-start mt-2 fs-5">Rs ' . htmlspecialchars(number_format($row['price'])) . '</h6>';

        // Fetch associated items for this package
        $packageID = $row['packageID'];
        $itemQuery = "SELECT i.itemName FROM package_item pi
                      JOIN item i ON pi.itemID = i.itemID
                      WHERE pi.packageID = $packageID";
        $itemResult = mysqli_query($conn, $itemQuery);

        // Check if there are items related to the package
        if (mysqli_num_rows($itemResult) > 0) {
            echo '<h6 class="mt-4 text-secondary">Included Items:</h6>';
            echo '<ul class="list-unstyled">';
            while ($itemRow = mysqli_fetch_assoc($itemResult)) {
                echo '<li>✔ ' . htmlspecialchars($itemRow['itemName']) . '</li>'; // Added checkmark for style
            }
            echo '</ul>';
        } else {
            echo '<p class="text-muted">No items included in this package.</p>';
        }

        echo '</div>'; // Close card-body

        // Display "Add to Cart" button with hover effect
        echo '<div class="card-footer text-center">';
        echo '<form action="add_to_cart.php" method="post">
                <input type="hidden" name="package_name" value="' . htmlspecialchars($row['packageName']) . '">
                <input type="hidden" name="package_price" value="' . htmlspecialchars($row['price']) . '">
                <input type="hidden" name="packageID" value="' . htmlspecialchars($row['packageID']) . '">
                
                <button type="submit" name="addCart" class="btn btn-primary btn-hover">Add to Cart</button>
            </form>';
        echo '</div>'; // Close card-footer

        echo '</div>'; // Close card
        echo '</div>'; // Close col-md-4
    }
} else {
    // If no packages are found
    echo '<p class="text-center">No packages available.</p>';
}

echo '</div>'; // Close row
echo '</div>'; // Close container

// Close the database connection
mysqli_close($conn);
?>

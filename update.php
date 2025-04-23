<?php
include 'conee.php'; // Include your database connection

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Fetch the current values for the service
    $query = "SELECT services, cost FROM restaurant WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentService = $row['services'];
        $currentCost = $row['cost'];
    } else {
        echo "No service found with that ID.";
        exit();
    }
} else {
    echo "ID not specified.";
    exit();
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newService = mysqli_real_escape_string($conn, $_POST['services']);
    $newCost = mysqli_real_escape_string($conn, $_POST['cost']);

    // Update the service in the database
    $updateQuery = "UPDATE restaurant SET services='$newService', cost='$newCost' WHERE id='$id'";

    if (mysqli_query($conn, $updateQuery)) {
        header("Location: adminPanel2.php"); // Redirect back to the admin panel
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Service</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Update Service</h2>
        <form action="update.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label for="services">Service:</label>
                <input type="text" class="form-control" name="services" id="services" value="<?php echo htmlspecialchars($currentService); ?>" required>
            </div>
            <div class="form-group">
                <label for="cost">Cost:</label>
                <input type="number" class="form-control" name="cost" id="cost" value="<?php echo htmlspecialchars($currentCost); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="adminPanel2.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
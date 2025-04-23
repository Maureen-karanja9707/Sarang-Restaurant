
<?php
include 'conee.php'; // Include your database connection

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Delete the service
    $query = "DELETE FROM restaurant WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: adminPanel2.php"); // Redirect back to the admin panel
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
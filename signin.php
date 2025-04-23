<?php
include("conee.php"); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required POST variables are set
    if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
        // Collect and sanitize form data
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Check if fields are not empty
        if (!empty($name) && !empty($email) && !empty($password)) {
            // Save to database 
            $query = "INSERT INTO signin (name, email, password) VALUES ('$name', '$email', '$password')";
            
            // Execute the query and check for success
            if (mysqli_query($conn, $query)) {
                header("Location: index.html");
               exit; // It's a good practice to exit after a redirect
            } else {
                echo "Error: " . mysqli_error($conn); // Show error if query fails
            }
        } else {
            echo "PLEASE ENTER VALID INFORMATION !!";
        }
    } else {
        echo "Required fields are missing.";
    }
}
?>
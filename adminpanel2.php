<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file if needed -->
    
    <!-- Font Awesome (for social media icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>ADMIN PANEL</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(250, 184, 4); /* Light background color */
            margin: 0; /* Reset default margins */
            padding: 20px; /* Padding around the body */
            height: 100vh; /* Full viewport height */
            display: flex; /* Enable flexbox */
            flex-direction: column; /* Stack items vertically */
            justify-content: flex-start; /* Align items to the top */
            align-items: center; /* Center items horizontally */
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        nav {
            width: 100%; /* Full width for the navigation */
        }

        .navbar-nav {
            flex-direction: row; /* Horizontal layout for nav items */
        }

        .nav-item {
            margin-left: 15px; /* Space between nav items */
        }

        main {
            margin-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center contents */
            margin-bottom: 30px; /* Add some space before table */
        }

        form {
            background-color: #fff; /* White background for the form */
            padding: 20px; /* Padding around the form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
            margin: 20px 0; /* Space around the form */
            width: 600px; /* Fixed width for the form */
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            margin: 10px 0; /* Spacing between form inputs */
            width: 100%; /* Full width of the input fields */
            border: 1px solid #ccc; /* Light border for the inputs */
            border-radius: 4px; /* Rounded corners for inputs */
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #333; /* Dark background for submit button */
            color: white; /* White text color */
            border: none;
            border-radius: 4px; /* Rounded corners */
            cursor: pointer;
            width: 100%; /* Full width for the button */
        }

        input[type="submit"]:hover {
            background-color: #555; /* Slightly lighter background on hover */
        }

        table {
            width: 80%; /* Width of the table */
            margin: 20px 0; /* Margin above and below the table */
            border-collapse: collapse; /* Remove spacing between table cells */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
        }

        th, td {
            padding: 15px; /* Padding inside cells */
            text-align: left; /* Align text to the left */
            border: none; /* No borders */
        }

        th {
            background-color: rgb(0, 0, 0); /* Header background color */
            color: white; /* Header text color */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra striping for rows */
        }

        footer {
            text-align: center; /* Center footer text */
            margin-top: 20px; /* Space above footer */
        }

        .social-links a {
            margin-right: 10px;
            text-decoration: none;
        }

        .social-links a i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallery">Gallery</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <form action="adminPanel.php" method="POST">
            <label for="services">Services:</label>
            <input type="text" name="services" id="services" required>
            <label for="cost">Cost:</label>
            <input type="number" name="cost" id="cost" required>
            <input type="submit" value="SUBMIT">
        </form>
    </main>
    
    <?php
    include 'conee.php'; // Include the connection file

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the form data
        $services = mysqli_real_escape_string($conn, $_POST['services']);
        $cost = mysqli_real_escape_string($conn, $_POST['cost']);

        // Insert the data into the database
        $query = "INSERT INTO restaurant (services, cost) VALUES ('$services', '$cost')";
        
        if (mysqli_query($conn, $query)) {
            echo "<p>Service added successfully!</p>";
        } else {
            echo "<p>Error: " . mysqli_error($conn) . "</p>";
        }
    }

    // Fetch data from the database
    $query = "SELECT id, services, cost FROM restaurant";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Start the HTML output for the table
        echo "<h2>Services</h2>";
        echo "<table>
                <tr>
                    <th>Service</th>
                    <th>Cost</th>
                    <th>Actions</th>
                </tr>";
        
        // Output data for each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['services']) . "</td>
                    <td>" . htmlspecialchars($row['cost']) . "</td>
                    <td>
                        <a href='update.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Update</a>
                        <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this service?\");'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No services found.</p>";
    }

    // Close the database connection
     mysqli_close($conn);
    ?>

    <!-- Footer -->
    <footer class="beige">
        <div class="social-links mt-3">
            <a href="https://www.facebook.com" class="btn btn-primary" target="_blank" role="button">
                <i class="fab fa-facebook-f"></i> Facebook
            </a>
            <a href="https://www.twitter.com" class="btn btn-info" target="_blank" role="button">
                <i class="fab fa-twitter"></i> Twitter
            </a>
            <a href="https://www.instagram.com" class="btn btn-danger" target="_blank" role="button">
                <i class="fab fa-instagram"></i> Instagram
            </a>
            <a href="https://www.linkedin.com" class="btn btn-dark" target="_blank" role="button">
                <i class="fab fa-linkedin-in"></i> LinkedIn
            </a>
        </div>
        <p>&copy; 2025 SARANJAHOTEL.CO.KE</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
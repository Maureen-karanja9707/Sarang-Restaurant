
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file if needed -->
    <!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services.php">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gallery.html">Gallery</a>
            </li>
        </ul>
    </div>
</nav>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(250, 184, 4); /* Light background color */
            margin: 0;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center contents */
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
            background-color:rgb(0, 0, 0); /* Header background color */
            color: white; /* Header text color */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra striping for rows */
        }

        footer {
            text-align: center; /* Center footer text */
            margin-top: 20px; /* Space above footer */
        }
    </style>
</head>
<body>
    <header>
        <h1>Our Services</h1>
    </header>
    
    <main>
        <h2>Available Services</h2>
        
        <?php
        include 'conee.php'; // Include your database connection

        // Fetch data from the database
        $query = "SELECT services, cost FROM restaurant";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Start the HTML table
            echo "<table>
                    <tr>
                        <th>Service</th>
                        <th>Cost</th>
                    </tr>";
            
            // Output data for each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['services']) . "</td>
                        <td>" . htmlspecialchars($row['cost']) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No services found.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </main>

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
    <p>&copy;@ SARANJAHOTEL.CO.KE 2025</p>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>    
</body>
</html>
</body>
</html>


<?php
// theater_times.php

// Include your database connection file or initialize the connection here
// Replace 'your_database' with your actual database name
require_once('db.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch available theaters and their show times
$sql = "SELECT t.*, th.name AS theater_name, m.title AS movie_title FROM times t
        INNER JOIN THEATER th ON t.theater_id = th.id
        INNER JOIN MOVIE m ON t.movie_id = m.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Theater Times</title>
    <!-- Bootstrap CSS link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add additional custom styles if needed */
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <div class="container">
        <h1 class="mt-4 mb-4">Available Theaters and Show Times</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Theater Name</th>
                        <th>Movie Title</th>
                        <th>Show Time</th>
                        <th>Available Seats</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP code to fetch and display theater times -->
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['theater_name'] . "</td>";
                            echo "<td>" . $row['movie_title'] . "</td>";
                            echo "<td>" . $row['show_time'] . "</td>";
                            echo "<td>" . $row['available_seats'] . "</td>";
                            // Add more columns as needed
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No data available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Search</title>
    <!-- Bootstrap CSS link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for specific styling */
        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        .order-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .order-results {
            text-align: center;
        }
        .movie-item {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

    
    <div class="container order-results">
    <h1 class="mt-4 mb-4">Your Oders</h1>
        <?php
        error_reporting(0);
        // Handle movie search logic here
        if (isset($_SESSION['userEmail']) && !empty($_SESSION['userEmail'])) {
            require_once('db.php');
            // Check connection
            $email = $_SESSION['userEmail'];
            echo $email;
            // Replace database credentials with your own
            //require_once('db.php');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL query to search for movies
            $sql = "SELECT MOVIE.title, ORDERS.total_price,CUSTOMER.email  FROM ORDERS INNER JOIN CUSTOMER on ORDERS.customer_id=CUSTOMER.id 
            inner join MOVIE on ORDERS.movie_id = MOVIE.id where CUSTOMER.email='$email'";

            // Execute the query
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display search results
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="movie-item">';
                    
                    // Display other movie details...
                    
                    echo '<div class="row justify-content-center">';
                    echo '<div class="col-md-6">';
                    echo '<div class="movie-item">';
                    //echo '<input type="hidden" name="movie_id" value="' . $row['id'] . '">';
                    echo '<h3>' . $row['title'] . '</h3>';
                    echo '<p>Email: ' . $row['email'] . '</p>';
                    echo '<p>Price: ' . $row['total_price'] . '</p>';
                   //echo '<p>Type: ' . $row['format'] . '</p>';
                   // echo '<p>Price: ' . $row['price'] . '</p>';
            
                    echo '</div>';
                    
                    
                    
                    // Add more details if needed
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No Orders found.</p>';
            }

            // Close the database connection
            $conn->close();
        } else {
            echo '<p>No search results found.</p>';
        }
        ?>
    </div>

    <!-- Bootstrap JS scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

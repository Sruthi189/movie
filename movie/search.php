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
        .search-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .search-results {
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

    <div class="container search-container">
        <form class="form-inline justify-content-center" method="GET" action="search.php">
            <input type="text" class="form-control mr-sm-2" id="search-input" name="query" placeholder="Search for a movie...">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="container search-results">
        <?php
        // Handle movie search logic here
        if (isset($_GET['query']) && !empty($_GET['query'])) {
            $query = $_GET['query'];

            // Replace database credentials with your own
            require_once('db.php');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL query to search for movies
            $sql = "SELECT m.id,m.title, m.year, m.wdb_rating,i.format,
            case 
            WHEN i.format='physical' THEN p.price
            ELSE s.price
            END as price
            FROM MOVIE m inner join PHYSICAL p on m.id=p.movie_id
                   inner join INVENTORY i on m.id=i.movie_id
                   inner join STREAMING s on m.id=s.movie_id
            WHERE title LIKE '%" . $query . "%'";

            // Execute the query
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display search results
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="movie-item">';
                    
                    // Display other movie details...
                    echo '<form method="POST" action="cart_add.php">';
                    echo '<div class="row justify-content-center">';
                    echo '<div class="col-md-6">';
                    echo '<div class="movie-item">';
                    echo '<input type="hidden" name="movie_id" value="' . $row['id'] . '">';
                    echo '<h3>' . $row['title'] . '</h3>';
                    echo '<p>Year: ' . $row['year'] . '</p>';
                    echo '<p>Rating: ' . $row['wdb_rating'] . '</p>';
                    echo '<p>Type: ' . $row['format'] . '</p>';
                    echo '<p>Price: ' . $row['price'] . '</p>';
                    echo '<button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>';
                    echo '</form>';
                    echo '</div>';
                    
                    
                    
                    // Add more details if needed
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No search results found.</p>';
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

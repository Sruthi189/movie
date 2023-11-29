<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Search</title>
    <!-- Bootstrap CSS link -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for specific styling */
        body {
            background-image: url('https://trumpwallpapers.com/wp-content/uploads/Marvel-Wallpaper-04-3840-x-2160.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 30vh; /* Adjust this for vertical centering */
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

    <!-- Include the navbar from navbar.php -->
    <?php include 'navbar.php'; ?>

    <div class="container search-container" style="margin: top 20px;">
        <form class="form-inline justify-content-center" method="GET" action="search.php">
            <input type="text" class="form-control mr-sm-2" id="search-input" name="query" placeholder="Search for a movie...">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="container search-results">
    
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

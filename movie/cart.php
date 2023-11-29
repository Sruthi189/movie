<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        /* Add any additional custom styling here */
        .cart-table {
            width: 100%;
            margin-top: 20px;
        }
        .cart-table th,
        .cart-table td {
            text-align: center;
            vertical-align: middle;
        }
        .cart-table th {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <!-- Navbar code -->
    <!-- ... (navbar code) ... -->

    <div class="container mt-4">
        <h2>Your Shopping Cart</h2>
        <div class="table-responsive">
            <table class="table table-bordered cart-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Action</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //session_start();
                    
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        require_once('db.php');
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        foreach ($_SESSION['cart'] as $movie_id => $quantity) {
                            $sql = "SELECT m.id,m.title, m.year, m.wdb_rating,i.format,
                            case 
                            WHEN i.format='physical' THEN p.price
                            ELSE s.price
                            END as price
                            FROM MOVIE m inner join PHYSICAL p on m.id=p.movie_id
                                   inner join INVENTORY i on m.id=i.movie_id
                                   inner join STREAMING s on m.id=s.movie_id
                            WHERE m.id=$movie_id";
                            $result = $conn->query($sql);
    
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['title'] . '</td>';
                                    //echo '<td>' . $row['year'] . '</td>';
                                   //echo '<td>' . $row['wdb_rating'] . '</td>';
                                    echo '<td>'. $row['format'] . '</td>';
                                    echo '<td>'. $row['price'] . '</td>';
                                    // Column for Remove button
                                    echo '<td><form method="POST" action="remove_item.php">';
                                    echo '<input type="hidden" name="movie_id" value="' . $movie_id . '">';
                                    echo '<button type="submit" name="remove_item" class="btn btn-danger btn-sm">Remove</button>';
                                    echo '</form></td>';

                                    
                                    echo '</tr>';
                                }
                            }
                        }

                        $conn->close();
                    } else {
                        echo '<tr><td colspan="3">Your cart is empty</td></tr>';
                    }
                    ?>
                                           
                            <?php if(isset($_SESSION['user_id'])) { ?>
                                <form method="POST" action="checkout.php">
                                    <button type="submit" name="checkout" class="btn btn-success">Checkout</button>
                                </form>
                            <?php } else { ?>
                                <a href="login.php" class="btn btn-primary" href="#" data-toggle="modal" data-target="#loginModal">Login to Checkout</a>
                            <?php } ?>
                       

                </tbody>
            </table>
        </div>
    </div>
     <!-- Login Modal -->
     <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Login Form -->
                    <form method="post" action="login.php">
                        <div class="form-group">
                            <label for="loginEmail">Email</label>
                            <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

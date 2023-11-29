<?php
session_start();

if(isset($_POST['remove_item'])) {
    $movie_id = $_POST['movie_id'];

    // Check if the movie_id exists in the cart session
    if(isset($_SESSION['cart'][$movie_id])) {
        // Remove the movie from the cart
        unset($_SESSION['cart'][$movie_id]);
    }

    // Redirect back to the cart page after removing the item
    header("Location: cart.php");
    exit;
} else {
    // Redirect to an error page or handle the situation appropriately
    header("Location: error.php");
    exit;
}
?>

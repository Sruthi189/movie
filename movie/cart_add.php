<?php

session_start();

// Adding movies to the cart
if (isset($_POST['add_to_cart'])) {
    $movie_id = $_POST['movie_id'];
    
    // Assuming you have a session variable 'cart' to store cart items
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Add the selected movie to the cart (here, using movie_id as the key)
    $_SESSION['cart'][$movie_id] = 1; // You can adjust the value as needed
    //header("Location: search.php");
    echo 'Added to Cart';
    exit;
}

// Displaying the cart in the navbar
function displayCartCount() {
    if (isset($_SESSION['cart'])) {
        $count = count($_SESSION['cart']);
        echo '<span class="badge badge-info">' . $count . '</span>';
    } else {
        echo '<span class="badge badge-info">0</span>';
    }
}
?>
<?php
session_start();

if(isset($_POST['checkout'])) {
    if(isset($_SESSION['user_id'])) {
        $customer_id = $_SESSION['user_id'];
        
        // Assuming you have the movie_id in the cart stored as $_SESSION['cart']
        require_once('db.php');
        foreach ($_SESSION['cart'] as $movie_id => $quantity) {
            
            
            // Here, perform calculations like total price based on quantity and movie price
            // Replace $total_price with the calculated total price
            $sql = "SELECT m.id,m.title, m.year, m.wdb_rating,i.format,
            case 
            WHEN i.format='physical' THEN p.price
            ELSE s.price
            END as price
            FROM MOVIE m inner join PHYSICAL p on m.id=p.movie_id
                   inner join INVENTORY i on m.id=i.movie_id
                   inner join STREAMING s on m.id=s.movie_id
            WHERE m.id='$movie_id'";

            // Execute the query
            $result = $conn->query($sql);
            //$result = mysqli_query($conn, $sql);
            //$row = mysqli_fetch_assoc($result);

            //echo '<pre>'; print_r($_SESSION['cart']); echo '</pre>';
            $q=1;
            //$total_price = $_SESSION['cart']; // Calculate total price

            // Perform the SQL INSERT to create an order for each movie in the cart
            // Use prepared statements to prevent SQL injection
            // Replace 'your_database' with your actual database name
            echo $movie_id;
            //echo $row['price'];
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo $movie_id;
                echo $row['price'];
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
    
                $stmt = $conn->prepare("INSERT INTO ORDERS (customer_id, movie_id, quantity, total_price) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("iiid",$customer_id, $movie_id, $q, $row['price']);
                $stmt->execute();
                
                $stmt->close();
                
                $updateSql = "UPDATE INVENTORY SET quentity = quantity-1 where movie_id='$movie_id'";
                $conn->query($updateSql);
            
           } 
            }
        } 
        // Clear the cart after checkout
        unset($_SESSION['cart']);

        // Redirect to a thank you page or order summary page
        header("Location: thank_you.php");
        $conn->close();
        exit;
    } else {
        // If user is not logged in, redirect to login page
        header("Location: login.php");
        exit;
    }
} else {
    // Redirect to an error page or handle the situation appropriately
    header("Location: error.php");
    exit;
}
?>

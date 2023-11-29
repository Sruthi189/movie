<?php
session_start();

require_once('db.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

    // Check if the user exists in the CUSTOMER table
    $sql = "SELECT * FROM CUSTOMER WHERE email='$loginEmail' AND password='$loginPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // User found, set session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['userEmail'] = $loginEmail;
        $_SESSION['user_id']=$row['id'];
        // Fetch more user details and set in session if needed

        // Redirect to dashboard or homepage
        header("Location: index.php"); // Replace with your dashboard or homepage URL
        exit();
    } else {
        echo "Login failed. Please check your credentials.";
    }
}

$conn->close();
?>

<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}

$server = "localhost";
$user = "root";
$pass = "";
$db = "clients_db";

// Create connection
$conn = mysqli_connect($server, $user, $pass, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user email from session
$user_email = $_SESSION['user_email'];

// Prepare the DELETE query
$sql = "DELETE FROM `users` WHERE USER_EMAIL='$user_email'";

// Execute the query
if (mysqli_query($conn, $sql)) {
    // Destroy the session to log the user out
    session_destroy();
    echo "<script>
            alert('Account deleted successfully.');
            window.location.href = 'login.php'; // Redirect to the login page
          </script>";
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>

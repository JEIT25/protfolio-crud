<?php
session_start(); // Start the session

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

if (isset($_POST['submit'])) {
    $user_email = $_POST['USER_EMAIL'];
    $pass = $_POST['PASSWORD'];

    // Prepare the SELECT query
    $sql = "SELECT * FROM `users` WHERE USER_EMAIL='$user_email' AND PASSWORD='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['user_email'] = $user_email;

        echo "<script>
                alert('Login successful, Redirecting to Dashboard');
                window.location.href = 'dashboard.php'; // Redirect to the dashboard or appropriate page
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Invalid email or password, please try again!');
                window.location.href = 'login.php'; // Redirect back to login page
              </script>";
        exit();
    }
}

// Close the connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Login Form</title>
</head>
<body>

<?php include('./navbar.php') ?>

<main class="container">
    <h2>Log In Client Account</h2>
    <form action="./login.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="USER_EMAIL" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="PASSWORD" required>
        </div>
        <div class="form-group">
            <button type="submit" name="submit">Log In</button>
        </div>
    </form>
    <div class="signup-link">
        <p>Don't have a client account? <a href="./signup.php">Sign Up</a></p>
    </div>
</main>

</body>
</html>

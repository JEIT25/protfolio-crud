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

// Fetch user information from the database
$user_email = $_SESSION['user_email'];
$sql = "SELECT FNAME, LNAME, USER_EMAIL FROM `users` WHERE USER_EMAIL='$user_email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "<script>
            alert('User not found.');
            window.location.href = './login.php';
          </script>";
    exit();
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <title>Dashboard</title>
</head>
<body>

<?php include ('./navbar.php') ?>;

<main class="container">
    <h2>Client information</h2>

    <div class="user-info">
        <p>Client Name: <?php echo $user['FNAME'] . " " . $user['LNAME']; ?></p>
        <p>Email: <?php echo $user['USER_EMAIL']; ?></p>
    </div>


    <form action="update.php" method="get">
        <div class="form-group">
            <button onclick="window.href='./update.php'">Update Account</button>
        </div>
    </form>

    <form action="./delete.php" method="post">
        <div class="form-group">
            <button type="submit" name="delete" style="background-color: #e74c3c;">Delete Account</button>
        </div>
    </form>

    <form action="./logout.php" method="post">
        <div class="form-group logout">
            <button type="submit" name="logout" style="background-color: #2f217e;">Log Out</button>
        </div>
    </form>

    <button class="hire-me-btn2" onclick="window.location.href = './hireme.php'" >HIRE ME</button>
</main>

</body>
</html>

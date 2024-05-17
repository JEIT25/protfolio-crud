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

$user_email = $_SESSION['user_email'];

// Handle form submission
if (isset($_POST['update'])) {
    $fname = $_POST['FNAME'];
    $lname = $_POST['LNAME'];
    $new_email = $_POST['USER_EMAIL'];
    $new_password = $_POST['PASSWORD'];
    $confirm_password = $_POST['PASSWORD_CONFIRM'];

    // Check if passwords match
    if (!empty($new_password) && $new_password !== $confirm_password) {
        echo "<script>
                alert('Passwords do not match. Please try again.');
                window.location.href = 'update.php';
              </script>";
        exit();
    }

    // Update query
    $update_query = "UPDATE `users` SET FNAME='$fname', LNAME='$lname', USER_EMAIL='$new_email'";
    if (!empty($new_password)) {
        $update_query .= ", PASSWORD='$new_password'";
    }
    $update_query .= " WHERE USER_EMAIL='$user_email'";

    // Execute the update query
    if (mysqli_query($conn, $update_query)) {
        // Update session email if it was changed
        $_SESSION['user_email'] = $new_email;
        echo "<script>
                alert('Account information updated successfully.');
                window.location.href = 'dashboard.php';
              </script>";
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch current user information
$sql = "SELECT FNAME, LNAME, USER_EMAIL FROM `users` WHERE USER_EMAIL='$user_email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "<script>
            alert('User not found.');
            window.location.href = 'dashboard.php';
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
    <title>Update Account</title>
    <link rel="stylesheet" href="./styles/update.css">
</head>
<body>

<main class="container">
    <h2>Update Account</h2>
    <form action="update.php" method="post">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="FNAME" value="<?php echo $user['FNAME']; ?>">
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="LNAME" value="<?php echo $user['LNAME']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="USER_EMAIL" value="<?php echo $user['USER_EMAIL']; ?>">
        </div>
        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="PASSWORD">
        </div>
        <div class="form-group">
            <label for="password2">Confirm New Password</label>
            <input type="password" id="password2" name="PASSWORD_CONFIRM">
        </div>
        <div class="form-group">
            <button type="submit" name="update">Update Account</button>
        </div>
    </form>
</main>

</body>
</html>

<?php
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
    $fname = $_POST['FNAME'];
    $lname = $_POST['LNAME'];
    $user_email = $_POST['USER_EMAIL'];
    $pass = $_POST['PASSWORD'];
    $pass_confirm = $_POST['PASSWORD_CONFIRM'];

    if ($pass !== $pass_confirm) {
        echo "<script>
                alert('Password did not match, please try again!');
                window.location.href = './signup.php'; // Use JavaScript to redirect after showing alert
              </script>";
        exit(); // Stop script execution after the alert and redirect
    }

    // Prepare the INSERT query
    $sql = "INSERT INTO `users` (FNAME, LNAME, USER_EMAIL, PASSWORD) VALUES ('$fname', '$lname', '$user_email', '$pass')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('New client account created successfully, Redirecting to Log In Page');
                window.location.href = 'login.php'; // Use JavaScript to redirect after showing alert
              </script>";
        exit(); // Stop script execution after the alert and redirect
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <?php include ('../styles/fonts.php') ?>
    <link rel="stylesheet" href="./styles/signup.css">
    <title>Sign Up Form</title>
</head>

<style>
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: "Exo 2" , Arial, Helvetica, sans-serif;
    background-color: #2f217e;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    margin-top: 5rem;
}

h2 {
    margin-bottom: 1rem;
    font-size: 1.5rem;
    text-align: center;
}

.form-group {
    margin-top: 1rem;
    margin-bottom: 1rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
}

.form-group input {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-group button {
    width: 100%;
    padding: 0.75rem;
    border: none;
    border-radius: 4px;
    background-color: #F86F03;
    font-weight: bold;
    color: #fff;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-group button:hover {
    background-color: #f8832a;
}

@media (max-width: 480px) {
    .container {
        padding: 1rem;
    }

    h2 {
        font-size: 1.25rem;
    }
}
</style>
<body>

<?php include ('./navbar.php') ?>

<main class="container">
    <h2>Sign Up For A Client Account</h2>
    <form action="./signup.php" method="post">
        <section class="form-group">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="FNAME" required>
        </section>
        <section class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="LNAME" required>
        </section>
        <section class="form-group">
            <label for="email">Email Username</label>
            <input type="email" id="email" name="USER_EMAIL" required>
        </section>
        <section class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="PASSWORD" required>
        </section>
        <section class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" id="password2" name="PASSWORD_CONFIRM" required>
        </section>
        <section class="form-group">
            <button type="submit" name="submit">Sign Up</button>
        </section>
    </form>
</main>

</body>
</html>

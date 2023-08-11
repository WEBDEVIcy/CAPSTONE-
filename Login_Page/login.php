<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = '';
$database = "infodb";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password
    if (empty($username) || empty($password)) {
        header("Location:  ../Main/index.php?error=Please enter both username and password");
        exit();
    }

    // Authenticate the user
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User is authenticated, set cookie and redirect to the home page
        setcookie("username", $username, time() + (86400 * 30), "/");
        header("Location: ../Main/index.php");
        exit();
    } else {
        // Invalid credentials
        header("Location:  ../Main/index.php?error=Invalid username or password");
        exit();
    }
}
?>

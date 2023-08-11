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

// Check if the registration form is submitted
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validate username, password, and email
    if (empty($username) || empty($password) || empty($email)) {
        header("Location: register.html?register_error=Please enter all fields");
        exit();
    }

    // Check if the username already exists
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkQuery);

    if ($result->num_rows > 0) {
        header("Location: register.html?register_error=Username already exists");
        exit();
    }

    // Check if the email is already registered
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $resultEmail = $conn->query($checkEmailQuery);

    if ($resultEmail->num_rows > 0) {
        header("Location: register.html?register_error=Email already registered");
        exit();
    }

    // Insert new user into the database
    $insertQuery = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($insertQuery) === TRUE) {
        // Registration successful, redirect to the login page
        header("Location: index.php");
        exit();
    } else {
        // Error occurred during registration
        header("Location: register.html?register_error=Registration failed");
        exit();
    }
}
?>

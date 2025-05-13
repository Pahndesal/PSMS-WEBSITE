<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publicsafetydb";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Initialize error and success message variables
$error = "";
$success = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the username and password are set
    if (isset($_POST['admin_name']) && isset($_POST['admin_pass'])) {
        // Get the input values
        $admin_name = $_POST['admin_name'];
        $admin_pass = $_POST['admin_pass'];

        // Prepare a SQL statement to check if the user exists
        $stmt = $conn->prepare("SELECT admin_pass FROM alex WHERE admin_name = ?");
        $stmt->bind_param("s", $admin_name); // Use $admin_name instead of $Name
        $stmt->execute();
        $stmt->store_result();

        // Check if the user exists
        if ($stmt->num_rows > 0) {
            // User exists, now fetch the password
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();

            // Verify the password (if you were hashing passwords, use password_verify)
            if ($admin_pass === $hashedPassword) { // Change this line if you hash passwords
                // Successful login
                $_SESSION['username'] = $admin_name; // Store the username in the session
                $success = "Login successful! Welcome, " . htmlspecialchars($admin_name) . ".";
                header("Location: adweb.php?success=" . urlencode($success));
                exit(); // Ensure no further code is executed after the redirect
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "User  does not exist.";
        }
        $stmt->close(); // Close the statement
    } else {
        $error = "Please fill in all fields.";
    }
}

// Check for error message in session
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']); // Clear the error message after displaying it
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form action="admin.php" method="post">
        <div class="form-group">
            <label for="admin_name">Username:</label>
            <input type="text" class="form-control" id="admin_name" name="admin_name" required>
        </div>
        <div class="form-group">
            <label for="admin_pass">Password:</label>
            <input type="password" class="form-control" id="admin_pass" name="admin_pass" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
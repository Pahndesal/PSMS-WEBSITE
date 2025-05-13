<?php
session_start();

// Database credentials
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
    // Get the input values
    $Name = $_POST['Name'];
    $Password = $_POST['Password'];

    // Prepare a SQL statement to check if the user exists in the 'alex' table
    $stmt = $conn->prepare("SELECT admin_pass FROM alex WHERE admin_name = ?");
    $stmt->bind_param("s", $Name);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        // User exists, now fetch the password
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the password (if you were hashing passwords, use password_verify)
        if ($Password === $hashedPassword) { // Change this line if you hash passwords
            // Successful login
            $_SESSION['username'] = $Name; // Store the username in the session
            $success = "Login successful! Welcome, " . htmlspecialchars($Name) . ".";
            header("Location: admin_dashboard.php"); // Redirect to the admin dashboard
            exit(); // Ensure no further code is executed after the redirect
        } else {
            // Invalid password
            $_SESSION['error'] = "Invalid password.";
            header("Location: login.php"); // Redirect back to the login page
            exit();
        }
    } else {
        // User does not exist, set an error message
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: login.php"); // Redirect back to the login page
        exit();
    }

    $stmt->close(); // Close the statement
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
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css"> <!-- Link to your CSS file --> 
    <script>
        window.onload = function() {
            <?php if (!empty($success)): ?>
                alert("<?php echo addslashes($success); ?>");
            <?php endif; ?>
            <?php if (!empty($error)): ?>
                alert("<?php echo addslashes($error); ?>");
            <?php endif; ?>
        };
    </script>
</head>
<body>
<div class="container">
    <h2 class="text-center">Login</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="Name">Username:</label>
            <input type="text" class="form-control" id="Name" name="Name" required>
        </div>
        <div class="form-group">
            <label for="Password">Password:</label>
            <input type="password" class="form-control" id="Password" name="Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    
    <div class="mt-3 text-center">
        <a href="register.php" class="btn btn-secondary btn-block">Register</a>
    </div>
</div>
</body>
</html>

<?php
session_start();

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publicsafetydb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Initialize messages
$error = "";
$success = "";

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    // Prepare SQL to select user
    $stmt = $conn->prepare("SELECT pass FROM user_account WHERE account_name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($dbPassword);
        $stmt->fetch();

        // Check password
        if ($password === $dbPassword) { // later we can use password_verify() if hashed
            $_SESSION['username'] = $name;
            header("Location: home.php"); // Redirect to user dashboard
            exit();
        } else {
            $_SESSION['error'] = "Invalid password.";
            header("Location: user_login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: user_login.php");
        exit();
    }

    $stmt->close();
}

// Display error if set
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css"> 
    <script>
        window.onload = function() {
            <?php if (!empty($error)): ?>
                alert("<?php echo addslashes($error); ?>");
            <?php endif; ?>
        };
    </script>
</head>
<body>
<div class="container">
    <h2 class="text-center">Welcome Back!</h2>
    <h4 class="text-center">Login to your account</h4>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Username:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>

    <div class="mt-3 text-center">
        <a href="user_register.php" class="btn btn-secondary btn-block">Register</a>
    </div>
    <div class="text-center mt-3">
        <a href="home.php" class="login-link">Back to Home</a>
        </div>
</div>
</body>
</html>

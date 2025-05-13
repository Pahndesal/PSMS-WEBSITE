<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            margin: 20px 0;
        }
        nav a {
            margin: 0 15px;
            color: #35424a;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        footer {
            background: #35424a;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .logout-button {
            background-color: #d9534f; /* Bootstrap danger color */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .logout-button:hover {
            background-color: #c9302c; /* Darker red on hover */
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to My Website</h1>
</header>

<nav>
    <div class="container">
        <a href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <?php if (isset($_SESSION['username'])): ?>
            <a href="admin.php" class="logout-button">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
</nav>

<div class="container">
    <h2>Home Page</h2>
    <p>This is a simple home page created using PHP. You can add more content here as needed.</p>
    <p>Feel free to explore the links in the navigation menu.</p>
</div>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My Website. All Rights Reserved.</p>
</footer>

</body>
</html>
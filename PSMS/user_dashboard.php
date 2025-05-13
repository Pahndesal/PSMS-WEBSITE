<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Fetch user info from the session (or database if needed)
$username = $_SESSION['username'];

// Connect to your database
$servername = "localhost";
$dbUsername = "root";      
$dbPassword = "";          
$dbName = "publicsafetydb"; 

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PSMS - Home</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  <link rel="stylesheet" href="user_dashboard.css">

  
</head>
<body>





<script>
  // Clock
  function updateClock() {
    const now = new Date();
    const date = now.toLocaleDateString();
    const time = now.toLocaleTimeString();
    document.getElementById('clock').innerHTML = `${date} ${time}`;
  }

  setInterval(updateClock, 1000);
  updateClock();

  // Tab switcher
  function openTab(tabId) {
    const contents = document.querySelectorAll('.tab-content');
    contents.forEach(c => c.classList.remove('active'));

    document.getElementById(tabId).classList.add('active');
  }
</script>

</body>
<?php $conn->close(); ?>
</html>

<?php
// Database connection details
$servername = "localhost"; //  database server
$username = "root"; //  database username
$password = ""; //  database password
$dbname = "publicsafetydb"; //  database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// unique ID generation logic
$idPrefix = "ADM"; // Optional prefix
$autoId = "";

$idResult = $conn->query("SELECT id FROM alex ORDER BY id DESC LIMIT 1");
if ($idResult && $idResult->num_rows > 0) {
    $row = $idResult->fetch_assoc();
    $lastId = $row['id'];

    // Extract numeric part and increment
    $num = (int) filter_var($lastId, FILTER_SANITIZE_NUMBER_INT);
    $newNum = $num + 1;

    $autoId = $idPrefix . str_pad($newNum, 4, '0', STR_PAD_LEFT); // e.g., ADM0002
} else {
    $autoId = $idPrefix . "0001"; // First ID
}

// Initialize an error message variable
$error = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values and trim whitespace
    $id = trim($_POST['id']);
    $Name = trim($_POST['Name']);
    $Password = trim($_POST['Password']); // Get the password from the form
    
    $Address = trim($_POST['Address']);
    $ContactNumber = trim($_POST['ContactNumber']);

    // Validate input
    if (empty($id) || empty($Name) || empty($Password) || empty($Address) || empty($ContactNumber)) {
        $error = "All fields are required.";
    } else {
        // Store the password in plain text
        $plainPassword = $Password;

        // Prepare a SQL statement to insert the user
        $stmt = $conn->prepare("INSERT INTO alex (id, admin_name, admin_pass, Address, ContactNumber) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $id, $Name, $plainPassword, $Address, $ContactNumber);

        // Execute the statement
        if ($stmt->execute() === TRUE) {    
            header("Location: login.php"); // Redirect to login page
            exit(); // Ensure no further code is executed after the redirect
        } else {
            $error = "Error: " . $stmt->error; // Capture any SQL errors
        }

        $stmt->close(); // Close the statement
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="register.css"> <!-- Link to your CSS file -->
</head>
<body>
<div class="container">

    <h2>Registration</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div> <!-- Display error message -->
    <?php endif; ?>
    <form method="POST" action="">
        
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $autoId; ?>" readonly>

        </div>
        <div class="form-group">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" id="Name" name="Name" required>
        </div>
        <div class="form-group">
            <label for="Password">Password:</label>
            <input type="password" class="form-control" id="Password" name="Password" required>
        </div>
        
        <div class="form-group">
            <label for="Address">Address:</label>
            <input type="text" class="form-control" id="Address" name="Address" required>
        </div>
        <div class="form-group">
            <label for="ContactNumber">Contact Number:</label>
            <input type="tel" class="form-control" id="ContactNumber" name="ContactNumber"
            pattern="[0-9]{11}" maxlength="11" minlength="11" required
            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11)">


        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="home.php" class="btn btn-secondary">Cancel</a> <!-- Cancel button -->
    </form>
        <div class="text-center mt-3">
        <a href="login.php" class="login-link">Already have an account?</a>
        </div>

</div>
</body>
</html>
<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publicsafetydb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Unique ID generation
$idPrefix = "USR";
$autoId = "";

$idResult = $conn->query("SELECT id FROM user_account ORDER BY id DESC LIMIT 1");
if ($idResult && $idResult->num_rows > 0) {
    $row = $idResult->fetch_assoc();
    $lastId = $row['id'];

    $num = (int) filter_var($lastId, FILTER_SANITIZE_NUMBER_INT);
    $newNum = $num + 1;

    $autoId = $idPrefix . str_pad($newNum, 4, '0', STR_PAD_LEFT);
} else {
    $autoId = $idPrefix . "0001";
}

$error = "";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Handle file upload
    if (isset($_FILES['idpic']) && $_FILES['idpic']['error'] == 0) {
        $targetDirectory = "uploads/"; // Make sure you have this folder
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }

        $fileName = basename($_FILES["idpic"]["name"]);
        $targetFilePath = $targetDirectory . $fileName;

        // Save uploaded file
        if (move_uploaded_file($_FILES["idpic"]["tmp_name"], $targetFilePath)) {
            $idpic = $targetFilePath; // Save the path to DB
        } else {
            $error = "Failed to upload ID picture.";
        }
    } else {
        $error = "Please upload your ID picture.";
    }

    // Get form values
    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    // Validate inputs
    if (empty($id) || empty($name) || empty($password) || empty($email) || empty($idpic)) {
        $error = "All fields are required.";
    } else {
        // Save password as plain text (not recommended — better to hash it!)
        $plainPassword = $password;

        // Prepare insert statement
        $stmt = $conn->prepare("INSERT INTO user_account (id, account_name, pass, account_email, idpic, account_status) VALUES (?, ?, ?, ?, ?, 'Pending')");
        $stmt->bind_param("sssss", $id, $name, $plainPassword, $email, $idpic);

        if ($stmt->execute()) {
            header("Location: user_login.php"); // Redirect to user login
            exit();
        } else {
            $error = "Error: " . $stmt->error;
        }

        $stmt->close();
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
    <form method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="id">ID:</label>
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $autoId; ?>" readonly>
    </div>

    <div class="form-group">
        <label for="name">Username:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="idpic">Front Valid ID:</label>
        <input type="file" class="form-control-file" id="idpic" name="idpic" accept="image/*" required>
    </div>

    <div class="form-group">
        <label for="idpic">Back Valid ID:</label>
        <input type="file" class="form-control-file" id="idpic" name="idpic" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
    <a href="home.php" class="btn btn-secondary">Cancel</a>
</form>

        <div class="text-center mt-3">
        <a href="user_login.php" class="login-link">Already have an account?</a>
        </div>

</div>
</body>
</html>
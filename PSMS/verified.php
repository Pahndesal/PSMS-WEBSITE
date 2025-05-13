<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verify = $_POST['email'];

    $conn = new mysqli("localhost", "root", "", "publicsafetydb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE user_account SET account_status = 'Verified' WHERE email = ?");
    $stmt->bind_param("i", $verify);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Success";
    } else {
        echo "Error";
    }

    $stmt->close();
    $conn->close();
}
?>
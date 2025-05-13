<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticketId = $_POST['ticketId'];

    $conn = new mysqli("localhost", "root", "", "publicsafetydb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE tb_data SET status = 'resolved' WHERE id = ?");
    $stmt->bind_param("i", $ticketId);
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

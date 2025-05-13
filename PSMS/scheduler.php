<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
header('Content-Type: application/json');

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'publicsafetydb';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(['error' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];

    $stmt = $conn->prepare("SELECT COUNT(*) FROM pc_schedule WHERE booking_date = ?");
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count >= 3) {
        echo json_encode(['status' => 'full']);
    } else {
        $stmt = $conn->prepare("INSERT INTO pc_schedule (name, contact, booking_date) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $contact, $date);
        $stmt->execute();
        $stmt->close();
        echo json_encode(['status' => 'success']);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conn->query("SELECT name, booking_date FROM pc_schedule");
    $bookings = [];
    while ($row = $result->fetch_assoc()) {
        $bookings[] = [
            'title' => $row['name'],
            'start' => $row['booking_date']
        ];
    }
    echo json_encode($bookings);
    exit;
}
?>

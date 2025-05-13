<?php
$mysqli = new mysqli("localhost", "root", "", "publicsafetydb");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Hardcode or get number from query string
$number = $_GET['number'] ?? '09177040305'; 
$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];

$stmt = $mysqli->prepare("INSERT INTO qr_scans (qr_code, ip_address, device_info) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $number, $ip, $device);
$stmt->execute();

// Redirect to the actual call
header("Location: tel:$number");
exit();
?>

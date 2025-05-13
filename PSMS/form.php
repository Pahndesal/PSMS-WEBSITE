<?php
require 'connection.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone']; 
    $address = $_POST['address'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $emergencyType = $_POST['emergency_type'];
    $message = $_POST['message'];

    // Handle file upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES['image']['name']);
        $targetDir = "uploads/";
        $targetFile = $targetDir . time() . "_" . $imageName;

        // Move uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    $query = "INSERT INTO tb_data 
        (name, phone, address, latitude, longitude, emergencyType, status, message, image_path) 
        VALUES ('$name', '$phone', '$address', '$latitude', '$longitude', '$emergencyType', 'pending', '$message', '$imagePath')";

    mysqli_query($conn, $query);

    echo "
    <script>
        alert('Ticket Created Successfully!');
        document.location.href = 'home.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert Report</title>
    <link rel="stylesheet" href="form.css"> 
</head>
<body onload="getLocation();">
    <div class="form-container">
        <!-- Image Section -->
        <img src="images/emergency.jpg" alt="Emergency Icon" class="emergency-icon">
        
        <!-- Form Section -->
        <form class="myForm" action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <!-- Existing form fields like name, phone, etc. -->
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required value="" placeholder="Enter your name"><br>
    
    <label for="phone">Phone No.</label>
    <input 
        type="tel" 
        name="phone" 
        id="phone" 
        required 
        pattern="\d{11}" 
        maxlength="11" 
        placeholder="Enter 11-digit phone number" 
        oninput="this.value = this.value.replace(/[^0-9]/g, '')"><br>

    <label for="address">Location</label>
    <input type="text" name="address" id="address" placeholder="Please provide complete address or the specific location related to your concern" required><br>

    <label for="emergency_type">Emergency/Issue Type:</label>
    <select name="emergency_type" id="emergency_type" onchange="showOtherInput()">
        <option value="">Select Emergency Type</option>
        <option value="Fire">Fire</option>
        <option value="Medical">Medical</option>
        <option value="Police">Police</option>
        <option value="Other">Other</option>
    </select><br>
    
    <div class="other-input" id="otherInputContainer">
        <label for="other">Please specify:</label>
        <input type="text" name="other" id="other" placeholder="Specify other emergency type">
    </div>

    <label for="message">Message</label>
    <textarea name="message" id="message" required placeholder="Enter your message" rows="4" cols="74"></textarea><br>

    <!-- Add Image Upload Field -->
    <label for="image">Attach Image (optional):</label>
    <input type="file" name="image" id="image" accept="image/*"><br>

    <!-- Hidden latitude and longitude fields -->
    <input type="hidden" name="latitude" value="">
    <input type="hidden" name="longitude" value=""> 

    <div class="button-container">
        <button type="submit" name="submit">Submit</button>
        <a href="home.php" class="cancel-button">Cancel</a>
    </div>
</form>

    </div>

    <!-- Custom Alert Section -->
    <div class="overlay" id="overlay"></div>
    <div class="custom-alert" id="customAlert">
        <h2>⚠️ WARNING</h2>
        <p>Submitting a <strong>false report</strong> is a serious offense. It wastes emergency resources, delays aid to real victims, and is punishable under the law.</p>
        <p>All reports are logged with location and contact information. False or prank reports may lead to <strong>fines, prosecution, or jail time</strong>.</p>
        <p>Please report only real emergencies or concerns. Help us save lives by being responsible.</p>
        <button class="btn-primary" onclick="closeCustomAlert()">OK, I understand.</button>
    </div>

    

    <script src="form.js"></script>
</body>
</html>

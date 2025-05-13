<?php
session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css"> 
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">PSMS</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Philippine Time Display -->
        <div class="ml-auto mr-4 d-flex align-items-center" id="philippine-time">
            <!-- Philippine Time Here -->
        </div>

        <!-- Login/Register Buttons -->
        <ul class="navbar-nav">
    <!-- Contact Us button always first -->
    <li class="nav-item">
        <a class="nav-link" href="form.php">Contact Us</a>
    </li>

    <?php if (isset($_SESSION['username'])): ?>
        <li class="nav-item">
            <span class="nav-link">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="user_login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="user_register.php">Register</a>
        </li>
    <?php endif; ?>
</ul>


    </div>
</nav>

<div class="hero">
    <p> Public Safety & Security Management</p>
    

    

    
</div>

<div class="container my-5">
    <h2 class="text-center mb-4">Services</h2>
    <div class="row">

        <div class="col-md-4 mb-4">
            <a href="contacts.php" class="card-with-bg" style="background-image: url('images/contact.jpg');">
                <div class="overlay-text">Emergency Contacts</div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="first_aid.php" class="card-with-bg" style="background-image: url('images/first_aid.jpg');">
                <div class="overlay-text">First Aid Instructions</div>
            </a>
        </div>
        

        <div class="col-md-4 mb-4">
            <a href="form.php" class="card-with-bg" style="background-image: url('images/Public_safety.jpg');">
                <div class="overlay-text">Report Accident or Safety Concern</div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
            <a href="page2.php" class="card-with-bg" style="background-image: url('images/health_service.jpg');">
                <div class="overlay-text">Health Service</div>
            </a>
        </div>

        <div class="col-md-4 mb-4">
    <?php if (isset($_SESSION['username'])): ?>
        <a href="scheduler.html" class="card-with-bg" style="background-image: url('images/Peace_committee.jpg');">
            <div class="overlay-text">Peace Committee</div>
        </a>
    <?php else: ?>
        <a href="user_login.php?redirected=1" class="card-with-bg" style="background-image: url('images/Peace_committee.jpg');">
            <div class="overlay-text">Peace Committee</div>
        </a>
    <?php endif; ?>
        </div>


        <div class="col-md-4 mb-4">
    <?php if (isset($_SESSION['username'])): ?>
        <a href="census_form.php" class="card-with-bg" style="background-image: url('images/census.jpg');">
            <div class="overlay-text">Update Census</div>
        </a>
    <?php else: ?>
        <a href="user_login.php?redirected=1" class="card-with-bg" style="background-image: url('images/census.jpg');">
            <div class="overlay-text">Update Census</div>
        </a>
    <?php endif; ?>
        </div>

        
    </div>
        
        <div class="row justify-content-center">
        <div class="col-md-4 mb-4">
            <a href="page4.php" class="card-with-bg" style="background-image: url('images/education.jpg');">
                <div class="overlay-text">Education</div>
            </a>
        </div>
        </div>
</div>

</div>


<div class="about">
    <h2>About Public Safety and Security Management System</h2>
    <p>
        The Public Safety and Security Management System (PSMS) is designed to enhance the safety and security of communities by providing a streamlined platform for reporting emergencies and incidents. 
        Our system allows users to quickly and efficiently report various types of emergencies, ensuring that help is dispatched promptly. 
        With a focus on user-friendliness and accessibility, PSMS aims to empower citizens to take an active role in their safety and the safety of those around them.
        Whether it's a medical emergency, fire, or any other urgent situation, PSMS is here to facilitate communication between the public and emergency services, ensuring a swift response to critical situations.
    </p>
</div>

<footer class="text-center mt-5" style="position: fixed; bottom: 0; width: 100%; background-color: #f8f9fa; padding: 10px;">
    <p>&copy; 2025 Public Safety & Security Management System. All rights reserved.</p>
</footer>

<div class="overlay" id="overlay"></div>
<div class="custom-alert" id="customAlert">
    
    <h2>📣 NOTICE</h2>
    <p> This is still a work in progress. Certain features may be incomplete, under development, or subject to change as we continue to refine and improve the experience. 
        We appreciate your understanding and patience as we work towards finalizing everything..</p>
    <button class="btn-primary" onclick="closeCustomAlert()">OK, I understand.</button>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/home.js"></script> 


<script>
    function showCustomAlert() {
        document.getElementById('overlay').style.display = 'block'; // Show overlay
        const alertBox = document.getElementById('customAlert');
        alertBox.style.display = 'block'; // Show custom alert
        setTimeout(() => {
            alertBox.style.opacity = '1'; // Fade in
            alertBox.style.transform = 'translate(-50%, -50%) scale(1)'; // Scale to normal size
        }, 10); // Small timeout to allow display to take effect
    }

    function closeCustomAlert() {
        const alertBox = document.getElementById('customAlert');
        alertBox.style.opacity = '0'; // Fade out
        alertBox.style.transform = 'translate(-50%, -50%) scale(0)'; // Scale down
        setTimeout(() => {
            document.getElementById('overlay').style.display = 'none'; // Hide overlay
            alertBox.style.display = 'none'; // Hide custom alert
        }, 500); // Match this duration with the CSS transition duration
    }

    // Show the custom alert when the page loads
    window.onload = function() {
        showCustomAlert();
    };
    function updatePhilippineTime() {
    const options = { timeZone: 'Asia/Manila', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
    const timeString = new Date().toLocaleTimeString('en-US', options);
    const timeElement = document.getElementById('philippine-time');
    if (timeElement) {
        timeElement.textContent = "Philippine Time: " + timeString;
    }
}

// Update time every second
setInterval(updatePhilippineTime, 1000);

// Initial call
updatePhilippineTime();

function confirmLogout(event) {
    event.preventDefault(); // Stop the default link action

    if (confirm("Are you sure you want to logout?")) {
        window.location.href = "user_logout.php";
    }
}

let idleTime = 0;

// Increment the idle time counter every minute
const idleInterval = setInterval(function () {
    idleTime++;
    if (idleTime >= 15) { // 15 minutes
        window.location.href = "user_logout.php?afk=1"; // Redirect to logout/login
    }
}, 60000); // 1 minute

// Reset the idle timer on any user interaction
function resetIdleTime() {
    idleTime = 0;
}

window.onload = resetIdleTime;
document.onmousemove = resetIdleTime;
document.onkeypress = resetIdleTime;
document.ontouchstart = resetIdleTime;
</script>
<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="logoutModalLabel">Confirm Logout?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to log out of your account?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="user_logout.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>


</body>
</html>
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
$dbUsername = "root";      // adjust as needed
$dbPassword = "";          // adjust as needed
$dbName = "publicsafetydb";          // your actual database name

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch ticket data
$sql = "SELECT * FROM tb_data  ORDER BY created_at DESC";
$result = $conn->query($sql);

// Connect to the QR scan database
$qrDbName = "publicsafetydb"; // Name of the database containing QR scan data
$qrConn = new mysqli($servername, $dbUsername, $dbPassword, $qrDbName);

// Check connection to QR scan database
if ($qrConn->connect_error) {
  die("QR database connection failed: " . $qrConn->connect_error);
}

// Query to get the total number of pending user accounts
$qrSql = "SELECT COUNT(*) AS total_pending FROM user_account WHERE account_status = 'pending'";
$qrResult = $qrConn->query($qrSql);
$qrRow = $qrResult->fetch_assoc();
$totalPendingAccounts = $qrRow['total_pending'];

// Query to count the total number of pending tickets
$pendingTicketsSql = "SELECT COUNT(*) AS total_pending FROM tb_data WHERE status = 'pending'";
$pendingTicketsResult = $conn->query($pendingTicketsSql);
$pendingTicketsRow = $pendingTicketsResult->fetch_assoc();
$totalPendingTickets = $pendingTicketsRow['total_pending'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PSMS - Admin</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
  <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>

<div id="nav-bar">
  <input id="nav-toggle" type="checkbox"/>
  <div id="nav-header">
    <a id="nav-title" href="https://www.youtube.com/watch?v=xvFZjo5PgG0" target="_blank">P</i>SMS</a>
    <label for="nav-toggle"><span id="nav-toggle-burger"></span></label>
    <hr/>
  </div>
  <div id="nav-content">
    <div class="nav-button" onclick="showSection('all-tickets-section')"><i class="fas fa-star"></i><span>All Tickets</span></div>

    <div class="nav-button" onclick="showSection('pending-tickets-section')"><i class="fas fa-envelope"></i><span>Pending Tickets</span></div>

    <div class="nav-button" onclick="showSection('resolved-tickets-section')"><i class="fas fa-envelope-open"></i><span>Resolved Tickets</span></div>

    
    <div class="nav-button" onclick="showSection('pending-accounts-section')"><i class="fas fa-user"></i><span>Pending Accounts</span></div>
    
    
    <div id="nav-content-highlight"></div>
  </div>

  <input id="nav-footer-toggle" type="checkbox"/>
  <div id="nav-footer">
    <div id="nav-footer-heading">
      <div id="nav-footer-avatar">
        <img src="https://gravatar.com/avatar/4474ca42d303761c2901fa819c4f2547"/>
      </div>
      <div id="nav-footer-titlebox">
        <a id="nav-footer-title" href="https://www.facebook.com/Pahndesal" target="_blank"><?php echo htmlspecialchars($username); ?></a>
        <span id="nav-footer-subtitle">Admin</span>
      </div>
      <label for="nav-footer-toggle"><i class="fas fa-caret-up"></i></label>
    </div>
    <div id="nav-footer-content">
    <div id="nav-footer-content">
        <div id="clock">Loading time...</div>
        <form action="logout.php" method="POST" class="logout-form">
            <button type="submit" class="logout-button"><i class="fas fa-sign-out-alt"></i> Logout</button>
    </form>
    </div>


    </div>
  </div>
</div>


 
<!-- Dashboard Cards -->
<div class="dashboard-cards">
  <div class="card">
    <h3>Total Tickets Received</h3>
    <p><?php echo $result->num_rows; ?></p> <!-- Total tickets received -->
  </div>
  <div class="card">
    <h3>Total Pending Accounts</h3>
    <p><?php echo $totalPendingAccounts; ?></p> <!-- Total Pending accounts -->
  </div>
  <div class="card">
    <h3>Total Pending Tickets</h3>
    <p><?= $totalPendingTickets ?></p> <!-- Total pending tickets -->
  </div>
</div>
<!-- All Tickets Section -->
<div id="all-tickets-section" style="display: none;">
  <table class="rounded-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone No.</th>
        <th>Description</th>
        <th>Emergency/Concerns</th>
        <th>Address/Location</th>
        <th>Status</th>
        <th>Date Created</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr class="ticket-row <?php echo ($row['status'] === 'pending') ? 'pending-row' : 'resolved-row'; ?>" 
          data-id="<?php echo htmlspecialchars($row['id']); ?>"
          data-name="<?php echo htmlspecialchars($row['name']); ?>"
          data-phone="<?php echo htmlspecialchars($row['phone']); ?>"
          data-description="<?php echo htmlspecialchars($row['message']); ?>"
          data-emergency="<?php echo htmlspecialchars($row['emergencyType']); ?>"
          data-address="<?php echo htmlspecialchars($row['address']); ?>"
          data-status="<?php echo htmlspecialchars($row['status']); ?>"
          data-created="<?php echo htmlspecialchars($row['created_at']); ?>"
          data-latitude="<?php echo htmlspecialchars($row['latitude']); ?>"
          data-longitude="<?php echo htmlspecialchars($row['longitude']); ?>">
        <td><?php echo htmlspecialchars($row['id']); ?></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['phone']); ?></td>
        <td><?php echo htmlspecialchars($row['message']); ?></td>
        <td><?php echo htmlspecialchars($row['emergencyType']); ?></td>
        <td><?php echo htmlspecialchars($row['address']); ?></td>
        <td><?php echo htmlspecialchars($row['status']); ?></td>
        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
<!-- Pending Tickets Section -->
<div id="pending-tickets-section" style="display: none;">
  <table class="rounded-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone No.</th>
        <th>Description</th>
        <th>Emergency/Concerns</th>
        <th>Address/Location</th>
        <th>Status</th>
        <th>Date Created</th>
        <th>Attached Image</th> <!-- New column for image -->
      </tr>
    </thead>
    <tbody>
      <?php
      $pendingResult = $conn->query("SELECT * FROM tb_data WHERE status = 'pending' ORDER BY created_at DESC");
      while ($row = $pendingResult->fetch_assoc()): ?>
      <tr class="ticket-row pending-row"
          data-id="<?php echo htmlspecialchars($row['id']); ?>"
          data-name="<?php echo htmlspecialchars($row['name']); ?>"
          data-phone="<?php echo htmlspecialchars($row['phone']); ?>"
          data-description="<?php echo htmlspecialchars($row['message']); ?>"
          data-emergency="<?php echo htmlspecialchars($row['emergencyType']); ?>"
          data-address="<?php echo htmlspecialchars($row['address']); ?>"
          data-status="<?php echo htmlspecialchars($row['status']); ?>"
          data-created="<?php echo htmlspecialchars($row['created_at']); ?>"
          data-latitude="<?php echo htmlspecialchars($row['latitude']); ?>"
          data-longitude="<?php echo htmlspecialchars($row['longitude']); ?>">
        <td><?php echo htmlspecialchars($row['id']); ?></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['phone']); ?></td>
        <td><?php echo htmlspecialchars($row['message']); ?></td>
        <td><?php echo htmlspecialchars($row['emergencyType']); ?></td>
        <td><?php echo htmlspecialchars($row['address']); ?></td>
        <td><?php echo htmlspecialchars($row['status']); ?></td>
        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        
        <!-- Display the image if it exists in the database -->
        <td>
          <?php if (!empty($row['image_path'])): ?>
            <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Attached Image" style="max-width: 200px;">
          <?php else: ?>
            No image attached
          <?php endif; ?>
          </td>

      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>


<!-- Resolved Tickets Section -->
<div id="resolved-tickets-section"  style="display: none;">
  <table class="rounded-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone No.</th>
        <th>Description</th>
        <th>Emergency/Concerns</th>
        <th>Address/Location</th>
        <th>Status</th>
        <th>Date Created</th>
        <th>Attached Image</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $resolvedResult = $conn->query("SELECT * FROM tb_data WHERE status = 'resolved' ORDER BY created_at DESC");
      while ($row = $resolvedResult->fetch_assoc()): ?>
      <tr class="ticket-row resolved-row"
          data-id="<?php echo htmlspecialchars($row['id']); ?>"
          data-name="<?php echo htmlspecialchars($row['name']); ?>"
          data-phone="<?php echo htmlspecialchars($row['phone']); ?>"
          data-description="<?php echo htmlspecialchars($row['message']); ?>"
          data-emergency="<?php echo htmlspecialchars($row['emergencyType']); ?>"
          data-address="<?php echo htmlspecialchars($row['address']); ?>"
          data-status="<?php echo htmlspecialchars($row['status']); ?>"
          data-created="<?php echo htmlspecialchars($row['created_at']); ?>"
          data-latitude="<?php echo htmlspecialchars($row['latitude']); ?>"
          data-longitude="<?php echo htmlspecialchars($row['longitude']); ?>">
        <td><?php echo htmlspecialchars($row['id']); ?></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['phone']); ?></td>
        <td><?php echo htmlspecialchars($row['message']); ?></td>
        <td><?php echo htmlspecialchars($row['emergencyType']); ?></td>
        <td><?php echo htmlspecialchars($row['address']); ?></td>
        <td><?php echo htmlspecialchars($row['status']); ?></td>
        <td><?php echo htmlspecialchars($row['created_at']); ?></td>
        <!-- Display the image if it exists in the database -->
        <td>
          <?php if (!empty($row['image_path'])): ?>
            <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Attached Image" style="max-width: 200px;">
          <?php else: ?>
            No image attached
          <?php endif; ?>
          </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Pending Accounts Section -->
<div id="pending-accounts-section" style="display: none;">
  <table class="rounded-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>ID Picture</th>
        <th>Account Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Query to fetch pending user accounts
      $pendingAccountsResult = $conn->query("SELECT * FROM user_account WHERE account_status = 'pending'");
      while ($row = $pendingAccountsResult->fetch_assoc()): ?>
      <tr class="account-row pending-row"
          data-name="<?php echo htmlspecialchars($row['account_name']); ?>"
          data-email="<?php echo htmlspecialchars($row['account_email']); ?>"
          data-idpic="<?php echo htmlspecialchars($row['idpic']); ?>"
          data-status="<?php echo htmlspecialchars($row['account_status']); ?>"
          onclick="showAccountDetails(this)">
        <td><?php echo htmlspecialchars($row['account_name']); ?></td>
        <td><?php echo htmlspecialchars($row['account_email']); ?></td>
        <td>
          <a href="<?php echo htmlspecialchars($row['idpic']); ?>" target="_blank">
          <img src="<?php echo htmlspecialchars($row['idpic']); ?>" alt="ID Picture" style="height: 50px; border-radius: 4px;">

          </a>
        </td>
        <td><?php echo htmlspecialchars($row['account_status']); ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Account Details Section (hidden by default) -->
<div id="account-details" class="account-details" style="display:none;">
  <h3>Account Details</h3>
  <div class="account-details-container">
    <p><strong>Name:</strong> <span id="account_detail_name"></span></p>
    <p><strong>Email:</strong> <span id="detail_email"></span></p>
    <p><strong>ID Picture:</strong> <span id="detail_idpic"></span></p>
    <p><strong>Account Status:</strong> <span id="account_detail-status"></span></p>
  
    <!-- Mark as Verified Button -->
    <button class="resolve-button" id="verify-button" onclick="markAsVerified()">Mark as Verified</button>

    <!-- Close Button -->
    <button onclick="closeDetails()">Close</button>
  </div>
</div>




<!-- Ticket Details Section -->
<div id="ticket-details" class="ticket-details" style="display:none;">
  <h3>Ticket Details</h3>
  <div class="ticket-details-container">
    <!-- Left: Ticket Details -->
    <div class="ticket-details-left">
      <p><strong>ID:</strong> <span id="detail-id"></span></p>
      <p><strong>Name:</strong> <span id="detail-name"></span></p>
      <p><strong>Phone:</strong> <span id="detail-phone"></span></p>
      <p><strong>Description:</strong> <span id="detail-description"></span></p>
      <p><strong>Emergency Type:</strong> <span id="detail-emergency"></span></p>
      <p><strong>Address:</strong> <span id="detail-address"></span></p>
      <p><strong>Status:</strong> <span id="detail-status"></span></p>
      <p><strong>Created At:</strong> <span id="detail-created"></span></p>
      

  
      <!-- Resolve Button -->
      <button class="resolve-button" onclick="markAsResolved()">Mark as Resolved</button>
  
      <!-- Close Button -->
      <button onclick="closeDetails()">Close</button>
    </div>

    <!-- Right: Map -->
    <div class="ticket-details-right">
      <h4>Location:</h4>
      <div style="width: 100%; height: 300px;">
        <iframe id="detail-map" 
                style="width: 100%; height: 100%; border: 1px solid #ccc;" 
                src=""
                allowfullscreen>
        </iframe>
      </div>
    </div>
  </div>
</div>





  

  

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

  

  // Row click to show ticket details
  document.querySelectorAll('.ticket-row').forEach(row => {
    row.addEventListener('click', () => {
      document.getElementById('detail-id').textContent = row.dataset.id;
      document.getElementById('detail-name').textContent = row.dataset.name;
      document.getElementById('detail-phone').textContent = row.dataset.phone;
      document.getElementById('detail-description').textContent = row.dataset.description;
      document.getElementById('detail-emergency').textContent = row.dataset.emergency;
      document.getElementById('detail-address').textContent = row.dataset.address;
      document.getElementById('detail-status').textContent = row.dataset.status;
      document.getElementById('detail-created').textContent = row.dataset.created;
      document.getElementById('ticket-details').style.display = 'block';
    });
  });

  function closeDetails() {
    document.getElementById('ticket-details').style.display = 'none';
  }
  function markAsResolved() {
  const ticketId = document.getElementById('detail-id').textContent;

  fetch('resolve_ticket.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'ticketId=' + encodeURIComponent(ticketId)
  })
  .then(response => response.text())
  .then(result => {
    if (result.trim() === "Success") {
      document.getElementById('detail-status').textContent = 'resolved';

      // Update the row in the table to reflect the change
      const ticketRow = document.querySelector(`.ticket-row[data-id="${ticketId}"]`);
      if (ticketRow) {
        ticketRow.classList.remove('pending-row');
        ticketRow.classList.add('resolved-row');
        ticketRow.querySelectorAll('td')[5].textContent = 'resolved';
      }

      alert("Ticket marked as resolved.");
      closeDetails();
    } else {
      alert("Already marked as resolved.");
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert("An error occurred while resolving the ticket.");
  });
}


function closeDetails() {
  const ticketDetails = document.getElementById('ticket-details');
  const accountDetails = document.getElementById('account-details');

  if (ticketDetails) ticketDetails.style.display = 'none';
  if (accountDetails) accountDetails.style.display = 'none';
}

// Row click to show ticket details
document.querySelectorAll('.ticket-row').forEach(row => {
  row.addEventListener('click', () => {
    // Populating the ticket details
    document.getElementById('detail-id').textContent = row.dataset.id;
    document.getElementById('detail-name').textContent = row.dataset.name;
    document.getElementById('detail-phone').textContent = row.dataset.phone;
    document.getElementById('detail-description').textContent = row.dataset.description; // Description
    document.getElementById('detail-emergency').textContent = row.dataset.emergency;
    document.getElementById('detail-address').textContent = row.dataset.address;
    document.getElementById('detail-status').textContent = row.dataset.status; // Status
    document.getElementById('detail-created').textContent = row.dataset.created;
    
    // If available, update the map location
    const lat = row.dataset.latitude;
    const lng = row.dataset.longitude;
    const mapUrl = `https://www.google.com/maps?q=${lat},${lng}&hl=es;z=14&output=embed`;
    document.getElementById('detail-map').src = mapUrl;

    document.getElementById('ticket-details').style.display = 'block';  // Show the ticket details
  });
});


function showSection(sectionId) {
  const section = document.getElementById(sectionId);

  // Always close the ticket details panel first
  document.getElementById('ticket-details').style.display = 'none';

  // If the section is already visible, hide it
  if (section.style.display === 'block') {
    section.style.display = 'none';
  } else {
    // Hide all sections first
    document.querySelectorAll('.tab-content, #all-tickets-section, #pending-tickets-section, #resolved-tickets-section, #pending-accounts-section').forEach(section => {
      section.style.display = 'none';
    });

    // Show the clicked section
    section.style.display = 'block';
  }
}
// JavaScript to handle row click and highlight
function showAccountDetails(row) {
  // Remove active class from all rows
  document.querySelectorAll('.table-row').forEach(r => r.classList.remove('active'));

  // Add active class to the clicked row
  row.classList.add('active');

  // Update account details as before
  document.getElementById('detail-name').textContent = row.dataset.name;
  document.getElementById('detail-email').textContent = row.dataset.email;
  document.getElementById('detail-idpic').textContent = row.dataset.idpic;
  document.getElementById('detail-status').textContent = row.dataset.status;

  // Show the account details section
  document.getElementById('account-details').style.display = 'block';
}

function markAsVerified() {
  const email = document.getElementById('detail-email').textContent;

  fetch('verified.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: 'email=' + encodeURIComponent(email)
  })
  .then(response => response.text())
  .then(result => {
    if (result.trim() === "Success") {
      alert("Account marked as verified.");

      // Update status in the account detail view
      document.getElementById('detail-status').textContent = 'verified';

      // Optionally hide details or update the table visually
      document.getElementById('account-details').style.display = 'none';
    } else {
      alert("Failed to verify account: " + result);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    alert("An error occurred while verifying the account.");
  });
}


</script>


</body>
<?php $conn->close(); ?>

</html>

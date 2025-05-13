<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publicsafetydb";  // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search term from the form (if any)
$search = isset($_POST['search']) ? $conn->real_escape_string($_POST['search']) : '';

// Fetch police station contacts from the database
$sql_police = "SELECT name, officer_name, phone, email FROM emergency_contacts WHERE name LIKE '%$search%' OR officer_name LIKE '%$search%'";
$result_police = $conn->query($sql_police);

// Fetch fire station contacts from the database
$sql_fire = "SELECT station_name, contact_information FROM fire_stations WHERE station_name LIKE '%$search%'";
$result_fire = $conn->query($sql_fire);

// Fetch Barangay contacts from the database
$sql_dist1 = "SELECT barangay_name, chairman_name, address, contact_number FROM district_1 WHERE barangay_name LIKE '%$search%'";
$result_dist1 = $conn->query($sql_dist1);

$sql_dist2 = "SELECT barangay_name, chairman_name, address, contact_number FROM district_2 WHERE barangay_name LIKE '%$search%'";
$result_dist2 = $conn->query($sql_dist2);

$sql_dist3 = "SELECT barangay_name, chairman_name, address, contact_number FROM district_3 WHERE barangay_name LIKE '%$search%'";
$result_dist3 = $conn->query($sql_dist3);

$sql_dist4 = "SELECT barangay_name, chairman_name, address, contact_number FROM district_4 WHERE barangay_name LIKE '%$search%'";
$result_dist4 = $conn->query($sql_dist4);

$sql_dist5 = "SELECT barangay_name, chairman_name, address, contact_number FROM district_5 WHERE barangay_name LIKE '%$search%'";
$result_dist5 = $conn->query($sql_dist5);

$sql_dist6 = "SELECT barangay_name, chairman_name, address, contact_number FROM district_6 WHERE barangay_name LIKE '%$search%'";
$result_dist6 = $conn->query($sql_dist6);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Emergency Contact List</title>
    <link rel="stylesheet" href="contacts.css" />
</head>
<body>

<div class="container">
    <h1 class="title">Emergency Contact List</h1>
    <a href="home.php" class="home-btn">Go Back</a>
    <div class="search-container">
        
    <input type="text" id="searchInput" class="search-box" placeholder="Search Contacts Here..." />
    </div>

    <button class="collapsible" type="button">Police Stations</button>
    <div class="content">
        <table class="contact-list">
            <thead>
                <tr>
                    <th>Station</th>
                    <th>Officer Name</th>
                    <th>Contact Information</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_police->num_rows > 0) {
                    while ($row = $result_police->fetch_assoc()) {
                        echo "<tr class='search-row'>
                                <td>{$row['name']}</td>
                                <td>{$row['officer_name']}</td>
                                <td>{$row['phone']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No police station contacts found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <button class="collapsible" type="button">Fire Stations</button>
    <div class="content">
        <table class="contact-list">
            <thead>
                <tr>
                    <th>Fire Station</th>
                    <th>Contact Information</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_fire->num_rows > 0) {
                    while ($row = $result_fire->fetch_assoc()) {
                        echo "<tr class='search-row'>
                                <td>{$row['station_name']}</td>
                                <td>{$row['contact_information']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No fire station contacts found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Helper function to render district tables
    function renderDistrictTable($result, $districtName) {
        echo "<button class='collapsible' type='button'>{$districtName}</button>";
        echo "<div class='content'>";
        echo '<table class="contact-list">';
        echo '<thead><tr><th>Barangay</th><th>Chairman</th><th>Address</th><th>Contact Information</th></tr></thead><tbody>';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='search-row'>
                        <td>{$row['barangay_name']}</td>
                        <td>{$row['chairman_name']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['contact_number']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No Barangay contacts found.</td></tr>";
        }
        echo '</tbody></table></div>';
    }

    renderDistrictTable($result_dist1, 'District 1');
    renderDistrictTable($result_dist2, 'District 2');
    renderDistrictTable($result_dist3, 'District 3');
    renderDistrictTable($result_dist4, 'District 4');
    renderDistrictTable($result_dist5, 'District 5');
    renderDistrictTable($result_dist6, 'District 6');
    ?>

</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Fade-in effect
    document.body.classList.add('fade-in');

    // Collapsible functionality
    const coll = document.querySelectorAll(".collapsible");
    coll.forEach(button => {
        button.addEventListener("click", () => {
            button.classList.toggle("active");
            const content = button.nextElementSibling;
            if (content.classList.contains("show")) {
                content.classList.remove("show");
            } else {
                content.classList.add("show");
            }
        });
    });

    // JS live search filter with dynamic collapse/expand
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('.search-row');
        const collapsibles = document.querySelectorAll(".collapsible");

        rows.forEach(function (row) {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });

        // For each collapsible section, check if it has visible rows, then expand or collapse accordingly
        collapsibles.forEach(button => {
            const content = button.nextElementSibling;
            const visibleRows = content.querySelectorAll('tbody tr:not([style*="display: none"])');
            if (visibleRows.length > 0) {
                content.classList.add('show');
                button.classList.add('active');
            } else {
                content.classList.remove('show');
                button.classList.remove('active');
            }
        });
    });
});
</script>

</body>
</html>

<?php
$conn->close();
?>
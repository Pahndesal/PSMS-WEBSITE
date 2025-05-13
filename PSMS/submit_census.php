<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'publicsafetydb';

// Create database connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize and retrieve household-level info (from first member)
$household_head_name = $conn->real_escape_string($_POST['household_head_name']);
$address = $conn->real_escape_string($_POST['address']);

// Insert into household table
$sql_household = "INSERT INTO household (household_head_name, address) VALUES (?, ?)";
$stmt_household = $conn->prepare($sql_household);
$stmt_household->bind_param("ss", $household_head_name, $address);
$stmt_household->execute();
$household_id = $stmt_household->insert_id; // Get the inserted household ID
$stmt_household->close();

// Loop through each household member
$total_members = intval($_POST['total_members']);

for ($i = 1; $i <= $total_members; $i++) {
  // Retrieve and sanitize each field
  $name = $conn->real_escape_string($_POST["name_$i"]);
  $sex = $conn->real_escape_string($_POST["sex_$i"]);
  $birthdate = $_POST["birthdate_$i"];
  $age = intval($_POST["age_$i"]);
  $relation = $conn->real_escape_string($_POST["relation_$i"]);
  $civil_status = $conn->real_escape_string($_POST["civil_status_$i"]);
  $education = $conn->real_escape_string($_POST["education_$i"]);
  $literacy = $conn->real_escape_string($_POST["literacy_$i"]);
  $employment_status = $conn->real_escape_string($_POST["employment_status_$i"]);
  $disability = $conn->real_escape_string($_POST["disability_$i"]);
  $migration_status = $conn->real_escape_string($_POST["migration_status_$i"]);
  $religion = $conn->real_escape_string($_POST["religion_$i"]);
  $ethnicity = $conn->real_escape_string($_POST["ethnicity_$i"]);

  // Insert into household_members table
  $sql_member = "INSERT INTO household_members (
    household_id, name, sex, birthdate, age, relation, civil_status, education,
    literacy, employment_status, disability, migration_status, religion, ethnicity
  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt_member = $conn->prepare($sql_member);
  $stmt_member->bind_param(
    "isssisssssssss",
    $household_id,
    $name,
    $sex,
    $birthdate,
    $age,
    $relation,
    $civil_status,
    $education,
    $literacy,
    $employment_status,
    $disability,
    $migration_status,
    $religion,
    $ethnicity
  );
  $stmt_member->execute();
  $stmt_member->close();
}

$conn->close();

// Redirect or show success message
header("Location: home.php?status=success");
exit;
?>

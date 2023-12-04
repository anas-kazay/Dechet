<?php
session_start();
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'dechet';

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$password = $_POST['password'];

// Perform a query to check the credentials
$sql = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Valid credentials
    $row = $result->fetch_assoc(); // Fetch the first row from the query result
    $_SESSION['user_id'] = $row['id'];
    echo "success";
} else {
    // Invalid credentials
    echo "failure";
}

$conn->close();
?>

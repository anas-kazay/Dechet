<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'dechet';
$id = $_GET['id'];
if(!isset($_GET['val']))
$val='';
else
$val = $_GET['val'];
// Create a database connection
$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$query = "SELECT date as label, sum(quantite_in) AS max_data, sum(quantite_out) AS min_data FROM details where device_id=$id and date like '%$val%' group by date order by date";
$result = $conn->query($query);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>

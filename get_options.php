<?php
function get_options($id){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dechet';

    $connection = new mysqli($host, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Fetch data from the database (replace with your actual query)
    $query = "SELECT DISTINCT DATE_FORMAT(date, '%Y-%m') AS month
    FROM details where device_id=$id;";
    $result = $connection->query($query);
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
            echo '<option value="'.$row['month'].'">'.$row['month'].'</options>';
        }
    }
}

?>
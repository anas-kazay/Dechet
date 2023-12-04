<?php
// Include your database connection code here
$connection  = mysqli_connect('localhost','root','','dechet');
if (isset($_POST['vente_id'])) {
    $vente_id = $_POST['vente_id'];

    // Delete the associated line from the database (replace with your actual delete query)
    $query = "DELETE FROM article where id_vente= $vente_id";
    $success1 = $connection->query($query);
    $query = "DELETE FROM ventes WHERE id = $vente_id";
    $success2 = $connection->query($query);

    if ($success1 && $success2) {
        echo "Success";
    } else {
        echo "Error deleting line.";
    }
} else {
    echo "Invalid request.";
}
?>

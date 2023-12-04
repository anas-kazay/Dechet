<?php
$con = mysqli_connect('localhost', 'root', '', 'dechet');
$id = $_POST['id'];
$vente_id = $_POST['vente_id']; // Get vente_id from POST data

$query = "DELETE FROM article WHERE id=$id";
$result = mysqli_query($con, $query);

if ($result) {
    // Fetch updated total
    $query = "SELECT id_vente, sum(prix * quantite) as total FROM article WHERE id_vente=$vente_id";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
    $total = $row['total'];
    if($total===null)
    $total=0.00;
    echo json_encode(array('status' => 'success', 'id' => $vente_id, 'total' => $total));
} else {
    echo json_encode(array('status' => 'failure', 'ans' => $query));
}
?>



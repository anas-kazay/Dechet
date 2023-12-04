<?php 
include('connection.php');
$designation = $_POST['designation'];
$prix = $_POST['prix'];
$quantite = $_POST['quantite'];
$id = $_POST['id'];
$vente_id = $_POST['vente_id'];

$sql = "UPDATE `article` SET  `designation`='$designation' , `prix`= $prix , `quantite`= $quantite  WHERE id=$id ";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
    $query = "SELECT id_vente, sum(prix * quantite) as total FROM article WHERE id_vente=$vente_id";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
    $total = $row['total'];
    if($total===null)
    $total=0.00;
    echo json_encode(array('status' => 'success', 'id' => $vente_id, 'total' => $total));
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>
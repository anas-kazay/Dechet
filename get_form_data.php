<?php 
$con  = mysqli_connect('localhost','root','','dechet');
$id = $_POST['id'];
$sql = "SELECT clients.name as client_name,clients.address as client_address,
clients.email as client_email,
clients.telephone as client_telephone ,
users.name as user_name,
users.address as user_address,
users.email as user_email,
users.id as user_id,
clients.id as client_id,
ventes.id as vente_id,
users.telephone as user_telephone
FROM ventes join clients on ventes.id_client = clients.id join users on users.id = clients.user_id
 WHERE ventes.id='$id' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
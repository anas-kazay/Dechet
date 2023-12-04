<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('connection.php');
    // Retrieve values from the form
    $user_name = $_POST["user_name"];
    $user_address = $_POST["user_address"];
    $user_email = $_POST["user_email"];
    $user_telephone = $_POST["user_telephone"];
    
    $client_name = $_POST["client_name"];
    $client_address = $_POST["client_address"];
    $client_email = $_POST["client_email"];
    $client_telephone = $_POST["client_telephone"];
    
    $vente_id = $_POST['vente_id'];
    $client_id = $_POST['client_id'];
    $user_id = $_POST['user_id'];
    


$sql = "UPDATE `clients` SET  `name`='$client_name' , `telephone`= '$client_telephone' , `email`= '$client_email' , `address`= '$client_address' WHERE id=$client_id ";
$query= mysqli_query($con,$sql);
$sql = "UPDATE `users` SET  `name`='$user_name' , `telephone`= '$user_telephone' , `email`= '$user_email' , `address`= '$user_address' WHERE id=$user_id ";
$query= mysqli_query($con,$sql);


$sql = "select sum(prix*quantite) as total from article where id_vente=$vente_id";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);
$total = $result['total'];


$sql = "SELECT * FROM factures WHERE id_vente=$vente_id";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0){
    $sql = "insert into factures(`id`,`id_vente`,`date`,`total`) values ($vente_id,$vente_id,NOW(),$total)";
    $query = mysqli_query($con, $sql);
}else{
    $sql = "UPDATE `factures` SET  `date`=NOW() , `total`= $total  WHERE id=$vente_id";
    $query = mysqli_query($con, $sql);
}

    header("Location: facture.php?id=".$vente_id);
    exit();
}
?>

<?php 
session_start();
include('connection.php');

$device_id = $_POST['device_id'];
$date = $_POST['date'];
$quantite_in = $_POST['quantite_in'];
$quantite_out = $_POST['quantite_out'];

$sql = "INSERT INTO `details` (`date`,`quantite_in`,`quantite_out`,`device_id`) values ('$date', $quantite_in,$quantite_out,$device_id)";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>
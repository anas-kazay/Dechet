<?php 
session_start();
include('connection.php');
$name = $_POST['name'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$address = $_POST['address'];
$sql = "INSERT INTO `clients` (`name`,`telephone`,`email`,`address`,`user_id`) values ('$name', '$telephone', '$email', '$address',".$_SESSION['user_id'].")";
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
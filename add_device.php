<?php 
session_start();
include('connection.php');

$name = $_POST['name'];
$serial = $_POST['serial'];

$sql = "INSERT INTO `devices` (`name`,`serial`,`user_id`) values ('$name', '$serial',".$_SESSION['user_id'].")";
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
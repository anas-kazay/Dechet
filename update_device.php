<?php 
include('connection.php');
$name = $_POST['name'];
$serial = $_POST['serial'];
$id = $_POST['id'];

$sql = "UPDATE `devices` SET  `name`='$name' , `serial`= '$serial' WHERE id='$id' ";
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
<?php
$con = mysqli_connect('localhost', 'root', '', 'dechet');
$id = $_POST['id'];

$sql = "DELETE FROM details WHERE id=$id";
$delQuery =mysqli_query($con,$sql);
if($delQuery==true)
{
	 $data = array(
        'status'=>'success',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
      
    );

    echo json_encode($data);
} 
?>



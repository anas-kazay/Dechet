<?php
// Database connection code here
include('connection.php');
if (isset($_POST['rowId'], $_POST['selectedValue'])) {
    $rowId = $_POST['rowId'];
    $selectedValue = $_POST['selectedValue'];

    $sql = "UPDATE `departement` SET  `etat`=$selectedValue  WHERE id=$rowId ";
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
    
    echo 'Database updated successfully'; // Return a response
} else {
    echo 'Invalid data received';
}
?>

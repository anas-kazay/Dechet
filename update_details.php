<?php 
session_start();
include('connection.php');

$id = $_POST['id'];
$date = $_POST['date'];
$quantite_in = $_POST['quantite_in'];
$quantite_out = $_POST['quantite_out'];


    $sql = "UPDATE `details` SET  `date`='$date' , `quantite_in`= $quantite_in , `quantite_out`=$quantite_out WHERE id=$id ";
        $query= mysqli_query($con,$sql);
        if($query ==true)
        {
           
            $response = array(
                'status'=>'success',
                'tr' => '<tr id="roww'.$id.'">
                <td scope="row" class="id">'.$id.'</th>
                <td scope="row" class="id">'.$date.'</th>
                <td scope="row" class="id">'.$quantite_in.'</th>
                <td scope="row" class="id">'.$quantite_out.'</th>
                <td> <a href="javascript:void();" data-id="'.$id.'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$id.'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a> </td>
              </tr>'
               
            );
        
            
        }
        else
        {
             
        $response = array(
            'status'=>'failure'
        );
            
        } 


echo json_encode($response);


?>
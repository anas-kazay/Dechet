<?php 
session_start();
include('connection.php');

$id = $_POST['id'];
$etat = $_POST['etat'];
$old_id = $_POST['old_id'];

// Check if the ID already exists in the database
$check_query = "SELECT * FROM departement WHERE id = $id";
$check_result = mysqli_query($con, $check_query);

if (mysqli_num_rows($check_result) > 0 && $id!=$old_id) {
    $response = array(
        'status' => 'error',
        'message' => 'Departement '.$id.' already exists'
    );
} else {
    $sql = "UPDATE `departement` SET  `id`=$id , `etat`= $etat WHERE id=$old_id ";
        $query= mysqli_query($con,$sql);

        if($query ==true)
        {
           
            $response = array(
                'status'=>'success',
                'tr' => '<tr id="row'.$id.'">
                <td scope="row" class="id">'.$id.'</th>
                <td class="etat"><select class="form-select etatSelect" aria-label="Default select example" data-row-id="' . $id . '">
                <option value="true" ' . ($etat == true ? 'selected' : '') . '>True</option>
                <option value="false" ' . ($etat == false ? 'selected' : '') . '>False</option>
            </select></td>
                <td> <a href="javascript:void();" data-id="'.$id.'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$id.'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a> </td>
              </tr>'
               
            );
        
            
        }
        else
        {
             $response = array(
                'status'=>'false',
              
            );
        
            
        } 
}

echo json_encode($response);


?>
<?php
// Include your database connection code here
$connection  = mysqli_connect('localhost','root','','dechet');

    $vente_id = $_POST['vente_id']; // Get the vente ID from the POST data
    $designation = $_POST['designation'];
    $prix = $_POST['prix']; 
    $quantite = $_POST['quantite'];

    // Insert the new article into the database (replace with your actual insert query)
    $query = "INSERT INTO article (id_vente, designation, prix, quantite) VALUES ($vente_id, '$designation', $prix, $quantite)";
    $success = $connection->query($query);

    if ($success) {
        // Retrieve and generate the updated content
        $total= 0.00;
        $query = "select id,sum(prix * quantite) as total from article where id_vente=$vente_id";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
                $total =  $row['total'];
              
    }
        $query="select * from article where id_vente=$vente_id order by id desc limit 1";
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $content = ' <tr id="row'.$row['id'].'">
                <th scope="row">'.$row['id'].'</th>
                <td class="designation">'.$row['designation'].'</td>
                <td class="prix">'.$row['prix'].'DH</td>
                <td class="quantite">'.$row['quantite'].'</td>
                <td> <a href="javascript:void();" data-id="'.$row['id'].'" data-vente-id="'.$vente_id.'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  data-vente-id="'.$vente_id.'" class="btn btn-danger btn-sm deleteBtn" >Delete</a> </td>
              </tr>';
            }

        
    }
    $selectedAttributes = array(
        'id' => $vente_id,
        'total' => $total,
        'content' => $content
    );

    echo json_encode($selectedAttributes);
    } else {
        echo json_encode(array('status' => 'false'));
    }


// Function to retrieve and generate updated content

?>

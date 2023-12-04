<?php

$con  = mysqli_connect('localhost','root','','dechet');
$id = $_POST['id'];
$sql = "SELECT 
clients.name as client_name,
clients.address as client_address,
clients.email as client_email,
clients.telephone as client_telephone ,
users.name as user_name,
users.address as user_address,
users.email as user_email,
users.id as user_id,
clients.id as client_id,
ventes.id as vente_id,
users.telephone as user_telephone
FROM ventes join clients on ventes.id_client = clients.id join users on users.id = clients.user_id
 WHERE ventes.id='$id' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);
$content='';

$sql = "select * from article where id_vente=$id";
$query = mysqli_query($con, $sql);

 if ($query) {
     while ($row2 = mysqli_fetch_assoc($query)) {
        $t=$row2['prix'];
        $t*=$row2['quantite'];
         $content.='<tr>
         <td class="center">1</td>
        
        <td class="left">'.$row2['designation'].'
          
         </td>
         <td class="right">'.$row2['prix'].'</td>
         <td class="center">'.$row2['quantite'].'</td>
         <td class="right">'.$t.'</td>
       </tr>';

        
        
     }
 }

  $sql = "select date from factures where  id_vente=$id";
  $query = mysqli_query($con, $sql);
  $result = mysqli_fetch_assoc($query);
  $date = $result['date'];


  $sql = "select sum(prix*quantite) as total from article where id_vente=$id";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);
$total = $result['total'];

$data = array(
    'client_name'=>$row['client_name'],
    'user_name' => $row['user_name'],
    'client_address' => $row['client_address'],
    'client_email'=> $row['client_email'],
    'client_telephone'=>$row['client_telephone'],
    'user_address'=> $row['user_address'],
    'user_email'=>$row['user_email'],
    'user_telephone'=>$row['user_telephone'],
    'user_id'=>$row['user_id'],
    'client_id'=>$row['client_id'],
    'vente_id'=>$row['vente_id'],
    'content'=>$content,
    'date'=>$date,
    'total'=>$total

  
);

echo json_encode($data);


?>
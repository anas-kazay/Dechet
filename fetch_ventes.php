<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
function get_data($clt_id) {
    // Connect to your database (replace with your actual database connection code)
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dechet';

    $connection = new mysqli($host, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Fetch data from the database (replace with your actual query)
    $query = "SELECT ventes.id, COALESCE(SUM(prix * quantite), 0) AS total, date
    FROM ventes
    LEFT JOIN article ON article.id_vente = ventes.id
    WHERE id_client = $clt_id
    GROUP BY ventes.id
    ORDER BY ventes.id DESC;";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {

        echo '<div class="accordion" id="accordionPanelsStayOpenExample">';
        while ($row = $result->fetch_assoc()) {
            echo ' 
  <div class="accordion-item" id="accordion-item'.$row['id'].'">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed"  id="button'.$row['id'].'" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse'.$row['id'].'" aria-expanded="true" aria-controls="panelsStayOpen-collapse'.$row['id'].'">
        Vente Numero #'.$row['id'].' total : '.$row['total'].' DH
      </button>
    </h2>
    <div id="panelsStayOpen-collapse'.$row['id'].'" class="accordion-collapse collapse ">
      <div class="accordion-body">
      <div class="pb-4">
      <a href="#!" class="btn btn-danger btn-sm delete-vente" data-vente-id="'.$row['id'].'">Delete this vente</a>
      <a href="#addUserModal" class="btn btn-primary btn-sm add-article" data-bs-toggle="modal" data-vente-id="'.$row['id'].'">Ajouter Article</a>
      <a href="form.php?id='.$row['id'].'" class="btn btn-secondary btn-sm "  data-vente-id="'.$row['id'].'">Facture</a>
      </div>';
     $query = "SELECT * from article where id_vente=".$row['id']." order by id desc";
     $rslt = $connection->query($query);
     echo '<table class="table table-hover " id="example">
     <thead>
     <tr>
       <th scope="col">#</th>
       <th scope="col">Designation</th>
       <th scope="col">Prix</th>
       <th scope="col">Quantite</th>
       <th scope="col"></th>
     </tr>
   </thead><tbody>';
     if($rslt->num_rows > 0){
        
        
        while($r = $rslt->fetch_assoc()){
            echo '
    <tr id="row'.$r['id'].'">
      <th scope="row">'.$r['id'].'</th>
      <td class="designation">'.$r['designation'].'</td>
      <td class="prix">'.$r['prix'].'DH</td>
      <td class="quantite">'.$r['quantite'].'</td>
      <td> <a href="javascript:void();" data-id="'.$r['id'].'" data-vente-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" ><i class="ti ti-pencil"></i></a>  <a href="javascript:void();" data-id="'.$r['id'].'"  data-vente-id="'.$row['id'].'" class="btn btn-danger btn-sm deleteBtn" ><i class="ti ti-trash" ></i></a> </td>
    </tr>
    ';
    

        }
     }
    
     echo ' </tbody></table></div>
     <p class="px-4"><strong id="total'.$row['id'].'">total : '.$row['total'].' DH</strong></p>
    </div>
  </div>';
  
  

        }
        echo '</div>';
    } else {
        echo '<div class="accordion" id="accordionPanelsStayOpenExample"></div>';
    }

    // Close the database connection
    $connection->close();
}
?>



<?php
session_start();
// Include your database connection code here
$connection  = mysqli_connect('localhost','root','','dechet');
// Check if the AJAX request was sent successfully
if (isset($_POST['id'])) {
    $clt_id = $_POST['id'];

    // Add a new line to the database (replace with your actual query)
    $query = "INSERT INTO ventes (id_client,total) VALUES ($clt_id,0)";
    $success = $connection->query($query);

    if ($success) {
        // Retrieve and return the HTML for the new line
        $qurty = "SELECT * FROM ventes WHERE id_client=$clt_id ORDER BY id DESC LIMIT 1";
        $result = $connection->query($qurty);
        if (!isset($_SESSION['i'])){
          $_SESSION['i']=0;
        }

        if ($result->num_rows > 0) {
            $_SESSION['i']++;
            $row = $result->fetch_assoc();
            echo ' 
    <div class="accordion-item" id="accordion-item'.$row['id'].'">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" id="button'.$row['id'].'" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse'.$row['id'].'" aria-expanded="true" aria-controls="panelsStayOpen-collapse'.$row['id'].'">
        Vente Numero #'.$row['id'].' total: '.$row['total'].'DH
      </button>
    </h2>
    <div id="panelsStayOpen-collapse'.$row['id'].'" class="accordion-collapse collapse ">
      <div class="accordion-body">
      <div class="pb-4">
      <a href="#!" class="btn btn-danger btn-sm delete-vente" data-vente-id="'.$row['id'].'">Delete this vente</a>
      <a href="#addUserModal" class="btn btn-primary btn-sm add-article" data-bs-toggle="modal" data-vente-id="'.$row['id'].'">Ajouter Article</a>
      <a href="form.php?id='.$row['id'].'" class="btn btn-secondary btn-sm add-article" data-bs-toggle="modal" data-vente-id="'.$row['id'].'">Facture</a>
      </div>
      <table class="table table-hover ">
     <thead>
     <tr>
       <th scope="col">#</th>
       <th scope="col">Designation</th>
       <th scope="col">Prix</th>
       <th scope="col">Quantite</th>
       <th scope="col">Options</th>
     </tr>
   </thead><tbody>
   </tbody></table>
      </div>
      <p class="px-4"><strong id="total'.$row['id'].'">total : '.$row['total'].' DH</strong></p></div></div>
       
     ';
        } else {
            return "No data found.";
        }
    } else {
        echo "Error adding new line.";
    }
} else {
    echo "Invalid request.";
}

// Function to generate HTML for the new line (similar to your existing get_data function)
function generate_new_line($clt_id) {
    // ... (Generate HTML for the new line)
}
?>

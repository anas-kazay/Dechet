<?php session_start();
if (!isset($_SESSION['user_id'])) {
  // Redirect the user to another page
  header('Location: index.php');
  exit; // Make sure to use exit or die after header to stop further execution
}
require_once 'fetch_ventes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dechet</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="datatables-1.10.25.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="dt-1.10.25datatables.min.js"></script>
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
    <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 95%;
      margin-bottom: 20px;
      margin-right:0px;
    }
    #example th:nth-child(5),
    #example td:nth-child(5) {
    text-align: right;
    }



#example td:nth-child(6) {
  width: 150px; /* Adjust the width as needed */
  white-space: nowrap; /* Prevent line breaks */
}

#example td:nth-child(6) button {
  display: block;
  margin: 5px auto; /* Center the buttons vertically */
  width: 100%; /* Make buttons occupy the full width of td */
  /* Any other styling you need for the buttons */
}


    #example tbody tr:hover td {
  background-color: #f2f2f2; /* Change to your desired grey color */
}



/* Define custom styles for a half column */


  </style>
</head>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./clients.php" class="text-nowrap logo-img">
            <img src="./assets/images/logos/logo.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">

          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./devices.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Devices</span>
              </a>
            </li>
   
            <li class="sidebar-item selected">
              <a class="sidebar-link" href="./clients.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Clients</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-alerts.html" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Alerts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Card</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                <span>
                  <i class="ti ti-file-description"></i>
                </span>
                <span class="hide-menu">Forms</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="#" aria-expanded="false" onclick="logout()">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
            </li>

          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header"  id="dynamic-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"  style="z-index:10;"></i>
              </a>
            </li>

          </ul>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">

  <div class="card">
  <div class="row">
    <div class="col-md-11 mx-auto">
      <?php echo '<h2 class="text-left my-4 pl-4"><strong>Ventes du client : '.$_GET['cltName'].'</strong></h2>'; ?>
    </div>
    
  </div>
  
    <h1 class="text-center my-4"></h1>
    <div class="container-fluid">

    <div class="row">
      <div class="container">
        <div class="btnAdd">
          <a href="#!"  class="btn  btn-sm" id="add_vente" style="background-color:#5D87FF;color:white">Add Vente</a>
        </div>
        <div class="row">
          
          <div class="col-md-11 pb-4 mx-auto" id="update">
            <?php get_data($_GET['id']); ?>

          </div>
          
        </div>
      </div>
    </div>
  </div>
        
  
        
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>


    
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
  <script type="text/javascript">



function logout() {
    if (confirm("Are you sure you want to log out?")) {
        // If confirmed, perform logout actions
        window.location.href = "logout.php"; // Redirect to logout script
    }
}



$(document).ready(function() {
    $('#add_vente').on('click', function() {
        $.ajax({
            url: 'add_vente.php', // PHP script to add a new line to the database
            type: 'POST',
            data: { id: <?php echo $_GET['id']; ?> },
            success: function(response) {
                // Prepend the new line before the existing content
                $('.accordion').prepend(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});



$(document).ready(function() {
    // Handle click event for "Delete this vente" links
    $(document).on('click', '.delete-vente', function(e) {
        e.preventDefault();
        var venteId = $(this).data('vente-id');

        // Ask for user confirmation
        var confirmDelete = confirm("Are you sure you want to delete this vente?");

        if (confirmDelete) {
            // Send AJAX request to delete_vente.php
            $.ajax({
                url: 'delete_vente.php',
                type: 'POST',
                data: { vente_id: venteId },
                success: function(response) {
                    if (response === 'Success') {
                        // Remove the corresponding accordion item from the div
                        var accordionItem = $(e.target).closest('.accordion-item');
                        accordionItem.remove();
                        
                    } else {
                        console.log(response); // Handle error
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
});


$(document).ready(function() {
    // Handle click event for "Ajouter Article" links
    $(document).on('click', '.add-article', function(e) {
        e.preventDefault();
        var venteId = $(this).data('vente-id');

        // Set the venteId value in the hidden input field of the modal
        $('#venteIdInput').val(venteId);

        // Open the modal
        $('#addUserModal').modal('show');
    });

    // Handle form submission inside the modal
    $('#addUser').on('submit', function(e) {
      e.preventDefault();
      var designation = $('#designation_add').val();
      var prix = $('#prix_add').val();
      var quantite = $('#quantite_add').val();
      var venteId = $('#venteIdInput').val();


        // Send AJAX request to add_article.php
        if (designation != '' && prix != '' && quantite != ''){
          $.ajax({
            url: 'add_article.php', // PHP script to add an article
            type: 'POST',
            data: {
                vente_id: venteId, // Pass the vente ID to the PHP script
                designation: designation,
                prix: prix,
                quantite: quantite
            },
            success: function(data) {
                // Update the accordion item with the new content
                var json = JSON.parse(data);

                var accordionItem = $('#accordion-item' + venteId);
                
                accordionItem.find('.accordion-body').find('.table').find('tbody').prepend(json.content);
                accordionItem.find('.accordion-header').find('.accordion-button').html('Vente Numero #'+json.id+' total : '+json.total+' DH');
                $('#total' + venteId).html('total: ' + json.total + ' DH');
                // Close the modal
                $('#addUserModal').modal('hide');
                $('#designation_add').val('');
                $('#prix_add').val('');
                $('#quantite_add').val('');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
        }else{
          alert('Fill all the required fields');
        }
        
    });
});

    
$(document).on('click', '.deleteBtn', function() {
    var id = $(this).data('id');
    var venteId = $(this).data('vente-id'); // Get vente_id from data attribute
    var tableRow = $(this).closest('tr'); // Store reference to the table row
    var accordionButton = $(this).closest('.accordion-item').find('.accordion-button'); // Store reference to the accordion button
    
    if (confirm("Are you sure you want to delete this item?")) {
        $.ajax({
            url: 'delete_article.php',
            type: 'POST',
            data: { id: id, vente_id: venteId }, // Pass vente_id to PHP script
            success: function(response) {
              var responseData = JSON.parse(response); // Parse the JSON response
                
                if (responseData.status === 'success') {
                    // Update the total in the accordion header
                    accordionButton.html('Vente Numero #' + responseData.id + ' total : ' + responseData.total + ' DH');
                    
                    // Remove the table row
                    tableRow.remove();

                    $('#total' + venteId).html('total: ' + responseData.total + ' DH');
                } else {
                    alert('Failed to delete.');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});





    $(document).on('submit', '#updateDevice', function(e) {
      e.preventDefault();
      var designation = $('#designation').val();
      var prix = $('#prix').val();
      var quantite = $('#quantite').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
      var vente_id = $('#vente_id').val();
      if (designation != '' && prix != '' && quantite != '') {
        $.ajax({
          url: "update_article.php",
          type: "post",
          data: {
            designation: designation,
            prix: prix,
            quantite: quantite,
            id: id,
            vente_id : vente_id
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status === 'success') {

              var row = $('#row' + id);
              row.find('.designation').text(designation);
              row.find('.prix').text(prix + ' DH');
              row.find('.quantite').text(quantite);
              $('#total' + vente_id).html('total: ' + json.total + ' DH');
              $('#button'+vente_id).html('Vente Numero #' + json.id + ' total : ' + json.total + ' DH')
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });





    $(document).on('click', '.editbtn', function(event) {
    var id = $(this).data('id');
    var trid = $(this).closest('tr').attr('id');
    var vente_id=$(this).data('vente-id');
    $('#exampleModal').modal('show');

    $.ajax({
        url: "get_single_article.php",
        data: {
            id: id
        },
        type: 'post',
        success: function(data) {
          
            var json = JSON.parse(data);
            $('#designation').val(json.designation);
            $('#prix').val(json.prix);
            $('#quantite').val(json.quantite);
            $('#id').val(id);
            $('#trid').val(trid);
            $('#vente_id').val(vente_id);

        }
    });
});
    
    


    











    
    
  </script>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Client</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateDevice">
            <input type="hidden" name="vente_id" id="vente_id" value="">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Designation</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="designation" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">Prix</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="prix" name="telephone">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">Quantite</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="quantite" name="email">
              </div>
            </div>
            
            
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add user Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Article</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">
            <div class="mb-3 row">
              <label for="addUserField" class="col-md-3 form-label">Designation</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="designation_add" name="designation">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addEmailField" class="col-md-3 form-label">Prix</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="prix_add" name="prix">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addUserField" class="col-md-3 form-label">Quantite</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="quantite_add" name="quantite">
              </div>
            </div>
            <input type="hidden" class="form-control" id="venteIdInput" name="vente_id">

            
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>


  
  <script src="./assets/js/sidebarmenu.js"></script>
  <script src="./assets/js/app.min.js"></script>
  <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
  <script>
  function updateHeaderStyle() {
    var appHeader = document.getElementById("dynamic-header");
    
    if (window.innerWidth < 1200) {
      appHeader.style.position = "relative";
      appHeader.style.zIndex = "2";
    } else {
      appHeader.style.position = ""; // Remove inline style
      appHeader.style.zIndex = ""; // Remove inline style
    }
  }

  // Initial call to apply style on page load
  updateHeaderStyle();

  // Listen for the window resize event and update style accordingly
  window.addEventListener("resize", updateHeaderStyle);
</script>


</html>

<?php session_start();
if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
  // Redirect the user to another page
  header('Location: index.php');
  exit; // Make sure to use exit or die after header to stop further execution
}

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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 95%;
      margin-bottom: 20px;
      margin-right:0px;
    }

    #table2 th:nth-child(5),
    #table2 td:nth-child(5) {
    text-align: right;
    }

    #table2 th:nth-child(4),
    #table2 td:nth-child(4),
    #table2 th:nth-child(3),
    #table2 td:nth-child(3) {
    text-align: center;
    }


#table1 td:nth-child(2),
#table2 td:nth-child(5) {
  width: 150px; /* Adjust the width as needed */
  white-space: nowrap; /* Prevent line breaks */
}

#table1 td:nth-child(2) button,
#table2 td:nth-child(5) button {
  display: block;
  margin: 5px auto; /* Center the buttons vertically */
  width: 100%; /* Make buttons occupy the full width of td */
  /* Any other styling you need for the buttons */
}


    #table1 tbody tr:hover td,
    #table2 tbody tr:hover td {
  background-color: #f2f2f2; /* Change to your desired grey color */
}

#table1 th,
#table2 th {
  background-color: #5D87FF;
  color: white;
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
          <a href="./devices.php" class="text-nowrap logo-img">
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
            <li class="sidebar-item selected">
              <a class="sidebar-link" href="./devices.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Devices</span>
              </a>
            </li>
   
            <li class="sidebar-item">
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
      <div class="card">
      <div class="row">
        <div class="col-md-11 mx-auto">
        <h2 class="text-left my-3 " ><strong>Device : <?php  echo $_GET['name'] ?></strong></h2>
        <?php echo '<p class="text-left  ">serial :'.$_GET['serial']."</p>"; ?>
</div>
</div>
</div>
<div class="container-fluid">
        




  <!-- TABLE 2 -->
  <div class="card pt-4">
  <div class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="row">

          <div class="col-md-10 mx-auto d-flex justify-content-end">
            <div class="btnAdd "> <!-- Align the button to the right for medium and larger screens -->
              <a
                href="#"
                data-id=""
                data-bs-toggle="modal"
                data-bs-target="#addUserModal2"
                class="btn btn-sm"
                style="background-color: #5d87ff; color: white"
                >Add Line</a
              >
            </div>
          </div>
        </div>

        <div class="row pb-2">
          <div class="col-md-10 pb-4 mx-auto">
            <table id="table2" class="table table-hover">
              <thead>
                <th>Id</th>
                <th>Date</th>
                <th>Quantite Entree</th>
                <th>Quantite Sortie</th>
                <th></th>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





<!-- chart -->
  <div class="card pt-4">    
    <div class="container-fluid">
      <div class="row">
        <div class="container">
          
          <div class="row pb-2">
            <div class="col-md-8 pb-4 mx-auto" id="update">
            <canvas id="myChart"></canvas>
            </div>
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
  var params = new URLSearchParams(window.location.search);
  var id = params.get('id');


    $('#table2').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_details.php',
          'type': 'post',
          'data':{
            'id':id
          }
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [3]
          },

        ]
      });



});

    






    //add to table 2
    $(document).on('submit', '#addUser2', function(e) {
      e.preventDefault();
      var params = new URLSearchParams(window.location.search);
      var device_id = params.get('id');
      var date = $('#date_add').val();
      var quantite_in = $('#quantite_in_add').val();
      var quantite_out = $('#quantite_out_add').val();
      if (date != '' && quantite_in != '' && quantite_out!='') {
        $.ajax({
          url: "add_details.php",
          type: "post",
          data: {
            device_id: device_id,
            date: date,
            quantite_in:quantite_in,
            quantite_out:quantite_out
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#table2').DataTable();
              mytable.draw();
              $('#addUserModal2').modal('hide');
              $('.modal-backdrop').remove();
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });






    //submet update table 2
    $(document).on('submit', '#updateDevice2', function(e) {
      e.preventDefault();
      var id = $('#idd').val();
      var date = $('#date').val();
      var quantite_in  = $('#quantite_in').val();
      var quantite_out  = $('#quantite_out').val();
      if (id != '' && date != '' && quantite_in!='' && quantite_out!='') {
        $.ajax({
          url: "update_details.php",
          type: "post",
          data: {
            id: id,
            date: date,
            quantite_in: quantite_in,
            quantite_out: quantite_out
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            
            if (status == 'success') {
              table = $('#table2').DataTable();
              var button = '<td><a href="javascript:void();" data-id="'+id+'"  class="btn btn-info btn-sm editbtn" ><i class="ti ti-pencil"></i></a>  <a href="javascript:void();" data-id="'+id+'"  class="btn btn-danger btn-sm deleteBtn" ><i class="ti ti-trash"></i></a></td>';
              var row = table.row("[id='" + id + "']");
              row.row("[id='" + id + "']").data([id, date, quantite_in,  quantite_out, button]);
              $('#exampleModal2').modal('hide');
            } else {
              console.log('noo');

            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });

    

  // etd button table 2

    $('#table2').on('click', '.editbtn ', function(event) {

var trid = $(this).closest('tr').attr('id');
var id = $(this).data('id');
$('#exampleModal2').modal('show');

$.ajax({
  url: "get_single_details.php",
  data: {
    id: id
  },
  type: 'post',
  success: function(data) {
    var json = JSON.parse(data);
    $('#idd').val(id);
    $('#date').val(json.date);
    $('#quantite_in').val(json.quantite_in);
    $('#quantite_out').val(json.quantite_out); 

  }
})
});




// delete from table 2

$('#table2').on('click', '.deleteBtn', function() {
    var id = $(this).data('id');
    var tableRow = $(this).closest('tr');
    console.log(tableRow);
    if (confirm("Are you sure you want to delete this Line?")) {
        $.ajax({
            url: 'delete_details.php',
            type: 'POST',
            data: {
               id: id
             }, 
            success: function(response) {
              var responseData = JSON.parse(response); // Parse the JSON response
                
                if (responseData.status === 'success') { 
                  console.log(tableRow);             
                    tableRow.remove();
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
    
  </script>




<!-- Modal 2 -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateDevice2">
            <input type="hidden" name="id" id="idd" value="">
            <input type="hidden" name="old_id" id="old_id" value="">
            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Date</label>
              <div class="col-md-9">
                <input type="date" class="form-control" id="date" name="date">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Quantite Entree</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="quantite_in" name="id">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Quantite Sortie</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="quantite_out" name="id">
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
  <div class="modal fade" id="addUserModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Line</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser2" action="">
          <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Date</label>
              <div class="col-md-9">
                <input type="date" class="form-control" id="date_add" name="date">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Quantite Entree</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="quantite_in_add" name="id">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Quantite Sortie</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="quantite_out_add" name="id">
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



</body>


  <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
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

<script>
      $(document).ready(function () {
        var ctx = document.getElementById("myChart").getContext("2d");

        // Get the ID from the URL (assuming it's in the form of '?id=123')
        var urlParams = new URLSearchParams(window.location.search);
        var id = urlParams.get("id");

        // Fetch data from PHP script using AJAX
        $.ajax({
          url: "script.php",
          data: { id: id }, // Send the ID to the PHP script
          dataType: "json",
          success: function (data) {
            var labels = data.map((item) => item.label);
            var maxData = data.map((item) => item.max_data);
            var minData = data.map((item) => item.min_data);

            var myChart = new Chart(ctx, {
              type: "line",
              data: {
                labels: labels,
                datasets: [
                  {
                    label: "Max Data",
                    data: maxData,
                    borderColor: "#5D87FF",
                    backgroundColor: "rgba(0, 0, 0, 0)",
                    borderWidth: 2,
                    fill: false,
                  },
                  {
                    label: "Min Data",
                    data: minData,
                    borderColor: "#49BEFF",
                    backgroundColor: "rgba(0, 0, 0, 0)",
                    borderWidth: 2,
                    fill: false,
                  },
                ],
              },
              options: {
                responsive: true,
                scales: {
                  y: {
                    beginAtZero: true,
                  },
                },
              },
            });
          },
          error: function (error) {
            console.error("Error fetching data:", error);
          },
        });
      });
    </script>


</html>

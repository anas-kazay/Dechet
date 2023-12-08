<?php session_start();
if (!isset($_SESSION['user_id'])) {
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

    <!-- ICONS -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


    <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 95%;
      margin-bottom: 20px;
      margin-right:0px;
    }
    #example th:nth-child(4),
    #example td:nth-child(4) {
    text-align: center;
    }

    #example th:nth-child(4),
#example td:nth-child(4) {
  text-align: right;
}

#example td:nth-child(4) {
  width: 150px; /* Adjust the width as needed */
  white-space: nowrap; /* Prevent line breaks */
}

#example td:nth-child(4) button {
  display: block;
  margin: 5px auto; /* Center the buttons vertically */
  width: 100%; /* Make buttons occupy the full width of td */
  /* Any other styling you need for the buttons */
}


    #example tbody tr:hover td {
  background-color: #f2f2f2; /* Change to your desired grey color */
}

#example th {
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
          <h1 class="text-left my-4 strong" ><strong>Devices</strong> </h1>
        </div>
      </div>
      
      <div class="container-fluid">

        <div class="row">
          <div class="container">
            <div class="btnAdd">
              <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn  btn-sm" style="background-color:#5D87FF;color:white">Add Device</a>
            </div>
            <div class="row pb-4">
              <div class="col-md-11 mx-auto">
                <table id="example" class="table pt-4">
                  <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Serial</th>
                    <th></th>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
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
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch_devices.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [3]
          },

        ]
      });
    });
    
    $(document).on('submit', '#addUser', function(e) {
      e.preventDefault();
      var name = $('#name_add').val();
      var serial = $('#serial_add').val();
      if (name != '' && serial != '') {
        $.ajax({
          url: "add_device.php",
          type: "post",
          data: {
            name: name,
            serial: serial
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
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


    $(document).on('submit', '#updateDevice', function(e) {
      e.preventDefault();
      var name = $('#name').val();
      var serial = $('#serial').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
      if (serial != '' && name != '') {
        $.ajax({
          url: "update_device.php",
          type: "post",
          data: {
            name: name,
            serial: serial,
            id: id
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn"><i class="ti ti-pencil" style="font-size: 18px;"></i></a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn"><i class="ti ti-trash" style="font-size: 18px;"></i></a> <a href="device.php?id='+id+'" data-id="'+id+'"  class="btn btn-secondary btn-sm editbtn" ><i class="ti ti-article" style="font-size: 18px;"></i></a><a href="graphe.php?id='+id+'&name='+name+'&serial='+serial+'" data-id="'+id+'" class="btn btn-secondary btn-sm editbtn"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-timeline" width="20" height="21" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" style="font-size: 18px;"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 16l6 -7l5 5l5 -6"></path><path d="M15 14m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M10 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M4 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path><path d="M20 8m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path></svg></a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([id, name, serial,  button]);
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


    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_single_device.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#name').val(json.name);
          $('#serial').val(json.serial);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });


    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this Device ? ")) {
        $.ajax({
          url: "delete_device.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {

              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }



    })
    
  </script>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Device</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="updateDevice">
            <input type="hidden" name="id" id="id" value="">
            <input type="hidden" name="trid" id="trid" value="">
            <div class="mb-3 row">
              <label for="nameField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="name" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="emailField" class="col-md-3 form-label">Serial</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="serial" name="email">
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
          <h5 class="modal-title" id="exampleModalLabel">Add Device</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="addUser" action="">
            <div class="mb-3 row">
              <label for="addUserField" class="col-md-3 form-label">Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="name_add" name="name">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="addEmailField" class="col-md-3 form-label">Serial</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="serial_add" name="email">
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


</html>

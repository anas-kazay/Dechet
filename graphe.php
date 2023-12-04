<?php session_start();
if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
  // Redirect the user to another page
  header('Location: index.php');
  exit; // Make sure to use exit or die after header to stop further execution
}
require_once 'get_options.php';
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
        


  





<!-- chart -->
  <div class="card pt-4">    
    <div class="container-fluid">
      <div class="row">
        <div class="container">
        
        <!-- select -->
    <p class="text-left px-2">select month :</p>
    <select name="month" id="monthSelect" class="px-2">
        <option value="%">tous les mois</option>
        <?php get_options($_GET['id']) ?>
    </select>


          
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










    
  </script>








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
    var myChart;

   function test(data) {
    if (myChart) {
            myChart.destroy();
        }
  // Your code here, using the 'data' parameter
  var labels = data.map((item) => item.label);
  var maxData = data.map((item) => item.max_data);
  var minData = data.map((item) => item.min_data);

  var ctx = document.getElementById("myChart").getContext("2d");

   myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: labels,
      datasets: [
        {
          label: "input",
          data: maxData,
          borderColor: "#5D87FF",
          backgroundColor: "rgba(0, 0, 0, 0)",
          borderWidth: 2,
          fill: false,
        },
        {
          label: "output",
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
}

$(document).ready(function () {
var defaultOptionValue = $('#monthSelect').val();
  // Get the ID from the URL (assuming it's in the form of '?id=123')
  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get("id");

  $.ajax({
    url: "script.php",
    data: {
         id: id,
         val:defaultOptionValue 
        }, // Send the ID to the PHP script
    dataType: "json",
    success: function (data) {
      // Call the 'test' function with the 'data' parameter
      test(data);
    },
    error: function (error) {
      console.error("Error fetching data:", error);
    },
  });

  $('#monthSelect').change(function () {
        var selectedValue = $(this).val();
        console.log(selectedValue);
        $.ajax({
            url: "script.php",
            data: {
                id: id,
                val: selectedValue,
            }, // Send the ID and the selected value to the PHP script
            dataType: "json",
            success: function (data) {
                test(data); // Call the 'test' function with the new data
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    });
});

    </script>


</html>

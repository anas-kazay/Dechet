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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dechet</title>
    <link
      rel="shortcut icon"
      type="image/png"
      href="./assets/images/logos/favicon.png"
    />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="datatables-1.10.25.min.css" />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="dt-1.10.25datatables.min.js"></script>
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
    <style type="text/css">
      .btnAdd {
        text-align: right;
        width: 95%;
        margin-bottom: 20px;
        margin-right: 0px;
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
    </style>
  </head>
  <body>
    <!--  Body Wrapper -->
    <div
      class="page-wrapper"
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin6"
      data-sidebartype="full"
      data-sidebar-position="fixed"
      data-header-position="fixed"
    >
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div
            class="brand-logo d-flex align-items-center justify-content-between"
          >
            <a href="./clients.php" class="text-nowrap logo-img">
              <img src="./assets/images/logos/logo.png" width="180" alt="" />
            </a>
            <div
              class="close-btn d-xl-none d-block sidebartoggler cursor-pointer"
              id="sidebarCollapse"
            >
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
                <a
                  class="sidebar-link"
                  href="./devices.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu">Devices</span>
                </a>
              </li>

              <li class="sidebar-item selected">
                <a
                  class="sidebar-link"
                  href="./clients.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Clients</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./ui-alerts.html"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-alert-circle"></i>
                  </span>
                  <span class="hide-menu">Alerts</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./ui-card.html"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">Card</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./ui-forms.html"
                  aria-expanded="false"
                >
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
                <a
                  class="sidebar-link"
                  href="#"
                  aria-expanded="false"
                  onclick="logout()"
                >
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
        <header class="app-header" id="dynamic-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a
                  class="nav-link sidebartoggler nav-icon-hover"
                  id="headerCollapse"
                  href="javascript:void(0)"
                >
                  <i class="ti ti-menu-2" style="z-index: 10"></i>
                </a>
              </li>
            </ul>
          </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
          <div class="card row">
            <form id="addUser" action="submit.php" class="p-4" onsubmit="return validateForm()"  method="post">
              <div class="col-md-11 mx-auto">
                <h3 class="pb-4"><strong>Vos informations</strong></h3>
              </div>
              <div class="col-md-9 mx-auto">
                <div class="mb-3 row">
                  <label for="addUserField" class="col-md-3 form-label"
                    >Nom</label
                  >
                  <div class="col-md-9">
                    <input
                      type="text"
                      class="form-control"
                      id="user_name"
                      name="user_name"
                    />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="addEmailField" class="col-md-3 form-label"
                    >Adresse</label
                  >
                  <div class="col-md-9">
                    <input
                      type="text"
                      class="form-control"
                      id="user_address"
                      name="user_address"
                    />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="addEmailField" class="col-md-3 form-label"
                    >Email</label
                  >
                  <div class="col-md-9">
                    <input
                      type="text"
                      class="form-control"
                      id="user_email"
                      name="user_email"
                    />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="addEmailField" class="col-md-3 form-label"
                    >Telephone</label
                  >
                  <div class="col-md-9">
                    <input
                      type="text"
                      class="form-control"
                      id="user_telephone"
                      name="user_telephone"
                    />
                  </div>
                </div>
              </div>
              <div class="col-md-11 mx-auto">
                <h3 class="py-4"><strong> Informations du client</strong></h3>
                </div>
                <div class="col-md-9 mx-auto">
                <div class="mb-3 row">
                  <label for="addUserField" class="col-md-3 form-label"
                    >Nom</label
                  >
                  <div class="col-md-9">
                    <input
                      type="text"
                      class="form-control"
                      id="client_name"
                      name="client_name"
                    />
                  </div>
                </div>

                <div class="mb-3 row">
                  <label for="addEmailField" class="col-md-3 form-label"
                    >Adresse</label
                  >
                  <div class="col-md-9">
                    <input
                      type="text"
                      class="form-control"
                      id="client_address"
                      name="client_address"
                    />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="addEmailField" class="col-md-3 form-label"
                    >Email</label
                  >
                  <div class="col-md-9">
                    <input
                      type="text"
                      class="form-control"
                      id="client_email"
                      name="client_email"
                    />
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="addEmailField" class="col-md-3 form-label"
                    >Telephone</label
                  >
                  <div class="col-md-9">
                    <input
                      type="text"
                      class="form-control"
                      id="client_telephone"
                      name="client_telephone"
                    />
                  </div>
                  </div>
                </div>
                <input
                  type="hidden"
                  class="form-control"
                  id="client_id"
                  name="client_id"
                />
                <input
                  type="hidden"
                  class="form-control"
                  id="vente_id"
                  name="vente_id"
                />
                <input
                  type="hidden"
                  class="form-control"
                  id="user_id"
                  name="user_id"
                />

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Next</button>
                </div>
              </div>
            </form>
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
    <script
      type="text/javascript"
      src="js/dt-1.10.25datatables.min.js"
    ></script>
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

      
      $(document).ready(function () {


  var urlParams = new URLSearchParams(window.location.search);
  var id = urlParams.get("id");

  $.ajax({
        url: "get_form_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#client_name').val(json.client_name);
          $('#client_address').val(json.client_address);
          $('#client_email').val(json.client_email);
          $('#client_telephone').val(json.client_telephone);
          $('#user_name').val(json.user_name);
          $('#user_address').val(json.user_address);
          $('#user_email').val(json.user_email);
          $('#user_telephone').val(json.user_telephone);
          $('#user_id').val(json.user_id);
          $('#client_id').val(json.client_id);
          $('#vente_id').val(json.vente_id);

        }
      });


  
 

 
});

     

      

      $(document).on("submit", "#updateDevice", function (e) {
        e.preventDefault();
        var designation = $("#designation").val();
        var prix = $("#prix").val();
        var quantite = $("#quantite").val();
        var trid = $("#trid").val();
        var id = $("#id").val();
        var vente_id = $("#vente_id").val();
        if (designation != "" && prix != "" && quantite != "") {
          $.ajax({
            url: "update_article.php",
            type: "post",
            data: {
              designation: designation,
              prix: prix,
              quantite: quantite,
              id: id,
              vente_id: vente_id,
            },
            success: function (data) {
              var json = JSON.parse(data);
              var status = json.status;
              if (status === "success") {
                var row = $("#row" + id);
                row.find(".designation").text(designation);
                row.find(".prix").text(prix + " DH");
                row.find(".quantite").text(quantite);
                $("#total" + vente_id).html("total: " + json.total + " DH");
                $("#button" + vente_id).html(
                  "Vente Numero #" + json.id + " total : " + json.total + " DH"
                );
                $("#exampleModal").modal("hide");
              } else {
                alert("failed");
              }
            },
          });
        } else {
          alert("Fill all the required fields");
        }
      });

      $(document).on("click", ".editbtn", function (event) {
        var id = $(this).data("id");
        var trid = $(this).closest("tr").attr("id");
        var vente_id = $(this).data("vente-id");
        $("#exampleModal").modal("show");

        $.ajax({
          url: "get_single_article.php",
          data: {
            id: id,
          },
          type: "post",
          success: function (data) {
            var json = JSON.parse(data);
            $("#designation").val(json.designation);
            $("#prix").val(json.prix);
            $("#quantite").val(json.quantite);
            $("#id").val(id);
            $("#trid").val(trid);
            $("#vente_id").val(vente_id);

          },
        });
      });
    </script>

   
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-alpha1/html2canvas.min.js"></script>
  <script>
    document
      .getElementById("downloadPdf")
      .addEventListener("click", function () {
        window.print();
        // // Clone the content element
        
      });
  </script>
  <script>
  function validateForm() {
  if (
    $('#user_name').val() !== '' &&
    $('#user_address').val() !== '' &&
    $('#user_email').val() !== '' &&
    $('#user_telephone').val() !== '' &&
    $('#client_name').val() !== '' &&
    $('#client_address').val() !== '' &&
    $('#client_email').val() !== '' &&
    $('#client_telephone').val() !== ''
  ) {
    // If all fields have values, the form will be submitted automatically
    return true; // Allow form submission
  } else {
    alert('Please fill in all required fields.');
    return false; // Prevent form submission
  }
}

</script>


</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dechet</title>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="dt-1.10.25datatables.min.js"></script>
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
    <style>
      /* Custom CSS for printing */
      @media print {
        .row {
          display: flex;
          justify-content: space-between;
        }
        .col-sm-6 {
          flex: 0 0 calc(50% - 20px); /* Adjust width as needed */
          padding-right: 20px; /* Add space between columns */
        }
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
          <div class="card">
            <button id="downloadPdf" type="button" class="btn btn-primary">
              Download PDF
            </button>

            <h1 class="text-center my-4"></h1>
            <div class="container-fluid">
              <div class="row">
                <div class="container">
                  <div class="row">
                    <div class="col-md-11 pb-4 mx-auto" id="update">
                      <div class="">
                        <div class="card" id="contentToConvert">
                          <div class="card-header p-3">
                            <div class="float-right">
                              <h3 class="mb-0" id="vente_id">Facture #BBB10234</h3>
                              <p id="date">Date: 12 Jun,2019</p>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row mb-4 p-4">
                              <table>
                                <tr>
                                  <td class="col-print">
                                    <h5 class="mb-3">From:</h5>
                                    <h3 class="text-dark mb-1" id="user_name">
                                      
                                    </h3>
                                    
                                    <div id="user_address">Sikeston, New Delhi 110034</div>
                                    <div id="user_email">Email: contact@bbbootstrap.com</div>
                                    <div id="user_telephone">Phone: +91 9897 989 989</div>
                                  </td>
                                  <td class="col-print">
                                    <h5 class="mb-3">To:</h5>
                                    <h3 class="text-dark mb-1" id="client_name"></h3>
                                    
                                    <div id="client_address">Chandni chowk, New Delhi, 110006</div>
                                    <div id="client_email">Email: info@tikon.com</div>
                                    <div>Phone: +91 9895 398 009</div>
                                  </td>
                                </tr>
                              </table>
                            </div>
                            <div class="table-responsive-sm">
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th class="center">#</th>
                                    
                                    <th>Designation</th>
                                    <th class="right">Prix</th>
                                    <th class="center">Quantite</th>
                                    <th class="right">Total</th>
                                  </tr>
                                </thead>
                                <tbody id="table-content">
                                  <tr>
                                    <td class="center">1</td>
                                    
                                    <td class="left">
                                      Iphone 10X with headphone
                                    </td>
                                    <td class="right">$1500</td>
                                    <td class="center">10</td>
                                    <td class="right">$15,000</td>
                                  </tr>
                                  <tr>
                                    <td class="center">2</td>
                                    
                                    <td class="left">
                                      Iphone 8X with extended warranty
                                    </td>
                                    <td class="right">$1200</td>
                                    <td class="center">10</td>
                                    <td class="right">$12,000</td>
                                  </tr>
                                  <tr>
                                    <td class="center">3</td>
                                    
                                    <td class="left">
                                      Samsung 4C with extended warranty
                                    </td>
                                    <td class="right">$800</td>
                                    <td class="center">10</td>
                                    <td class="right">$8000</td>
                                  </tr>
                                  <tr>
                                    <td class="center">4</td>
                                    
                                    <td class="left">
                                      Google prime with Amazon prime membership
                                    </td>
                                    <td class="right">$500</td>
                                    <td class="center">10</td>
                                    <td class="right">$5000</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="row">
                              <div class="col-lg-5 col-sm-5">
                                <!-- Your content here (if any) -->
                              </div>
                              <div class="col-lg-7 col-sm-7">
                                <!-- Updated class to allocate 8 columns -->
                                <table class="table table-clear">
                                  <tbody>
                                    
                                    <tr>
                                      <td class="left">
                                        <strong class="text-dark">Total</strong>
                                      </td>
                                      <td class="right">
                                        <strong class="text-dark" id="total"
                                          >$20,744,00</strong
                                        >
                                      </td>
                                    </tr>
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
        // Handle click event for "Delete this vente" links
        $(document).on("click", ".delete-vente", function (e) {
          e.preventDefault();
          var venteId = $(this).data("vente-id");

          // Ask for user confirmation
          var confirmDelete = confirm(
            "Are you sure you want to delete this vente?"
          );

          if (confirmDelete) {
            // Send AJAX request to delete_vente.php
            $.ajax({
              url: "delete_vente.php",
              type: "POST",
              data: { vente_id: venteId },
              success: function (response) {
                if (response === "Success") {
                  // Remove the corresponding accordion item from the div
                  var accordionItem = $(e.target).closest(".accordion-item");
                  accordionItem.remove();
                } else {
                  console.log(response); // Handle error
                }
              },
              error: function (xhr, status, error) {
                console.error(error);
              },
            });
          }
        });
      });

      $(document).ready(function () {
        // Handle click event for "Ajouter Article" links
        $(document).on("click", ".add-article", function (e) {
          e.preventDefault();
          var venteId = $(this).data("vente-id");

          // Set the venteId value in the hidden input field of the modal
          $("#venteIdInput").val(venteId);

          // Open the modal
          $("#addUserModal").modal("show");
        });

        // Handle form submission inside the modal
        $("#addUser").on("submit", function (e) {
          e.preventDefault();
          var designation = $("#designation_add").val();
          var prix = $("#prix_add").val();
          var quantite = $("#quantite_add").val();
          var venteId = $("#venteIdInput").val();

          // Send AJAX request to add_article.php
          if (designation != "" && prix != "" && quantite != "") {
            $.ajax({
              url: "add_article.php", // PHP script to add an article
              type: "POST",
              data: {
                vente_id: venteId, // Pass the vente ID to the PHP script
                designation: designation,
                prix: prix,
                quantite: quantite,
              },
              success: function (data) {
                // Update the accordion item with the new content
                var json = JSON.parse(data);

                var accordionItem = $("#accordion-item" + venteId);

                accordionItem
                  .find(".accordion-body")
                  .find(".table")
                  .find("tbody")
                  .prepend(json.content);
                accordionItem
                  .find(".accordion-header")
                  .find(".accordion-button")
                  .html(
                    "Vente Numero #" +
                      json.id +
                      " total : " +
                      json.total +
                      " DH"
                  );
                $("#total" + venteId).html("total: " + json.total + " DH");
                // Close the modal
                $("#addUserModal").modal("hide");
                $("#designation_add").val("");
                $("#prix_add").val("");
                $("#quantite_add").val("");
              },
              error: function (xhr, status, error) {
                console.error(error);
              },
            });
          } else {
            alert("Fill all the required fields");
          }
        });
      });

      
      $(document).ready(function () {


var urlParams = new URLSearchParams(window.location.search);
var id = urlParams.get("id");

$.ajax({
      url: "get_facture_data.php",
      data: {
        id: id
      },
      type: 'post',
      success: function(data) {
        var json = JSON.parse(data);
        $('#client_name').text(json.client_name);
        $('#user_name').text(json.user_name);
        $('#vente_id').text("Facture "+json.vente_id);
        $('#user_email').text("Email: "+json.user_email);
        $('#user_telephone').text("Telephone: " +json.user_telephone);
        $('#user_address').text(json.user_address);
        $('#client_email').text("Email: "+json.client_email);
        $('#client_telephone').text("Telephone: " +json.client_telephone);
        $('#client_address').text(json.client_address);
        $('#table-content').html(json.content);
        $('#date').text("Date : "+json.date);
        $('#total').text(json.total+" DH");
      }
    });






});
      

     
    </script>

    <!-- Add user Modal -->
    <div
      class="modal fade"
      id="addUserModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Article</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form id="addUser" action="">
              <div class="mb-3 row">
                <label for="addUserField" class="col-md-3 form-label"
                  >Designation</label
                >
                <div class="col-md-9">
                  <input
                    type="text"
                    class="form-control"
                    id="designation_add"
                    name="designation"
                  />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="addEmailField" class="col-md-3 form-label"
                  >Prix</label
                >
                <div class="col-md-9">
                  <input
                    type="text"
                    class="form-control"
                    id="prix_add"
                    name="prix"
                  />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="addUserField" class="col-md-3 form-label"
                  >Quantite</label
                >
                <div class="col-md-9">
                  <input
                    type="text"
                    class="form-control"
                    id="quantite_add"
                    name="quantite"
                  />
                </div>
              </div>
              <input
                type="hidden"
                class="form-control"
                id="venteIdInput"
                name="vente_id"
              />

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-alpha1/html2canvas.min.js"></script>
  <script>
    document
      .getElementById("downloadPdf")
      .addEventListener("click", function () {
        var content = document.getElementById("contentToConvert").innerHTML;

        // Create a link element to load the CSS file
        var cssLink = document.createElement("link");
        cssLink.rel = "stylesheet";
        cssLink.type = "text/css";
        cssLink.href = "./assets/css/styles.min.css";

        cssLink.onload = function () {
          // Once the CSS is loaded, open the print window
          var printWindow = window.open("", "", "width=600,height=600");
          printWindow.document.open();
          printWindow.document.write(
            '<html><head><link rel="stylesheet" type="text/css" href="./assets/css/styles.min.css"></head><body>' +
              content +
              "</body></html>"
          );
          printWindow.document.close();
          printWindow.print();
          printWindow.close();
        };

        // Append the link to the document to trigger loading
        document.head.appendChild(cssLink);
      });
  </script>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BillBox</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
  <style>
    .navbar-nav {
        position: relative;
        width: 140px;
      }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-nav" href="../index.php"><img src="../../images/logo.png" /></a>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../users/userlist.php"> User list </a></li>
                <li class="nav-item"> <a class="nav-link" href="../users/adduser.html"> Add user </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Bills</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="bill.php">New bill</a></li>
                <li class="nav-item"> <a class="nav-link" href="blist.php">Bill list</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bills" aria-expanded="false" aria-controls="icons">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Price</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="bills">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../price/price.php">Update Price</a></li>
                <li class="nav-item"> <a class="nav-link" href="../price/phistory.php">History</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Status</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../status/sover.php">Overview</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../status/status.php">Update</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-bio" aria-expanded="false" aria-controls="ui-bio">
              <i class="icon-check menu-icon"></i>
              <span class="menu-title">Biometrics</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-bio">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../bio/sign.php">Signature</a></li>
              </ul>
            </div>
          </li>
        </ul>
    </nav>
      <!-- partial -->
      <?php

        $conn = mysqli_connect("localhost", "root", "", "bio");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        $user = mysqli_num_rows($result);
        $sql = "SELECT * FROM bill";
        $result = $conn->query($sql);
        $bill = mysqli_num_rows($result);
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
             <div class="col-md-5 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Search by</p>
                      <a href="cbill.php" style="color:white">
                        <p class="fs-30 mb-2" >Customer</p>
                      </a>
                      <?php
                        echo "<p>Out of " .$user. " Customers</p>";
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Search by</p>
                      <a href="bnlist.php" style="color:white">
                        <p class="fs-30 mb-2">Bill No</p>
                      </a>
                      <?php
                        echo "<p>Out of " .$bill. " Bills</p>";
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Search by</p>
                      <a href="bstatus.php" style="color:white">
                        <p class="fs-30 mb-2">Status</p>
                      </a>
                      <p>Out of 4 status</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Get all</p>
                      <a href="allbill.php" style="color:white">
                        <p class="fs-30 mb-2">Bills</p>
                      </a>
                      <?php
                        echo "<p>All " .$bill. " Bills</p>";
                      ?>
                    </div>
                  </div>
                </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

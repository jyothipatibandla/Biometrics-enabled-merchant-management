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
  <link rel="stylesheet" href="../../css/payment.css">
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
        <a class="navbar-nav" href="index.html"><img src="../../images/logo.png" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown"></li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <i class="icon-ellipsis"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.html">
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
                <li class="nav-item"> <a class="nav-link" href="price.php">Update Price</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">History</a></li>
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
                  <li class="nav-item"> <a class="nav-link" href="#">Overview</a></li>
                  <li class="nav-item"> <a class="nav-link" href="#">Update</a></li>
                </ul>
              </div>
            </li>
        </ul>
    </nav>

      <?php

        $conn = mysqli_connect("localhost", "root", "", "bio");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM price ORDER BY pid DESC LIMIT 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $i1 = number_format((float)$row["i1"], 2, '.', '');
        $i2 = number_format((float)$row["i2"], 2, '.', '');
        $i3 = number_format((float)$row["i3"], 2, '.', '');
        $i4 = number_format((float)$row["i4"], 2, '.', '');

      ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="container mt-5 mb-5">
                      <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8 col-md-7">
                          <div class="border border-gainsboro p-3">
                            <h2 class="h6 text-uppercase mb-0">Bill Total: <strong class="cart-total">00.00</strong></h2>
                          </div>
                          <form class="forms-sample" action="billfetch.php" method="POST">
                          <!-- 1 -->
                          <div class="border border-gainsboro p-3 mt-3 clearfix item">
                            <div class="text-lg-left">
                              <i class="fa fa-ticket fa-2x text-center" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-5 col-5 text-lg-left">
                              <h3 class="h6 mb-0">P1<br>
                              <?php
                                echo "<small>Cost: Rs.". $i1 ."/kg</small>";
                              ?>
                              </h3>
                            </div>
                            <?php
                              echo "<div class='product-price d-flex'>  $i1 </div>";
                            ?>
                            <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
                              <label for="pass-quantity" class="pass-quantity">Quantity</label>
                              <input class="form-control" type="number" name="i1" id="i1" value="0" min="0" max="500">
                            </div>
                            <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
                              <span class="product-line-price">00.00
                              </span>
                            </div>
                          </div>
                          
                          <!-- 2 -->
                          <div class="border border-gainsboro p-3 mt-3 clearfix item">
                            <div class="text-lg-left">
                              <i class="fa fa-ticket fa-2x text-center" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-5 col-5 text-lg-left">
                              <h3 class="h6 mb-0">P2<br>
                              <?php
                                echo "<small>Cost: Rs.". $i2 ."/kg</small>";
                              ?>
                            </div>
                            <?php
                              echo "<div class='product-price d-flex'>  $i2 </div>";
                            ?>
                            <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
                              <label for="pass-quantity" class="pass-quantity">Quantity</label>
                              <input type="number" class="form-control" name="i2" id="i2"  value="0" min="0" max="500">
                            </div>
                            <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
                              <span class="product-line-price">00.00</span>
                            </div>
                          </div>

                          <!-- 3 -->
                          <div class="border border-gainsboro p-3 mt-3 clearfix item">
                            <div class="text-lg-left">
                              <i class="fa fa-ticket fa-2x text-center" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-5 col-5 text-lg-left">
                              <h3 class="h6 mb-0">P3<br>
                              <?php
                                echo "<small>Cost: Rs.". $i3 ."/kg</small>";
                              ?>
                            </div>
                              <?php
                                echo "<div class='product-price d-flex'>  $i3 </div>";
                              ?>
                            <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
                              <label for="pass-quantity" class="pass-quantity">Quantity</label>
                              <input type="number" class="form-control"  name="i3" id="i3" value="0" min="0" max="500">
                            </div>
                            <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
                              <span class="product-line-price">00.00</span>
                            </div>
                          </div>

                          <!-- 4 -->
                          <div class="border border-gainsboro p-3 mt-3 clearfix item">
                            <div class="text-lg-left">
                              <i class="fa fa-ticket fa-2x text-center" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-5 col-5 text-lg-left">
                              <h3 class="h6 mb-0">P4<br>
                              <?php
                                echo "<small>Cost: Rs.". $i4 ."/kg</small>";
                              ?>
                            </div>
                            <?php
                              echo "<div class='product-price d-flex'>  $i4 </div>";
                            ?>
                            <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
                              <label for="pass-quantity" class="pass-quantity">Quantity</label>
                              <input type="number" class="form-control"  name="i4" id="i4" value="0" min="0" max="500">
                            </div>
                            <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
                              <span class="product-line-price">00.00</span>
                            </div>
                          </div>
                    <!-- item -->
                  </div>
                    <div class="col-xl-3 col-lg-4 col-md-5 totals">
                      <div class="border border-gainsboro px-3">
                        <div class="border-bottom border-gainsboro">
                          <p class="text-uppercase mb-0 py-3"><strong>Order Summary</strong></p>
                        </div>
                        <div class="totals-item d-flex align-items-center justify-content-between mt-3">
                          <p class="text-uppercase">Subtotal</p>
                          <p class="totals-value" id="cart-subtotal">00.00</p>
                        </div>
                        <div class="totals-item d-flex align-items-center justify-content-between">
                          <p class="text-uppercase">Estimated Tax</p>
                          <p class="totals-value" id="cart-tax">00.00</p>
                        </div>
                        <div class="totals-item d-flex align-items-center justify-content-between">
                          <p class="text-uppercase">Charges</p>
                          <p class="totals-value" id="cart-comm">00.00</p>
                        </div>
                        <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-gainsboro">
                          <p class="text-uppercase"><strong>Total</strong></p>
                          <p class="totals-value font-weight-bold cart-total">00.00</p>
                        </div>
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" id="del" name="del" value="True">
                          Deliver the bill
                        </label>
                      </div>
                      <button type="submit" class="mt-3 btn btn-primary w-100 justify-content-between btn-lg rounded-1">Submit</button>
                    </div>
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
  <script src="../../js/payment.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

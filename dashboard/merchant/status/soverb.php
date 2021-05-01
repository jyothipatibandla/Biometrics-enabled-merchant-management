<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    session_start();
  ?>
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
                <li class="nav-item"> <a class="nav-link" href="../bills/bill.php">New bill</a></li>
                <li class="nav-item"> <a class="nav-link" href="../bills/blist.php">Bill list</a></li>
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
                  <li class="nav-item"> <a class="nav-link" href="sover.php">Overview</a></li>
                  <li class="nav-item"> <a class="nav-link" href="status.php">Update</a></li>
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
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">            
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Status Overview</h3>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>  
                          <th>Bill No</th>
                          <th>Date</th>
                          <th>ID</th>
                          <th>Bill status</th>
                          <th>Payment status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $bno = $_POST['bno'];
                        $conn = mysqli_connect("localhost", "root", "", "bio");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT * FROM bill where bno='$bno'";
                        $result = $conn->query($sql);

                        if ($result && $result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $i = $row["bno"];
                            $sql1 = "SELECT * FROM status where bno='$i'";
                            $result1 = $conn->query($sql1);
                            $row1 = $result1->fetch_assoc();

                            $bs = $row1["bill"];
                            $ps = $row1["pay"];

                            if($bs == "ip"){
                                $bo = '<p class="text-warning">In progress</p>';
                            }
                            if($bs == "dl"){
                                $bo = '<p class="text-info">Delivered</p>';
                            }
                            if($ps == "up"){
                                $po = '<p class="text-danger">Pending</p>';
                            }
                            if($ps == "p"){
                                $po = '<p class="text-success">Paid</p>';
                            }
                            echo "<tr><td><label class='badge badge-success'>" . $row["bno"]. "</label></td><td>" . $row["date"]. "</td><td>" . $row["id"] . "</td><td>".$bo."</td><td>".$po."</td></label></tr>";
                        }
                        } else { 
                            $m = "Bill does not exist";
                            $l = "sover.php";
                            $t = "error";
                            pop($l,$m,$t); 
                        }
                        $conn->close();
                        function pop ($l,$m,$t){
                            echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
                            echo '<script src="../../js/sweetalert2.all.min.js"></script>';
                            echo '<script type="text/javascript">';
                            echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
                            echo '},100);</script>';
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-md-offset-3">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Search Bill no</h4>
                  <form class="forms-sample" action="soverb.php" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control" name="bno" id="bno" placeholder="Bill no">
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-fw">Search</button>
                    <a class="btn btn-outline-danger btn-fw" href="sover.php" role="button">Overview</a>
                  </form>
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


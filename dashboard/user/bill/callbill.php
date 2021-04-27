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
      <!-- partial:../../partials/_sidebar.html -->
      <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="../cindex.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Search bill</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="cnlist.php">By number</a></li>
                <li class="nav-item"> <a class="nav-link" href="bcstatus.php">By status</a></li>
                <li class="nav-item"> <a class="nav-link" href="callbill.php">All bills</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../status/scover.php">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Status</span>
            </a>
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
                <form name="myform" action="callbill1.php" method="POST">
                  <h3 class="card-title">Bill generation</h3>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>  
                          <th></th>
                          <th>Bill No</th>
                          <th>Date</th>
                          <th>Time</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $id = $_SESSION['id'];
                        $conn = mysqli_connect("localhost", "root", "", "bio");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $flag = 0;
                        $sql = "SELECT * FROM bill where id='$id'";
                        $result = $conn->query($sql);
                        if ($result && $result->num_rows > 0){
                        // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $i = $row["bno"];
                                $sql1 = "SELECT * FROM status where bno='$i'";
                                $result1 = $conn->query($sql1);
                                if($result1 && $result1->num_rows > 0){
                                    $row1 = $result1->fetch_assoc();
                                    if($row1["bill"] == 'dl'){
                                        echo "<tr><label class='form-check-success'><td><input type='radio' class='form-check-success' name='bill' id='$i' value='$i'></td><td><label class='badge badge-success'>" . $row["bno"]. "</label></td><td>" . $row["date"]. "</td><td>" . $row["time"] . "</td><td></label></tr>";
                                        $flag = $flag+1;
                                    }
                                }
                            }
                        }
                        else { 
                            $m = "No bills";
                            $l = "../cindex.html";
                            $t = "error";
                            pop($l,$m,$t); 
                        }
                        if($flag == 0){
                            $m = "No bills";
                            $l = "../cindex.html";
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
                    <button type="submit" class="btn btn-primary mr-2">Generate</button>
                    </form>
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
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <script src="../../js/typeahead.js"></script>
  <script src="../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <script>
    function printPageArea(areaID){
      var printContents = document.getElementById(areaID).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>
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
  <link rel="stylesheet" href="../../style.css">
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
        $bno = $_SESSION['bno'];
        $conn = mysqli_connect("localhost", "root", "", "bio");
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM bill where bno = '$bno'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $date = $row["date"];
          $time = $row["time"];
          $id = $row["id"];

          $i1 = $row["i1"];
          $ip1 = $row["ip1"];
          $t1 = $i1*$ip1;

          $i2 = $row["i2"];
          $ip2= $row["ip2"];
          $t2 = $i2*$ip2;

          $i3 = $row["i3"];
          $ip3 = $row["ip3"];
          $t3 = $i3*$ip3;

          $i4 = $row["i4"];
          $ip4 = $row["ip4"];
          $t4 = $i4*$ip4;

          $st = $t1+$t2+$t3+$t4;

          $trate = 0.05;
          $tax = $st*$trate;

          $crate = 0.01;
          $com = $st*$crate;

          $tot = $st+$tax+$com;
        }
        $sql = "SELECT * FROM users where id = '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $name = $row["name"];
          $place = $row["place"];
        }
        $sql = "SELECT * FROM status where bno = '$bno'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $bs = $row["bill"];
          $ps = $row["pay"];
          $us = $row["user"];
        }

        if($ps == "up"){
          $pstatus = '<span class="badge badge-warning badge-pill px-25">Unpaid</span>';
        }
        elseif($ps == "p"){
          $pstatus = '<span class="badge badge-success badge-pill px-25">Paid</span>';
        }
        if($bs == "ip"){
          $bstatus = '<span class="badge badge-danger badge-pill px-25">In progress</span>';
        }
        elseif($bs == "dl"){
          $bstatus = '<span class="badge badge-success badge-pill px-25">Delivered</span>';
        }
        if($us == "ur"){
          $ustatus = '<span class="badge badge-warning badge-pill px-25">Un reviewed</span>';
        }
        elseif($us == "r"){
          $ustatus = '<span class="badge badge-success badge-pill px-25">Reviewed</span>';
        }
      ?>
      <div class="main-panel">
      <div class="content-wrapper">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <div class="page-content container">
        <div id="printableArea">

            <div class="page-header text-blue-d2">
                <h1 class="page-title text-secondary-d1">
                    Invoice no :
                    <small class="page-info">
                        <?php
                          echo "#".$id."-".$bno;
                        ?>
                    </small>
                </h1>

                <div class="page-tools">
                    <div class="action-buttons">
                        <a class="btn bg-white btn-light mx-1px text-95" href="sign.php" data-title="Print">
                            <i class="mr-1 fa fa-check text-success-m1 text-120 w-2"></i>
                            Verify
                        </a>
                        <a class="btn bg-white btn-light mx-1px text-95" href="javascript:void(0);" onclick="printPageArea('printableArea')" data-title="Print">
                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                            Print
                        </a>
                    </div>
                </div>
            </div>

            <div class="container px-0">
                <div class="row mt-4">
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center text-150">
                                <img src="../../images/logo.png" width=210px>
                                </div>
                            </div>
                        </div>
                        <!-- .row -->

                        <hr class="row brc-default-l1 mx-n1 mb-4" />

                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <span class="text-sm text-grey-m5 align-middle">To:</span>
                                    <span class="text-600 text-110 text-blue align-middle">
                                      <?php
                                          echo $name.",";
                                      ?>
                                    </span>
                                    <span class="text-600 text-110 text-grey-m2 align-middle">
                                      <?php
                                          echo $place;
                                      ?>
                                    </span>
                                </div>
                                <div class="text-grey-m2">
                                    <div class="my-1">
                                    </div>
                                    <div class="my-1">

                                  <div class="my-2">
                                    <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> 
                                    <span class="text-600 text-90">Date:</span>
                                    <?php
                                      echo $date;
                                    ?>
                                    </div>
                                      
                                  <div class="my-2">
                                  <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> 
                                  <span class="text-600 text-90">Time:</span>
                                  <?php
                                      echo $time;
                                  ?>
                                  </div>                                       
                                    </div>
                                    <div class="my-1"><b class="text-600"></b></div>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Details:
                                    </div>
                                    <div class="my-2">
                                      <i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> 
                                      <span class="text-600 text-90">Invoice no:</span> 
                                        <?php
                                          echo "#".$id."-".$bno;
                                        ?>
                                    </div>
                                    <?php
                                      echo '<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status: </span><span>'.$bstatus.'</span> <span>'.$pstatus.'</span></div>';
                                    ?>
                              </div>
                            </div>
                            <!-- /.col -->
                        </div>

                        <div class="mt-4">
                            <div class="row text-600 text-white bgc-default-tp1 py-25">
                                <div class="d-none d-sm-block col-1">#</div>
                                <div class="col-9 col-sm-5">Description</div>
                                <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                                <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                                <div class="col-2">Amount</div>
                            </div>

                            <div class="text-95 text-secondary-d3">
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">1</div>
                                    <div class="col-9 col-sm-5">P1</div>
                                    <div class="d-none d-sm-block col-2">
                                      <?php
                                        echo $i1;
                                      ?>
                                    </div>
                                    <div class="d-none d-sm-block col-2 text-95">
                                      <?php
                                        echo "Rs.".$ip1;
                                      ?>
                                    </div>
                                    <div class="col-2 text-secondary-d2">
                                      <?php
                                        echo "Rs.".$t1;
                                      ?>
                                    </div>
                                </div>

                                <div class="text-95 text-secondary-d3">
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">2</div>
                                    <div class="col-9 col-sm-5">P2</div>
                                    <div class="d-none d-sm-block col-2">
                                      <?php
                                        echo $i2;
                                      ?>
                                    </div>
                                    <div class="d-none d-sm-block col-2 text-95">
                                      <?php
                                        echo "Rs.".$ip2;
                                      ?>
                                    </div>
                                    <div class="col-2 text-secondary-d2">
                                      <?php
                                        echo "Rs.".$t2;
                                      ?>
                                    </div>
                                </div>

                                <div class="text-95 text-secondary-d3">
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">3</div>
                                    <div class="col-9 col-sm-5">P3</div>
                                    <div class="d-none d-sm-block col-2">
                                      <?php
                                        echo $i3;
                                      ?>
                                    </div>
                                    <div class="d-none d-sm-block col-2 text-95">
                                      <?php
                                        echo "Rs.".$ip3;
                                      ?>
                                    </div>
                                    <div class="col-2 text-secondary-d2">
                                      <?php
                                        echo "Rs.".$t3;
                                      ?>
                                    </div>
                                </div>

                                <div class="text-95 text-secondary-d3">
                                <div class="row mb-2 mb-sm-0 py-25">
                                    <div class="d-none d-sm-block col-1">4</div>
                                    <div class="col-9 col-sm-5">P4</div>
                                    <div class="d-none d-sm-block col-2">
                                      <?php
                                        echo $i4;
                                      ?>
                                    </div>
                                    <div class="d-none d-sm-block col-2 text-95">
                                      <?php
                                        echo "Rs.".$ip4;
                                      ?>
                                    </div>
                                    <div class="col-2 text-secondary-d2">
                                      <?php
                                        echo "Rs.".$t4;
                                      ?>
                                    </div>
                                </div>

                            <div class="row border-b-2 brc-default-l2"></div>

                            <!-- or use a table instead -->
                            <!--
                    <div class="table-responsive">
                        <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                            <thead class="bg-none bgc-default-tp1">
                                <tr class="text-white">
                                    <th class="opacity-2">#</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th width="140">Amount</th>
                                </tr>
                            </thead>

                            <tbody class="text-95 text-secondary-d3">
                                <tr></tr>
                                <tr>
                                    <td>1</td>
                                    <td>Domain registration</td>
                                    <td>2</td>
                                    <td class="text-95">$10</td>
                                    <td class="text-secondary-d2">$20</td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    -->

                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    
                                </div>

                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1">
                                              <?php
                                                echo "Rs.".$st;
                                              ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            Tax (5%)
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1">
                                              <?php
                                                echo "Rs.".$tax;
                                              ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            Charges (1%)
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1">
                                              <?php
                                                echo "Rs.".$com;
                                              ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2">
                                              <?php
                                                echo "Rs.".$tot;
                                              ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div>
                                
                            </div>
                        </div>
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

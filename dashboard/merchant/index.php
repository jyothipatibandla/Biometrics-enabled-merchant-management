<!DOCTYPE html>
<html lang="en">

<head>
<script src="../js/jquery-3.6.0.min.js"></script>
<?php
$conn = mysqli_connect("localhost", "root", "", "bio");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$i1 = 0;
$i2 = 0;
$i3 = 0;
$i4 = 0;
$sql = "SELECT * FROM bill";
$result = $conn->query($sql);
$btotal = mysqli_num_rows($result);
if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
    $i1 = $i1+$row['i1'];
    $i2 = $i2+$row['i2'];
    $i3 = $i3+$row['i3'];
    $i4 = $i4+$row['i4'];
  }
}
?>
<script>
(function($) {
  'use strict';
  $(function() {
    if ($("#north-america-chart").length) {
      var i1 = "<?php echo $i1; ?>";
      var i2 = "<?php echo $i2; ?>";
      var i3 = "<?php echo $i3; ?>";
      var i4 = "<?php echo $i4; ?>";
      var areaData = {
        labels: ["P1", "P2", "P4", "P3"],
        datasets: [{
            data: [i1,i2,i4,i3],
            backgroundColor: [
               "#4B49AC","#FFC100", "#248AFD", "#FF3512",
            ],
            borderColor: "rgba(0,0,0,0)"
          }
        ]
      };
      var areaOptions = {
        responsive: true,
        maintainAspectRatio: true,
        segmentShowStroke: false,
        cutoutPercentage: 78,
        elements: {
          arc: {
              borderWidth: 4
          }
        },      
        legend: {
          display: false
        },
        tooltips: {
          enabled: true
        },
        legendCallback: function(chart) { 
          var text = [];
          text.push('<div class="report-chart">');
            text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[0] + '"></div><p class="mb-0">Product 1</p></div>');
            text.push('<p class="mb-0">'+i1+'</p>');
            text.push('</div>');
            text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[1] + '"></div><p class="mb-0">Product 2</p></div>');
            text.push('<p class="mb-0">'+i2+'</p>');
            text.push('</div>');
            text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[3] + '"></div><p class="mb-0">Product 3</p></div>');
            text.push('<p class="mb-0">'+i3+'</p>');
            text.push('</div>');
            text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0">Product 4</p></div>');
            text.push('<p class="mb-0">'+i4+'</p>');
            text.push('</div>');
          text.push('</div>');
          return text.join("");
        },
      }
      var northAmericaChartPlugins = {
        beforeDraw: function(chart) {
          var width = chart.chart.width,
              height = chart.chart.height,
              ctx = chart.chart.ctx;
      
          ctx.restore();
          var fontSize = 3.125;
          ctx.font = "500 " + fontSize + "em sans-serif";
          ctx.textBaseline = "middle";
          ctx.fillStyle = "#13381B";
      
          var text = "",
              textX = Math.round((width - ctx.measureText(text).width) / 2),
              textY = height / 2;
      
          ctx.fillText(text, textX, textY);
          ctx.save();
        }
      }
      var northAmericaChartCanvas = $("#north-america-chart").get(0).getContext("2d");
      var northAmericaChart = new Chart(northAmericaChartCanvas, {
        type: 'doughnut',
        data: areaData,
        options: areaOptions,
        plugins: northAmericaChartPlugins
      });
      document.getElementById('north-america-legend').innerHTML = northAmericaChart.generateLegend();
    }
  });
})(jQuery);
</script>
  <?php
    session_start();
  ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BillBox</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../path-to/node_modules/mdi/css/materialdesignicons.min.css"/>
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="../text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <style>
    .navbar-nav {
        position: relative;
        width: 110px;
      }
  </style>
  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-nav" href="index.html"><img src="../images/logo.png" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../images/logo-mini.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            </a>
          </li>
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
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
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
                <li class="nav-item"> <a class="nav-link" href="users/userlist.php">User list</a></li>
                <li class="nav-item"> <a class="nav-link" href="users/adduser.html">Add user</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#bill" aria-expanded="false" aria-controls="bill">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Bills</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="bill">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="bills/bill.php">New bill</a></li>
                  <li class="nav-item"> <a class="nav-link" href="bills/blist.php">Bill list</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Price</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="price/price.php">Update Price</a></li>
                <li class="nav-item"> <a class="nav-link" href="price/phistory.php">History</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="status/sover.php">Overview</a></li>
                <li class="nav-item"> <a class="nav-link" href="status/status.php">Update</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="bio/sign.php">Signature</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <?php
        $email = $_SESSION['email'];
        $conn = mysqli_connect("localhost", "root", "", "bio");
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM register WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
            $name = $row["name"];
          }
        }
      ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <?php
                    echo '<h3 class="font-weight-bold">Welcome '.$name.'</h3>';
                  ?>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?php
                      $d1 = date(DATE_RFC822);
                      $d = substr($d1,5,9); 
                      echo '<i class="mdi mdi-calendar"></i>'.$d;
                    ?>
                    </button>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="../images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                      <?php
                        $jsonurl = "http://api.openweathermap.org/data/2.5/weather?q=Coimbatore&appid=62345d32f970f82d300636cbb637c9fa";
                        $json = file_get_contents($jsonurl);

                        $weather = json_decode($json);
                        $kelvin = $weather->main->temp;
                        $celcius = $kelvin - 273.15;

                        echo '<h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>'.$celcius.'<sup>C</sup></h2>';
                      ?>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Coimbatore</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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

              $date = date('d-m-y');
              $today = 0;
              $sql = "SELECT * FROM bill where date='$date'";
              $result = $conn->query($sql);
              $btotal = mysqli_num_rows($result);
              if ($result->num_rows > 0) {
              // output data of each row
                while($row = $result->fetch_assoc()) {
                  $today = $today+1;
                }
              }
              $bdiv = ($today/$bill);
              $bper = number_format( $bdiv * 100, 2 );

              $i1 = 0;
              $i2 = 0;
              $i3 = 0;
              $i4 = 0;
              $sql = "SELECT * FROM bill";
              $result = $conn->query($sql);
              $btotal = mysqli_num_rows($result);
              if ($result->num_rows > 0) {
              // output data of each row
                while($row = $result->fetch_assoc()) {
                  $i1 = $i1+$row['i1'];
                  $i2 = $i2+$row['i2'];
                  $i3 = $i3+$row['i3'];
                  $i4 = $i4+$row['i4'];
                }
              }
              $max = max($i1,$i2,$i3,$i4);
              if($i1 == $max){
                $high = 'Product 1';
              }
              if($i2 == $max){
                $high = 'Product 2';
              }
              if($i3 == $max){
                $high = 'Product 3';
              }
              if($i4 == $max){
                $high = 'Product 4';
              }
              $total = $i1+$i2+$i3+$i4;
              $pdiv = $max/$total;
              $pper = number_format( $pdiv * 100, 2 );
            ?>

            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Today’s Bills</p>
                      <?php
                        echo '<p class="fs-30 mb-2">'.$today.'</p>';
                        echo '<p>'.$bper.'% (of total bills)</p>';
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Most selling product</p>
                      <?php
                        echo '<p class="fs-30 mb-2">'.$high.'</p>';
                        echo '<p>'.$pper.'% (of total products)</p>';
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Customers</p>
                      <?php
                        echo '<p class="fs-30 mb-2">'.$user.'</p>';
                      ?>
                      <p>In TamilNadu</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Overall</p>
                      <?php
                        echo '<p class="fs-30 mb-2">'.$bill.'</p>';
                      ?>
                      <p>Bills generated so far</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            $i1 = 0;
            $i2 = 0;
            $i3 = 0;
            $i4 = 0;
            $sql = "SELECT * FROM bill";
            $result = $conn->query($sql);
            $btotal = mysqli_num_rows($result);
            if ($result->num_rows > 0) {
            // output data of each row
              while($row = $result->fetch_assoc()) {
                $i1 = $i1+($row['i1']*$row['ip1']);
                $i2 = $i2+($row['i2']*$row['ip2']);
                $i3 = $i3+($row['i3']*$row['ip3']);
                $i4 = $i4+($row['i4']*$row['ip4']);
              }
            }
            $torder = $i1+$i2+$i3+$i4;
            if($torder>1000){
              $torder = number_format( $torder/1000, 1);
              $torder = $torder.'k';
            }
            $sql = "SELECT * FROM price ORDER BY pid DESC LIMIT 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $p1 = $row['i1'];
                $p2 = $row['i2'];
                $p3 = $row['i3'];
                $p4 = $row['i4'];

                $ptotal = $p1+$p2+$p3+$p4;
                $per1 = ($p1/$ptotal)*100;
                $per2 = ($p2/$ptotal)*100;
                $per3 = ($p3/$ptotal)*100;
                $per4 = ($p4/$ptotal)*100;
              }
            }
          ?>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Detailed Report</p>
                            <br>
                            <?php
                              echo '<h1 class="text-primary">Rs. '.$torder.'</h1>';
                            ?>
                            <br>
                              <p class="mb-2 mb-xl-0">The detailed report contains the gross value of all the bills, along with the current price of individual products. The following pie chart visualises the individual sales value inclusive of all the bills</p>
                            </div>  
                            </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                    <br>
                                    <br>
                                    <tr>
                                      <td class="text-muted">Product 1</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <?php
                                            echo '<div class="progress-bar bg-primary" role="progressbar" style="width: '.$per1.'%" aria-valuenow="'.$per1.'" aria-valuemin="0" aria-valuemax="100"></div>';
                                          ?>
                                        </div>
                                      </td>
                                      <?php
                                        echo '<td><h5 class="font-weight-bold mb-0">Rs.'.$p1.'</h5></td>';
                                      ?>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Product 2</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                        <?php
                                            echo '<div class="progress-bar bg-warning" role="progressbar" style="width: '.$per2.'%" aria-valuenow="'.$per2.'" aria-valuemin="0" aria-valuemax="100"></div>';
                                          ?>                                        
                                          </div>
                                      </td>
                                      <?php
                                        echo '<td><h5 class="font-weight-bold mb-0">Rs.'.$p2.'</h5></td>';
                                      ?>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Product 3</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                        <?php
                                            echo '<div class="progress-bar bg-danger" role="progressbar" style="width: '.$per3.'%" aria-valuenow="'.$per3.'" aria-valuemin="0" aria-valuemax="100"></div>';
                                          ?>                                        
                                          </div>
                                      </td>
                                      <?php
                                        echo '<td><h5 class="font-weight-bold mb-0">Rs.'.$p3.'</h5></td>';
                                      ?>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Product 4</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                        <?php
                                            echo '<div class="progress-bar bg-info" role="progressbar" style="width: '.$per4.'%" aria-valuenow="'.$per4.'" aria-valuemin="0" aria-valuemax="100"></div>';
                                          ?>                                        
                                          </div>
                                      </td>
                                      <?php
                                        echo '<td><h5 class="font-weight-bold mb-0">Rs.'.$p4.'</h5></td>';
                                      ?>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                              <div class="col-md-6 mt-3">
                                <canvas id="north-america-chart"></canvas>
                                <div id="north-america-legend"></div>
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
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>


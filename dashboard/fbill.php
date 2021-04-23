<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    session_start();
  ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="style.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="../../adduser.html"><img src="images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../adduser.html"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
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
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="../../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
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
                <li class="nav-item"> <a class="nav-link" href="userlist.php"> User list </a></li>
                <li class="nav-item"> <a class="nav-link" href="adduser.html"> Add user </a></li>
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

      ?>
      
      <div class="content-wrapper">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <div class="page-content container">
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
                        <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
                            <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                            Print
                        </a>
                        <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                            <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                            Export
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
                                    
                                    <span class="text-default-d3">BillBox</span>
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

                                    

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div>
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
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>

  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript"></script>
  <!-- End custom js for this page-->
</body>

</html>

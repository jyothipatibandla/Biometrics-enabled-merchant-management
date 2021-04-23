<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="stylesheet" href="css/payment.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
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
            <a class="nav-link" data-toggle="collapse" href="#bills" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Bills</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="bills">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="bill.php">New bill</a></li>
                <li class="nav-item"> <a class="nav-link" href="blist.php">Bill list</a></li>
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
                <li class="nav-item"> <a class="nav-link" href="price.php">Update Price</a></li>
                <li class="nav-item"> <a class="nav-link" href="phistory.php">History</a></li>
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
                          <form class="forms-sample" action="../login/php/billfetch.php" method="POST">
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
                      <button type="submit" class="mt-3 btn btn-pay w-100 justify-content-between btn-lg rounded-0">Submit</button>
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
  <script src="js/payment.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/file-upload.js"></script>
  <script src="js/typeahead.js"></script>
  <script src="js/select2.js"></script>
  <!-- End custom js for this page-->
</body>
</html>
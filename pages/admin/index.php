<?php include("../../api/controller/adminController.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tanala | Admin Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/css/font-awesome/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/css/aether.tech.css">
  <link rel="stylesheet" href="../../assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" >
  <link rel="stylesheet" href="../../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="../../assets/plugins/summernote/summernote-bs4.css" >
  <link rel="stylesheet" href="../../assets/plugins/sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="../../assets/plugins/image-uploader/image-uploader.min.css">
  <link rel="stylesheet" href="../../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <?php if($uri == '/pages/admin/index.php?page=pck-mgmt'): ?>
    <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <?php endif; ?>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
  #map {
    height: 100%;
    width: 100%
  }
  .pull-left{
    float: left !important;
  }

.boxes {
    height: 32px;
    width: 32px;
    position: absolute;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    top: 50%;
    right: 50%;
    z-index: 9999;
    margin-top: 32px;
    -webkit-transform: rotateX(60deg) rotateZ(45deg) rotateY(0deg) translateZ(0px);
    transform: rotateX(60deg) rotateZ(45deg) rotateY(0deg) translateZ(0px);
}
.boxes .box {
    width: 32px;
    height: 32px;
    top: 0px;
    left: 0;
    position: absolute;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
}



.boxes .box:nth-child(1) {
    -webkit-transform: translate(100%, 0);
    transform: translate(100%, 0);
    -webkit-animation: box1 1s linear infinite;
    animation: box1 1s linear infinite;
}
.boxes .box:nth-child(2) {
    -webkit-transform: translate(0, 100%);
    transform: translate(0, 100%);
    -webkit-animation: box2 1s linear infinite;
    animation: box2 1s linear infinite;
}
.boxes .box:nth-child(3) {
    -webkit-transform: translate(100%, 100%);
    transform: translate(100%, 100%);
    -webkit-animation: box3 1s linear infinite;
    animation: box3 1s linear infinite;
}
.boxes .box:nth-child(4) {
    -webkit-transform: translate(200%, 0);
    transform: translate(200%, 0);
    -webkit-animation: box4 1s linear infinite;
    animation: box4 1s linear infinite;
}

.loading{
  background-color: rgba(0,0,0,0.6);
  height: 100%;
  width: 100%;
  z-index: 9999;
  position: fixed;
  top: 0;
  right: 0;
  
}

.boxes .box > div {
    background: #5C8DF6;
    --translateZ: 15.5px;
    --rotateY: 0deg;
    --rotateX: 0deg;
    position: absolute;
    width: 100%;
    height: 100%;
    background: #5C8DF6;
    top: auto;
    right: auto;
    bottom: auto;
    left: auto;
    -webkit-transform: rotateY(var(--rotateY)) rotateX(var(--rotateX)) translateZ(var(--translateZ));
    transform: rotateY(var(--rotateY)) rotateX(var(--rotateX)) translateZ(var(--translateZ));
}

.boxes .box > div:nth-child(1) {
    top: 0;
    left: 0;
    background: #5C8DF6;
}
.boxes .box > div:nth-child(2) {
    background: #145af2;
    right: 0;
    --rotateY: 90deg;
}
.boxes .box > div:nth-child(3) {
    background: #447cf5;
    --rotateX: -90deg;
}
.boxes .box > div:nth-child(4) {
    background: #DBE3F4;
    top: 0;
    left: 0;
    --translateZ: -90px;
}





@keyframes box1 {
    0%,
    50% {
        transform: translate(100%, 0);
    }
    100% {
        transform: translate(200%, 0);
    }
}

@keyframes box2 {
    0%{
        transform: translate(0, 100%);
    }
    50% {
        transform: translate(0, 0);
    }
    100% {
        transform: translate(100%, 0);
    }
}

@keyframes box3 {
    0%,
    50% {
        transform: translate(100%, 100%);
    }
    100% {
        transform: translate(0, 100%);
    }
}

@keyframes box4 {
    0%{
        transform: translate(200%, 0);
    }
    50% {
        transform: translate(200%, 100%);
    }
    100% {
        transform: translate(100%, 100%);
    }
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="loading d-none" id="load">
  <div class="boxes">
      <div class="box">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
      </div>
      <div class="box">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
      </div>
      <div class="box">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
      </div>
      <div class="box">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
      </div>
  </div>
</div>
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-th-large"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="index.php?page=logout" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../uploads/defaults/logo_light.png"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Tanala Travel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../uploads/defaults/profile_defaults.svg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $UNAME; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tour Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=add-package" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Package</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=pck-mgmt" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Package</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=add-location" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=edit-location" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Location</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="index.php?page=inc-mgmt" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inclusion Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=ctn-mgmt" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Content Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=rqst-mgmt" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Requested package
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=view-inq" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Inquiries
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=view-iss" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Issues
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
  <?php 
  switch($uri){
    case '/pages/admin/' :
      require __DIR__ . '/pages/dashboard.php';
      break;
    case '/pages/admin/index.php' :
      require __DIR__ . '/pages/dashboard.php';
      break;
    case '/pages/admin/index.php?page=add-package' :
      require __DIR__ . '/pages/createPackage.php';
      break;
    case '/pages/admin/index.php?page=add-location' :
      require __DIR__ . '/pages/createLocation.php';
      break;
    case '/pages/admin/index.php?page=inc-mgmt' :
      require __DIR__ . '/pages/inclusionMgmt.php';
      break;
    case '/pages/admin/index.php?page=pck-mgmt' :
      require __DIR__ . '/pages/managePackages.php';
      break;
    case '/pages/admin/index.php?page=ctn-mgmt' :
      require __DIR__ . '/pages/contentMgmt.php';
      break;
    case '/pages/admin/index.php?page=rqst-mgmt';
      require __DIR__ . '/pages/requestMgmt.php';
      break;
    case '/pages/admin/index.php?page=view-inq':
      require __DIR__ . '/pages/viewInquiry.php';
      break;
    case '/pages/admin/index.php?page=view-iss':
      require __DIR__ . '/pages/viewIssue.php';
      break;
    case '/pages/admin/index.php?page=edit-location':
      require __DIR__ . '/pages/editLocation.php';
      break;
    
    default:
      http_response_code(404);
      require __DIR__ . '/pages/information/404.php';
      break;
  }
  
  ?>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    </div>
    <strong>Copyright &copy; 2020 <a href="#">Tanala</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../assets/js/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../assets/plugins/image-uploader/image-uploader.js"></script>
<script src="../../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../../assets/plugins/select2/js/select2.full.min.js"></script>
<script src="../../assets/plugins/sweetalert2/sweetalert2.all.js"></script>
<script src="../../assets/plugins/sweetalert2/sweetalert2.js"></script>
<script src="../../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="../../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="../../assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../../assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="../../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<?php if($uri == "/pages/admin/index.php?page=pck-mgmt"): ?>
  <script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="../../assets/js/aether.reccurring.js"></script>
  <script src="../../assets/plugins/moment/moment.min.js"></script>
  <script src="../../assets/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="../../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<?php endif; ?>
<script src="../../assets/js/aether.tech.js"></script>


<script src="../../assets/js/aether.admin.js"></script>
</body>
</html>

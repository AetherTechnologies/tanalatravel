<?php include('process.member/checkClient.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tanala | Tara Na't Gumala</title>
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
  
  <link rel="stylesheet" href="../../assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
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
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Your Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?page=tourHistory" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tour History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?page=your-info" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Information</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="index.php?page=create-tour" class="nav-link">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>
                Create Your Own Tour
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=snd-inquiry" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Send Inquiry
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?page=snd-issue" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Send Issue
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <?php 
    switch($uri){
      case '/pages/member/' :
        require __DIR__ . '/pages/mainMenu.php';
        break;
      case '/pages/member/index.php':
        require __DIR__ . '/pages/mainMenu.php';
        break;
      case '/pages/member/index.php?page=your-info':
        require __DIR__. '/pages/personalInfo.php';
        break;
      case '/pages/member/index.php?page=create-tour':
        require __DIR__ . '/pages/createPackage.php';
        break; 
      case '/pages/member/index.php?page=view':
        require __DIR__ . '/pages/view.php';
        break;
      case '/pages/member/index.php?page=snd-inquiry':
        require __DIR__ . '/pages/sendInquiry.php';
        break;
      case '/pages/member/index.php?page=snd-issue':
        require __DIR__ . '/pages/sendIssue.php';
        break;
      case '/pages/member/index.php?page=tourHistory':
        require __DIR__ . '/pages/tourHistory.php';
        break;
      case '/pages/member/index.php?page=pending':
        require __DIR__ . '/pages/pending.php';
        break;
      default:
        http_response_code(404);
        require __DIR__ . '/pages/information/404.php';
        break;
    }
  ?>
  <!-- Content Wrapper. Contains page content -->
  
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
<script src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/js/aether.reccurring.js"></script>
<script src="../../assets/plugins/moment/moment.min.js"></script>
<script src="../../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../../assets/js/aether.tech.js"></script>
<script src="../../assets/js/tanala.custom.member.js"></script>
</body>
</html>
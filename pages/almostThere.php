<?php include("../api/controller/addressConfirm.php");?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Tanala | Last Step</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/css/font-awesome/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/aether.tech.css">
    <link rel="stylesheet" href="../assets/css/tanala.custom.css">
    <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance:textfield; 
    }

    </style>
    </head>
    <body class="hold-transition login-page">
      <div class="login-box">
        <div class="login-logo">
          <a href="../../index.php"><b>Tanala</b> Tara Na't Gumala</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">You are only one step a way to view and create your own tours.</p>

            <form id="contactForm" method="POST">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="address" id="clientAddress" placeholder="Address" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-address-card"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="number" class="form-control" name="number" id="clientNumber" placeholder="Contact Number" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
<!-- /.login-box -->
        
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/js/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/aether.tech.js"></script>
    <script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../assets/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="../assets/plugins/sweetalert2/sweetalert2.all.js"></script>
    <script src="../assets/plugins/sweetalert2/sweetalert2.js"></script>
    <script src="../assets/js/tanala.custom.address.js"></script>
    </body>
</html>
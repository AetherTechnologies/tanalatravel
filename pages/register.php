<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Tanala | Login</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/css/font-awesome/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/css/aether.tech.css">
    <link rel="stylesheet" href="../assets/css/tanala.custom.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition layout-top-nav">
        <section class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                <div class="container">
                <a href="../index.php" class="navbar-brand">
                    <span class="brand-text font-weight-light">Tanala</span>
                </a>
                
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">Sign-in</a>
                    </li>
                    <li class="nav-item">
                    <a href="login.php" class="nav-link">Sign-up</a>
                    </li>
                </ul>
                </div>
            </nav>
        <!-- /.navbar -->
        </section>
        <section class="register-page">
            <div class="register-box">
                <div class="register-logo">
                    <a href="../index.php"><b>Tanala</b> Tara Na't Gumala</a>
                </div>

                <div class="card">
                    <div class="card-body register-card-body">
                    <p class="login-box-msg">Register a new membership</p>

                    <form role="form" id="registerForm">
                        <div class="input-group mb-3">
                        <input type="text" class="form-control" name="userFullname" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="email" name="userEmail" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" name="confirmPassword" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-8">
                        <div class="input-group mb-0">
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                            <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms</a>.</label>
                            </div>
                        </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                        </div>
                    </form>

                    <a href="login.php" class="text-center">I already have a membership</a>
                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </section>
        
        
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/js/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/aether.tech.js"></script>
    <script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../assets/plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="../assets/js/tanala.custom.register.js"></script>
    </body>
</html>
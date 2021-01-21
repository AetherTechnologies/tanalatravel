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
                    <a href="login.php" class="nav-link">Sign-in</a>
                    </li>
                    <li class="nav-item">
                    <a href="register.php" class="nav-link">Sign-up</a>
                    </li>
                </ul>
                </div>
            </nav>
        <!-- /.navbar -->
        </section>
        <section class="login-page">
            <div class="login-box">
                <div class="login-logo">
                    <a href="../index.php"><b>Tanala</b> Tara Na't Gumala</a>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="../../index3.html" method="post">
                        <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        </div>
                        <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                        </div>
                    </form>

                    <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="register.php" class="text-center">Register a new membership</a>
                    </p>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
        </section>
        
        
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../assets/js/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/aether.tech.js"></script>
    <script src="../assets/js/plugins/jquery-validation/addtional-methods.min.js"></script>
    <script src="../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
    </body>
</html>
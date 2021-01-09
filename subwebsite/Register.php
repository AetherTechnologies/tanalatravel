<?php
include('connect.php');
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $sql = mysqli_query($con, "SELECT * FROM accounts WHERE username='$username' OR email='$email'");
    $result = mysqli_num_rows($sql);

    if($result == 1)
    {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Account or email is already taken!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

    }else
    {
        $query="INSERT INTO accounts (`username`,`password`,`email`,`rank`) VALUES ('$username','$password','$email','user')";
        mysqli_query($con, $query);
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Account successfully created!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}

?>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Register</title>
        </title>
    </head>

    <body style=background:#fffff>
        <form method="POST">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class=" col-xl-3 col-lg-6 col-md-6 pt-5">
                        <h1>Register</h1>

                        <div class="pt-3">
                            <input type="text" name="username" placeholder="username" class="form-control" required>
                        </div>

                        <div class="pt-2">
                            <input type="password" name="password" placeholder="password" class="form-control" required>
                            <div class="form-text">Password must be 8-20 characters long.</div>
                        </div>

                        <div class="pt-2">
                            <input type="email" name="email" placeholder="example@yahoo.com" class="form-control" required>
                            <!--<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>-->
                        </div>
                        <div class="pt-2">
                            <button type="submit" name="submit" class="btn btn-success ms-5">Register</button>
                            <a class="btn btn-secondary ms-4" href="signin.php">Go back</a>
                            <!-- <a href="signin.php">Sign up</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
        </script>
    </body>

    </html>
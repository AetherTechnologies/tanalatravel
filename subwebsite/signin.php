<html>
<?php
session_start();
include('connect.php');
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($con, "SELECT * FROM accounts WHERE username='$username' AND password='$password'");
    $result = mysqli_num_rows($sql);

    if($result > 0)
    {
        header("location:user\index.php");
        $_SESSION["username"] = $username;
    }
    else
    {
        echo "<script>
        alert('Username and password do not match')</script>";
    }

}
?>

    <head lang="en">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Sign in</title>
        </title>
    </head>

    <body style="background:#fffff">
        <form method="POST">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xl-3 col-lg-6 col-md-6 pt-5">
                        <h1>Login</h1>
                        <div class="pt-3">
                            <input type="text" name="username" placeholder="username" class="form-control">
                        </div>
                        <div class="pt-2">
                            <input type="password" name="password" placeholder="password" class="form-control">
                        </div>
                        <div class="pt-2">
                            <button type="submit" name="submit" class="btn btn-success ms-5">Sign in</button>
                            <a class="btn btn-secondary ms-4" href="Register.php">Register</a>
                            <br>
                            <!-- <a href="#">Forgot password?</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
        </script>
    </body>

</html>
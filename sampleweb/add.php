<?php
include('connect.php');
if(isset($_POST['add']))
{
    $name = strtoupper($_POST['name']);
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $type = $_POST['type'];
    $rating = $_POST['rating']; 
    $location = $_POST['location'];
    $image = $_FILES['bookingimage']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["bookingimage"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","jfif");

    // Get Image Dimension
    $fileinfo = getimagesize($_FILES["bookingimage"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];

    // Check image extension
    if(! in_array($imageFileType,$extensions_arr) ){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        image extension must be jpg,jpeg,png,jfif<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    // Check image size
    else if($_FILES['bookingimage']['size'] > 2000000){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        File size too big must be lesser than 2MB<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    // Check image dimensions
    else if($width > "300" || $height > "350"){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        File size too big must be within 300 x 350<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    // Upload image
    else{
        // Insert record
        $query="INSERT INTO bookings (`booking_image`, `booking_name`,`booking_price`, `booking_description`, `booking_type`, `booking_rating`, `booking_location`) VALUES ('$image','$name', '$price' ,'$desc','$type','$rating','$location')";
        mysqli_query($con, $query);

        // Upload file
        move_uploaded_file($_FILES['bookingimage']['tmp_name'],$target_dir.$image);

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Item successfully Added!<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';   
        // else{
        //     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //     Problem in uploading to database<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //     </div>';
        // }
    }
}

?>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Add</title>
        </title>
    </head>

    <body style=background:#fffff>
        <form method="POST" enctype='multipart/form-data'>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-xl-3 col-lg-6 col-md-6 pt-5">
                        <h1>Add</h1>

                        <div class="pt-3">
                            <input type="text" name="name" placeholder="b.name" class="form-control" required>
                        </div>

                        <div class="pt-2">
                            <input type='file' name='bookingimage' class="form-control" required>
                        </div>

                        <div class="pt-2">
                            <input type="number" name="price" placeholder="b.price" class="form-control" required>
                        </div>

                        <div class="pt-2">
                            <input type="text" name="description" placeholder="desc" class="form-control" required> 
                        </div>

                        <div class="pt-2">
                        <!-- <label for="cars">Choose a type:</label> -->
                            <select name="type" class="form-control">
                            <option value="Hotel" class="form-control">Hotel</option>
                            <option value="Flight" class="form-control">Flight</option>
                            </select>
                        </div>

                        <div class="pt-2">
                            <input type="number" name="rating" placeholder="b.rating" class="form-control" min="1" max="5" required>
                        </div>

                        <div class="pt-2">
                            <input type="text" name="location" placeholder="b.location" class="form-control" required> 
                        </div>

                        <div class="pt-2">
                            <button type="submit" name="add" class="btn btn-success">Add</button>
                            <a href="index.php" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        

    </body>

    </html>
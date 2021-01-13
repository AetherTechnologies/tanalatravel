<?php
  
    include('connect.php');

    if(isset($_POST['change_image'])){
        $id = $_POST['id'];
        $image = $_FILES['image']['name'];
        $target_dir = $_POST['image_path'];
        $target_file = basename($_FILES['image']['name']);
        //Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // // Valid file extensions
        $extensions_arr = array("jpg","jpeg","jfif","png");

            // Check image extension
            if(! in_array($imageFileType, $extensions_arr)){
                 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 image extension must be jpg, jpeg, png, jfif<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
            }

             // Check image size
             else if($_FILES['image']['size'] > 2000000){
                 echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                File size too big<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
             }
             else{

                $query="UPDATE `bookings` SET `image_path`='$target_dir',`booking_image`='$image' WHERE `bookings`.`bookingID` = $id";        
                $result = mysqli_query($con, $query);
        
                if($result){
                    header("Refresh 0");
                }
            }
    }
    
    if(isset($_POST['delete'])){    
        $bid = $_POST['id'];
        $query="DELETE FROM bookings WHERE `bookings`.`bookingID` = $bid";        
        $result = mysqli_query($con, $query);
        if($result){
            header("Refresh: 0");
        }
    }
    
    if(isset($_POST['update'])){

        $id2 = $_POST['id'];
        $name = strtoupper($_POST['name']);
        $price = $_POST['price'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $rating = $_POST['rating'];
        $location = $_POST['location'];

                $name2 = mysqli_real_escape_string($con, $name);
                $price2 = mysqli_real_escape_string($con, $price);
                $description2 = mysqli_real_escape_string($con, $description);
                $type2 = mysqli_real_escape_string($con, $type);
                $rating2 = mysqli_real_escape_string($con, $rating);
                $location2 = mysqli_real_escape_string($con, $location);
                
                // $query = "UPDATE `bookings` SET `image_path`='$target_dir', `booking_image`='$image', `booking_name`= '$name', `booking_price`='$price', `booking_description`='$description', `booking_type`='$type', `booking_rating`='$rating', `booking_location`='$location' WHERE `bookings`.`bookingID` = '$id2'";
                $query = "UPDATE `bookings` SET `booking_name`= '$name2', `booking_price`='$price2', `booking_description`='$description2', `booking_type`='$type2', `booking_rating`='$rating2', `booking_location`='$location2' WHERE `bookings`.`bookingID` = '$id2'";
                $result = mysqli_query($con, $query);
                
                // move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);
                if($result){
                    header("Refresh: 0");
                }
    }

?>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\index.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Edit</title>
    </head>

    <body style=background:#fffff>
        <div class="container">
                <h1>Delete</h1>
                <div class="d-flex col-xl-2 col-lg-2 col-md-3 col-xs-4 my-2">
                <input type="text" class="form-control" onkeyup="myFunction()" placeholder="Search name" id="myInput">
                <!-- <button type="submit" class="btn btn-success mx-2 form-control" name="search">Search</button> -->
                </div>              
                    <table class="table my-2" id="myTable">                
                        <thead>
                            <tr class="table-success">
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Type</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Location</th>
                                <th class="">Actions</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                            include("connect.php");
                            $sql = "SELECT * FROM bookings";
                            if($result = mysqli_query($con,$sql)){
                                while($row = mysqli_fetch_assoc($result)):
                                    $id = $row['bookingID'];
                                    $image_path = $row['image_path'];
                                    $image = $row['booking_image'];
                                    $name = $row['booking_name'];
                                    $price = $row['booking_price'];
                                    $description = $row['booking_description'];
                                    $type = $row['booking_type'];
                                    $rating = $row['booking_rating'];
                                    $location = $row['booking_location'];
                                ?>
                                
                            <tr>
                                <td><?= $id ?></td>
                                <td><?= $name ?></td>
                                <td><img src="<?= $image_path.$image ?>" width="100px" height="100px"></td>
                                <td><?= $price ?></td>
                                <td><?= $description ?></td>
                                <td><?= $type ?></td>
                                <td><?= $rating ?></td>
                                <td><?= $location ?></td>
                                <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticModalUpdate_<?= $id ?>">
                                    Update
                                </button>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticModalDelete_<?= $id ?>">
                                    Delete
                                </button>
                                </td>
                            </tr>

                            <!-- Modal Delete -->
                                <div class="modal fade" id="staticModalDelete_<?= $id ?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form method="POST">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel"></h5>                      
                                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                Are you sure you want to delete this item?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="delete" class="btn btn-danger">Yes</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>

                                <!-- Modal Update -->
                                <div class="modal fade" id="staticModalUpdate_<?= $id ?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel"></h5>                      
                                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                            </div>

                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="container">   
                                                        <div class="pt-3">
                                                            <input type="hidden" name="id" value="<?= $id ?>">
                                                            <input type="hidden" name="image_path" value="<?= $image_path ?>">
                                                            <input type="text" name="name"  value="<?= $name ?>" placeholder="name" class="form-control" required>
                                                        </div>

                                                        <div class="pt-2">
                                                            <img src="<?= $image_path.$image ?>" alt="..." width="200px" height="200px">    
                                                            <!-- <input type="file" name="image" value="<?= $image ?>" class="form-control mt-2"> -->
                                                        </div>

                                                        <div class="pt-2">
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticModalChangeImage_<?= $id ?>">
                                                                Change
                                                            </button>
                                                        </div>

                                                        <div class="pt-2">
                                                            <input type="number" name="price" value="<?= $price ?>" placeholder="price" class="form-control" required>
                                                        </div>

                                                        <div class="pt-2">
                                                            <input type="text" name="description" value="<?= $description ?>" placeholder="description" class="form-control" required> 
                                                        </div>

                                                        <div class="pt-2">
                                                        <!-- <label for="cars">Choose a type:</label> -->
                                                            <select name="type" class="form-control">
                                                                <?php
                                                                    if($type == "Hotel")
                                                                    {
                                                                        echo '<option value="Hotel" class="form-control">Hotel</option>';
                                                                        echo '<option value="Flight" class="form-control">Flight</option>';
                                                                    }
                                                                    else
                                                                    {
                                                                        echo '<option value="Flight" class="form-control">Flight</option>';
                                                                        echo '<option value="Hotel" class="form-control">Hotel</option>';
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="pt-2">
                                                            <input type="number" name="rating" value="<?= $rating ?>" placeholder="b.rating" class="form-control" step="0.01" min="1" max="5" required>
                                                        </div>

                                                        <div class="pt-2">
                                                            <input type="text" name="location" value="<?= $location ?>" placeholder="b.location" class="form-control" required> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Modal Change Image -->
                                <div class="modal fade" id="staticModalChangeImage_<?= $id ?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form method="POST" enctype='multipart/form-data'>
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticModalLabel"></h5>                      
                                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                <input type="hidden" name="image_path" value="<?= $image_path ?>">
                                                <img src="<?= $image_path.$image ?>" alt="..." width="200px" height="200px">
                                                <input type="file" name="image" class="form-control mt-2" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="change_image" class="btn btn-primary">Change</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>   
                                        </div>
                                    </form>
                                </div>
                                </div>

                            <?php
                                endwhile; 
                            ?>
                    </tbody>
                        <?php
                            }
                        ?>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-secondary" href="index.php">Back</a>
                </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!----------------------------------------------------->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!----------------------------------------------------->
        <script>
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
        </script>
        <!----------------------------------------------------->
        <script>
        function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } 
            else {
                tr[i].style.display = "none";
            }
            }
        }
        }
        </script>
        <!----------------------------------------------------->

        <!-- Due to how HTML5 defines its semantics, 
        the autofocus HTML attribute has no effect in Bootstrap modals. 
        To achieve the same effect, use some custom JavaScript: -->
        <!-- <script>
            var myModal = document.getElementById('myModal')
            var myInput = document.getElementById('myInput')

            myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
            })
        </script> -->
        <!----------------------------------------------------->

        <!-- optional search function -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
        </script> -->
    </body>

    </html>
<?php
    if(isset($_POST['delete'])){
    include('connect.php');
    $bid = $_POST['bid'];

         $query="DELETE FROM bookings WHERE `bookings`.`bookingID` = $bid";        
         mysqli_query($con, $query);
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
        <title>Delete</title>
    </head>
    <!-- Button trigger modal -->
    
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this item?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

    <!-- Button trigger modal -->       

    <body style=background:#fffff>
        <div class="container">
                <h1>Delete</h1>
                <div class="d-flex col-xl-3 col-lg-3 col-md-3 col-xs-2 my-2">              
                <input type="text" class="form-control" onkeyup="myFunction()" placeholder="Search " id="myInput">
                <a href="#flights" class="nav-link">Flights</a>
                <a href="#hotels" class="nav-link">Hotels</a>
                <!-- <button type="submit" class="btn btn-success mx-2 form-control" name="search">Search</button> -->
                </div>              
                    <table class="table my-2" id="myTable">                
                        <thead>
                            <tr class="table-success">
                            <th scope="col">ID</th>
                            <th scope="col">name</th>
                            <th scope="col">image</th>
                            <th scope="col">price</th>
                            <th scope="col">description</th>
                            <th scope="col">type</th>
                            <th scope="col">rating</th>
                            <th scope="col">location</th>
                            <th class=""></th>
                            <th class=""></th>
                            </tr>
                        </thead>
                    <tbody>
                    <form method="POST">
                        <?php 
                            include("connect.php");
                            $sql = "SELECT * FROM bookings";
                            //  $n1 = mysqli_num_rows($result);
                            //  if($n1 > 0){
                            //      foreach($result as $key => $data){               
                            if($result = mysqli_query($con,$sql)){
                                while($row = mysqli_fetch_assoc($result))
                                {           
                                    $id = $row['bookingID'];
                                    $name = $row['booking_name'];
                                    $image = $row['booking_image'];
                                    $price = $row['booking_price'];
                                    $description = $row['booking_description'];
                                    $type = $row['booking_type'];
                                    $rating = $row['booking_rating'];
                                    $location = $row['booking_location'];
                        ?>
                            <tr> 
                            <th><?= $id ?><input type="hidden " name="bid" value="<?= $id ?>"></td>
                            <td><?= $name ?></td>
                            <td><img src="<?= $image ?>"width="100px" height="100px"></td>
                            <td><?= $price ?></td>
                            <td><?= $description ?></td>
                            <td><?= $type ?></td>
                            <td><?= $rating ?></td>
                            <td><?= $location ?></td> 
                            <td><button type="submit" class="btn btn-primary" name="update">
                                update
                            </button></td>
                            <!-- <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"> -->
                            <td>                         
                            <button type="submit" class="btn btn-danger" name="delete">                         
                                delete
                            </button></td>
                            </tr> 
                        </form>                                          
                    </tbody> 
                    <?php
                            //      }
                            //  }
                            }                       
                        }
                        else{
                                echo '<p class="card-text" name="booking_location"><strong>No data found</strong></p>';
                            }
                    ?>                                   
                </table>
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
        $('#modal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        })
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
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }
        </script>
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
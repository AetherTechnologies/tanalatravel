<html>
<head>
<title>PLAYGROUND WEBSITE</title> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css\index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

    <!-- NAVBAR -->

<div class="container" style="background:#ffff">
    <section id="home">
        <nav class="navbar navbar-expand-lg fixed-top py-3 px-4 nav justify-content-center">
            <ul class="navbar-nav navbar-mid">           
                <li class="nav-item">
                    <a class="nav-link active" href="#home" id="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pagination" id="#">PAGINATION</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact" id="#">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutus" name="aboutus">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-btn" id ="button" href="signin.php">SIGN IN</a>
                </li>
            </ul>
        </nav>

    <!-- CAROUSEL -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="images\carousel1.jpg" class="d-block w-100 h-75" alt="images\notfound.jpg">
                </div>
                <div class="carousel-item">
                <img src="images\carousel2.jpg" class="d-block w-100 h-75" alt="images\notfound.jpg">
                </div>
                <div class="carousel-item">
                <img src="images\carousel3.jpg" class="d-block w-100 h-75" alt="images\notfound.jpg">
            </div>
        </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
    </section>

<!-- PAGINATION EXAMPLE -->
<section id="pagination">
    <h1 class="header-center">
        PAGINATION EXAMPLE (CSS NOT WORKING CAUSE ITS IN BOOTSTRAP 3)
    </h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Rating</th>
        </tr>
        <?php
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 1;
            $offset = ($pageno-1) * $no_of_records_per_page;

            include('connect.php');

            $total_pages_sql = "SELECT COUNT(*) FROM bookings";
            $result = mysqli_query($con,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $sql = "SELECT * FROM bookings LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res_data)){
            ?> 
                <tr>
                    <td><?= $row['bookingID'] ?></td>
                    <td><?= $row['booking_name'] ?></td>
                    <td><?= $row['booking_price'] ?></td>
                    <td><?= $row['booking_description'] ?></td>
                    <td><?= $row['booking_rating'] ?></td>
                </tr>
            <?php
                }
            ?>
        <!-- NOTE THIS PAGINATION BOOTSTRAP IS IN BOOTSTRAP 3 (CANT BE APPLIED IN BOOTSTRAP 5) -->
        </table>
        <ul class="pagination">
            <li><a href="?pageno=1">First</a></li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
            </li>
            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
</section>

<section id="alerts">
    <h1 class="header-center">
        ALERTS WITH .FADE .SHOW CLASSES EXAMPLE
    </h1>
    <button type="button" class="btn btn-primary">Click me</button>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
</div>
</section>

<section id="inputs">
    <h1 class="header-center">
        INPUTS EXAMPLE
    </h1>
    <input type="date" name="date" class="form-control"> 
    <input type="time" name="date" class="form-control"> 
</div>
</section>
</div>

<!------------------------------------------------------------>
<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" 
crossorigin="anonymous">
</script>
<!------------------------------------------------------------>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous">
</script>
<!-- navbar fade effect jquery -->
<script>
$(function(){
    var navbar = $('.navbar');
	
	$(window).scroll(function(){
		if($(window).scrollTop() <= 650){
			navbar.removeClass('navbar-scroll');
		} else {
			navbar.addClass('navbar-scroll');
		}
	});
});
</script>
<!-- search jquery -->
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
<!-- alerts jquery -->
<!-- <script>
$(".alert").alert('close')
</script> -->
<!------------------------------------------------------------>
<!-- optional search function -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myCard div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
 </script> -->
 <!------------------------------------------------------------>
</body>
</html>
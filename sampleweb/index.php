<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css\index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Homepage</title>
</head>

<body style="background:gray">
<div class="container" style="background:#ffff">
    <section id="home">
        <nav class="navbar navbar-expand-lg fixed-top py-3 px-4 nav justify-content-center">
            <ul class="navbar-nav navbar-mid">           
                <li class="nav-item">
                    <a class="nav-link active" href="#home" id="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#booking" id="#">BOOKINGS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact" id="#">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutus" id="">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link custom-btn" href="signin.php">SIGN IN</a>
                </li>
            </ul>
        </nav>

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
        </div>      
    </section>

<section class="pt-6" id="booking">
<!-- Booking section -->
<h1 class="header-center">
<hr class="">
    BOOKING
</h1>
<form method="POST" class="d-flex">
    <!-- Search -->
    <button type="button" name="search" class="btn btn-secondary me-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
        </svg>
        <span class="visually-hidden">Button</span>
    </button>          
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <!-- Search -->

    <!-- dropdown filter -->
    <div class="dropdown">
        <a href="add.php" class="btn btn-success me-2" aria-expanded="false">Add</a>
    </div>
    <div class="dropdown">
        <a href="delete.php" class="btn btn-danger" aria-expanded="false">Delete</a>
    </div>
    <!-- dropdown filter -->
</form>


<!-- book form -->
<form method="POST">
    <div class="row">
        <?php 
        include("connect.php");
        $result = mysqli_query($con,"SELECT * FROM bookings");
        $n1 = mysqli_num_rows($result);
            //$row = mysqli_fetch_array($result);
            // $i=0;
            // while($i < $n1)
            // {     
            // $b1=mysqli_result($result,$i,"booking_name");
            // $b2=mysqli_result($result,$i,"booking_price");
            // $b3=mysqli_result($result,$i,"booking_description");
            // $b4=mysqli_result($result,$i,"booking_type");
            // $b5=mysqli_result($result,$i,"booking_rating");
            // $b6=mysqli_result($result,$i,"booking_location");     
            // MYSQL_RESULT was deprecated in PHP 5.5.0 :(((((((
            
        if($n1 > 0)
        {
            foreach($result as $key => $data)
            {               
        ?>
                <div class="col-md-3 d-flex my-2 mx-auto justify-content-center">
                    <div class="card">                
                        <img src="uploads\<?= $data["booking_image"] ?>" class="card-img-top" alt="..." name="booking_image" width="300px" height="350px">
                        <div class="card-body">                   
                            <h5 class="card-title" name="booking_name"><?= $data['booking_name'] ?></h5>
                            <p class="card-text" name="booking_type"><strong><?= $data['booking_type'] ?></strong></p>
                            <p class="card-text" name="booking_description"><strong>Description:</strong><?= $data['booking_description'] ?></p>
                            <p class="card-text" name="booking_price"><strong>Price:</strong><?= $data['booking_price'] ?></p>
                            <p class="card-text" name="booking_rating"><strong>Rating:</strong><?= $data['booking_rating'] ?></p>
                            <p class="card-text" name="booking_location"><strong>Location:</strong><?= $data['booking_location'] ?></p>
                            <button type="submit" class="btn btn-primary" name="book">Book</a>
                        </div>             
                    </div> 
                </div>
        <?php
            }
        }
        else{
            echo '<p class="card-text" name="booking_location"><strong>No data found</strong></p>';
        }
        ?>
    </div>
</form>
    

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center pt-5">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</section>


<!-- Contacts -->
<section class="pt-6" id="contact">
    <h1 class="header-center">
    <hr class="">
    Contact
    </h1>
    <div class="header-center">   
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id augue ac purus consectetur congue id finibus nulla. Mauris venenatis neque ultrices tellus dictum interdum. Sed fermentum dui libero, eget molestie enim tristique id. Donec porta sapien ac tellus egestas varius eget at nunc. Phasellus at ipsum dui. Quisque eu nisl nec nulla efficitur elementum. Duis elementum rhoncus dapibus. Aenean lobortis laoreet purus, nec tristique enim faucibus sed. Aenean vel mi vitae nisl aliquet luctus. Suspendisse non mollis elit, vel venenatis turpis.
Phasellus vitae porta felis, in tristique risus. Integer id venenatis lorem. Fusce rutrum sapien eget mauris dictum rutrum. Aliquam aliquet sem et velit volutpat, vel ultricies metus blandit. Morbi pharetra massa eu neque blandit mattis. Praesent fermentum elementum neque id feugiat. Nam luctus pharetra dui quis viverra. Aenean pharetra pretium mauris vitae placerat. Suspendisse potenti. Nullam pharetra, tortor a mollis tristique, mauris diam tempor leo, auctor mollis diam nisl vel ante. Fusce quis dui venenatis, interdum ipsum vitae, fringilla lectus. Duis sagittis quis magna nec pretium. Duis venenatis aliquam nibh porttitor consectetur. Vestibulum rutrum justo ut turpis egestas vestibulum.
    </p>
    </div>
</section>

<!-- About us -->
<section class="pt-6" id="aboutus">
    <h1 class="header-center">
    <hr class="">
    About Us
    </h1>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id augue ac purus consectetur congue id finibus nulla. Mauris venenatis neque ultrices tellus dictum interdum. Sed fermentum dui libero, eget molestie enim tristique id. Donec porta sapien ac tellus egestas varius eget at nunc. Phasellus at ipsum dui. Quisque eu nisl nec nulla efficitur elementum. Duis elementum rhoncus dapibus. Aenean lobortis laoreet purus, nec tristique enim faucibus sed. Aenean vel mi vitae nisl aliquet luctus. Suspendisse non mollis elit, vel venenatis turpis.
Phasellus vitae porta felis, in tristique risus. Integer id venenatis lorem. Fusce rutrum sapien eget mauris dictum rutrum. Aliquam aliquet sem et velit volutpat, vel ultricies metus blandit. Morbi pharetra massa eu neque blandit mattis. Praesent fermentum elementum neque id feugiat. Nam luctus pharetra dui quis viverra. Aenean pharetra pretium mauris vitae placerat. Suspendisse potenti. Nullam pharetra, tortor a mollis tristique, mauris diam tempor leo, auctor mollis diam nisl vel ante. Fusce quis dui venenatis, interdum ipsum vitae, fringilla lectus. Duis sagittis quis magna nec pretium. Duis venenatis aliquam nibh porttitor consectetur. Vestibulum rutrum justo ut turpis egestas vestibulum.
    </p>
</section>

<!-- Footer -->
<footer class="pt-6">
  <!-- Grid container -->
    <div class="bg-light text-center text-lg-start">
        <div class="p-4">
            <!--Grid row-->
            <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">Footer Content</h5>
                <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                voluptatem veniam, est atque cumque eum delectus sint!
                </p>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase">Links</h5>

                <ul class="list-unstyled mb-0">
                <li>
                    <a href="#!" class="text-dark">Link 1</a>
                </li>
                <li>
                    <a href="#!" class="text-dark">Link 2</a>
                </li>
                <li>
                    <a href="#!" class="text-dark">Link 3</a>
                </li>
                <li>
                    <a href="#!" class="text-dark">Link 4</a>
                </li>
                </ul>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-0">Links</h5>

                <ul class="list-unstyled">
                <li>
                    <a href="#!" class="text-dark">Link 1</a>
                </li>
                <li>
                    <a href="#!" class="text-dark">Link 2</a>
                </li>
                <li>
                    <a href="#!" class="text-dark">Link 3</a>
                </li>
                <li>
                    <a href="#!" class="text-dark">Link 4</a>
                </li>
                </ul>
            </div>
            <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
            <!-- Copyright -->
    </div>
</footer>
    <!-- Footer -->
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script>
$(function(){
    var navbar = $('.navbar');
	
	$(window).scroll(function(){
		if($(window).scrollTop() <= 250){
			navbar.removeClass('navbar-scroll');
		} else {
			navbar.addClass('navbar-scroll');
		}
	});
    $('.aboutus').on('click', function(){
        alert('This Is About Us');
    });
});
</script>
<!----------------------------------------------------->
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
</body>
</html>
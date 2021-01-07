<?php 
session_start();
$username = $_SESSION["username"];

if(isset($_POST['logout']))
{
    session_destroy();
    header("location:..\index.php");
}

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="..\css\index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Homepage</title>
</head>


<body>
<div class="container">
    <nav class="navbar navbar-expand-lg fixed-top py-3 px-4 nav justify-content-center">
        <ul class="navbar-nav navbar-mid">
        <form class="d-flex">
                <button type="button" name="search" class="btn btn-secondary me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                    </svg>
                    <span class="visually-hidden">Button</span>
                </button>
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form>
        
        <li class="nav-item">
                <a class="nav-link active" href="#home" id="#">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#booking" id="#">BOOKINGS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact" id="#">CONTACTS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#aboutus" id="#">ABOUT US</a>
            </li>
            <form method="POST">
                <li class="nav-item">
                    <button type="submit" name="logout" class="nav-link btn btn-secondary">LOGOUT</button>
                </li>
            </form>
        </ul>
    </nav>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="..\images\asd.jpg" class="d-block w-100 h-75" alt="...">
            </div>
            <div class="carousel-item">
            <img src="..\images\twice-sana-4.jpg" class="d-block w-100 h-75" alt="...">
            </div>
            <div class="carousel-item">
            <img src="..\images\twice-sana-4.jpg" class="d-block w-100 h-75" alt="...">
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
    </div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="justify-content-center">
<section class="pt-6" id="booking">
<!-- Booking section -->
    <h1>
    ksdjnfgaolkjhsgkljsl
    </h1>
    <p>
    <pre>
    iosjahngfljshdfljsalkfjaldksfjkasjfasf
    set_file_buffersdjf;jsafj;dsajf'dba_sync\asfjsjf;
    fclosesafj
    safjksaf
    sapi_windows_cp_is_utf8safsaf
    sapi_windows_cp_is_utf8safsaffsadf</pre>
    </p>
</section>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<section class="pt-6" id="contact">
<!-- Contacts -->
    <h1>
    ksdjnfgaolkjhsgkljsl
    </h1>
    <p>
    <pre>
    iosjahngfljshdfljsalkfjaldksfjkasjfasf
    set_file_buffersdjf;jsafj;dsajf'dba_sync\asfjsjf;
    fclosesafj
    safjksaf
    sapi_windows_cp_is_utf8safsaf
    sapi_windows_cp_is_utf8safsaffsadf</pre>
    </p>
</section>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<section class="pt-6" id="aboutus">
<!-- About us -->
    <h1>
    ksdjnfgaolkjhsgkljsl
    </h1>
    <p>
    <pre>
    iosjahngfljshdfljsalkfjaldksfjkasjfasf
    set_file_buffersdjf;jsafj;dsajf'dba_sync\asfjsjf;
    fclosesafj
    safjksaf
    sapi_windows_cp_is_utf8safsaf
    sapi_windows_cp_is_utf8safsaffsadf</pre>
    </p>
</section>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
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
});
</script>

</body>
</html>
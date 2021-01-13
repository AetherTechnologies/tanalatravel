<html>
<head>
  <title>Scraped Flights and Accomodations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="card img-fluid" style="width:500px">
    <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
    <div class="card-img-overlay">
      <p class="card-title"></p>
      <p class="card-type"></p>
      <p class="card-description"></p>
      <p class="card-price"></p>
      <p class="card-rating"></p>
      <p class="card-location"></p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>
</div>

<?php

include('simple_html_dom.php');

$websiteUrl = "http://sampleweb.tanalatravel.com";

$html = file_get_html ($websiteUrl);

foreach($html->find('div[class="col-xl-3 col-lg-3 col-md-3 d-flex my-2 mx-auto"]') as $packageDetails)
{
    foreach($packageDetails->find('p[class="card-title"]') as $bookingName)
    {
        echo $bookingName->text(). "<br>";
    }
    
    foreach($packageDetails->find('p[class="card-type"]') as $bookingType)
    {
        echo $bookingType->text(). "<br>";
    }

    foreach($packageDetails->find('p[class="card-description"]') as $bookingDescription)
    {
        echo $bookingDescription->text(). "<br>";
    }

    foreach($packageDetails->find('p[class="card-price"]') as $bookingPrice)
    {
        echo $bookingPrice->text(). "<br>";
    }

    foreach($packageDetails->find('p[class="card-rating"]') as $bookingRating)
    {
        echo $bookingRating->text(). "<br>";
    }

    foreach($packageDetails->find('p[class="card-location"]') as $bookingLocation)
    {
        echo $bookingLocation->text(). "<br>";
    }
}

?>
</body>

</html>
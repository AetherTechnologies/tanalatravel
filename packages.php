
<?php

include('./scraper/simple_html_dom.php');

$websiteUrl = "http://sampleweb.tanalatravel.com/";

$html = file_get_html ($websiteUrl);

foreach($html->find('div[class="col-xl-3 col-lg-3 col-md-3 d-flex my-2 mx-auto"]') as $packageDetails):

    // foreach($packageDetails->find('p[class="card-title"]') as $bookingName)
    // {
    //     echo $bookingName->text(). "<br>";
    // }
    
    // foreach($packageDetails->find('p[class="card-type"]') as $bookingType)
    // {
    //     echo $bookingType->text(). "<br>";
    // }

    // foreach($packageDetails->find('p[class="card-description"]') as $bookingDescription)
    // {
    //     echo $bookingDescription->text(). "<br>";
    // }

    // foreach($packageDetails->find('p[class="card-price"]') as $bookingPrice)
    // {
    //     echo $bookingPrice->text(). "<br>";
    // }

    // foreach($packageDetails->find('p[class="card-rating"]') as $bookingRating)
    // {
    //     echo $bookingRating->text(). "<br>";
    // }

    // foreach($packageDetails->find('p[class="card-location"]') as $bookingLocation)
    // {
    //     echo $bookingLocation->text(). "<br>";
    // }

    $imgUrl = $packageDetails->find('img[class="card-img-top"]', 0)->src;
    $Name = $packageDetails->find('p[class="card-name"]',0)->plaintext;
    $Type = $packageDetails->find('p[class="card-type"]',0)->plaintext;
    //$Desc = $packageDetails->find('p[class="card-description"]',0)->plaintext;
    $Price = $packageDetails->find('p[class="card-price"]',0)->plaintext;
    //$Rating = $packageDetails->find('p[class="card-rating"]',0)->plaintext;
    $Location = $packageDetails->find('p[class="card-location"]',0)->plaintext;





?>
        <div class="rom-btm">
			<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
					<img src="<?= $websiteUrl.$imgUrl ?>" class="img-responsive" alt="">
			</div>
				<div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
					<h4>Package Name: <?= $Name ?></h4>
					<h6>Package Type : <?= $Type ?> </h6>
					<p><b>Package Location :</b><?= $Location ?></p>
					<p><b>Features</b></p>
				</div>
				<div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
					<h5>USD <?= $Price ?> </h5>
					<a href="package-details.php?pkgid=" class="view">Details</a>
				</div>
				<div class="clearfix"></div>
			</div>
<?php endforeach; ?>
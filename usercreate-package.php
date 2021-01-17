<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<html>
<head>
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
		 new WOW().init();
	</script>
</head>
<style type="text/css">
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        
        #map {
            
            height: 50%;
            width: 60%;
        }
        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            margin: 0px;
            height: 100%;
            padding: 0;
        }
    </style>
<body>
<!-- Header -->
<?php include('includes/header.php');?>

<div class="banner-1 ">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">Create Your Own Package</h1>
    </div>
</div>

    
    <div class="grid-form1">
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12" id="h-margin">
										<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<div class="container-fluid">
													<div class="row">
														<div class="col-sm-2 text-center">
															<label for="focusedinput" class="control-label">Package Name</label>
														</div>
														<div class="col-sm-10">
															<input type="text" class="form-control input-sign" name="packagename" id="packagename" placeholder="Create Package" required>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="container-fluid">
													<div class="row">
														<div class="col-sm-2 text-center">
															<label for="focusedinput" class="control-label">Package Type</label>
														</div>
														<div class="col-sm-10">
															<input type="text" class="form-control input-sign" name="packagetype" id="packagetype" placeholder=" Package Type eg- Family Package / Couple Package" required>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="container-fluid">
													<div class="row">
														<div class="col-sm-2 text-center">
															<label for="focusedinput" class="control-label">Package Location</label>
														</div>
														<div class="col-sm-10">
															<input type="text" class="form-control input-sign" name="packagelocation" id="packagelocation" placeholder=" Package Location" required>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="container-fluid">
													<div class="row">
														<div class="col-sm-2 text-center">
															<label for="focusedinput" class="control-label">Package Price in USD</label>
														</div>
														<div class="col-sm-10">
															<input type="text" class="form-control input-sign" name="packageprice" id="packageprice" placeholder=" Package Price is USD" required>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<div class="container-fluid">
													<div class="row">
														<div class="col-sm-2 text-center">
															<label for="focusedinput" class="control-label">Package Features</label>
														</div>
														<div class="col-sm-10">
															<input type="text" class="form-control input-sign" name="packagefeatures" id="packagefeatures" placeholder="Package Features Eg-free Pickup-drop facility" required>
														</div>
													</div>
												</div>
											</div>		
											<div class="form-group">
												<div class="container-fluid">
													<div class="row">
														<div class="col-sm-2 text-center">
															<label for="focusedinput" class="control-label">Package Details</label>
														</div>
														<div class="col-sm-10">
															<textarea class="form-control" rows="5" cols="50" name="packagedetails" id="packagedetails" placeholder="Package Details" required></textarea> 
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="container-fluid">
													<div class="row">
														<div id="map" style="margin: auto;"></div>
													</div>
												</div>
											</div>
											<div class="itinerary">
												<div class="row">
                                                    <div class="container-fluid">
														<div class="card p-2">
															<div class="row">
																<div class="col-sm-12">
																	<input type="text" placeholder="Day" class="form-control">
																</div>
																<div class="col-sm-12">
																	<input type="text" placeholder="Title" class="form-control">
																</div>
																<div class="col-sm-12">
																	<textarea type="text" rows="10" cols="50" placeholder="Description" class="form-control"></textarea>
																</div>
																<div class="col-sm-12">
																	<button class="btn btn-success w-100 rounded py-3">Submit</button>
																</div>
															</div>
                                                        </div>
                                                    </div>
												</div>
											</div>
											<div class="form-group">
												<div class="container-fluid">
													<div class="row">
														<div class="col-sm-2 text-center">
															<label for="focusedinput" class="control-label">Package Image</label>
														</div>
														<div class="col-sm-10">
															<input type="file" name="packageimage" id="packageimage" required>
														</div>
													</div>
												</div>
											</div>
											<div class="container-fluid">
												<div class="row justify-content-center">
													<div class="col-sm-3">
														<div class="row">
															<div class="col-sm-6">
																<button type="submit" name="submit" class="btn-primary btn w-100">Create</button>
															</div>
															<div class="col-sm-6">
																<button type="reset" class="btn-inverse btn w-100">Reset</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
            </div>
        </div>

<?php include('includes/footer.php');?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbSmW0o0udL-0Kkllfh2ntL72mIi6loC8&callback=initMap&libraries=&v=weekly" defer></script>
	<script>
    let markers = [];
    let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 12.8797,
                    lng: 121.7740
                },
                zoom: 8,
            });
            map.setOptions({ minZoom: 4, maxZoom: 20});
			if(navigator.geolocation){
				navigator.geolocation.getCurrentPosition(function (position){
					initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					map.setCenter(initialLocation);		
				});
			}
        }
		
		
        var prev_window = false;
        function placeMarkerAndPanTo(latitude, longhitude, location_name, location_type, location_price, location_status, location_image, map) {
            
            var marker = new google.maps.Marker({
                position: {
                    lat: latitude,
                    lng: longhitude
                },
                map: map,
            });

        const contentString =
        '<div class="container">' +
        '<div class="row"><div class="col-12">' +
        '<img src="admin/locationimages/'+ location_image +'" width="150px" height= "150px"/>' +
        '<div><p>'+ location_name +'</p>' +
        '<p>Price:'+' '+ location_price + '</p>' +
        '<p>Location:'+' '+ location_status + '</p>' + '</div>' +
        '</div></div></div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 450,
            });

            marker.addListener("click", () => {
                if(prev_window){
                    prev_window.close();
                }
                prev_window = infowindow;
                infowindow.open(map, marker);
            });
        }

        $(document).ready(function() {
            $.ajax({
                    url: "http://localhost:8080/tanalatravel/geoloc/result.php",
                    dataType: 'json',
                    type: 'GET',
                    success : function (e){
                        var row = JSON.parse(JSON.stringify(e));
                        for (let i = 0; i < row.length; i++){
                            let location_image = row[i].loc_image;
                            let location_name = row[i].loc_name;
                            let location_type = row[i].loc_type;
                            let location_status = row[i].loc_status;
                            let location_price = row[i].loc_price;
                            let longhitude = row[i].loc_long;
                            let latitude = row[i].loc_lat;
                            let parsedLong = parseFloat(longhitude);
                            let parsedLat = parseFloat(latitude);
                            placeMarkerAndPanTo(parsedLat, parsedLong, location_name, location_type, location_price, location_status, location_image, map);
                        }
                    },
                    error: function (error){
                        console.log(error);
                    }
                });
        });
    </script>

</body>

</html>

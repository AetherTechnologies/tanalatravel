<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
$loctype=$_POST['locationtype'];
$locname=$_POST['locationname'];	
$loclong=$_POST['locationlongitude'];
$loclat=$_POST['locationlatitude'];	
$locprice=$_POST['locationprice'];
$locstatus=$_POST['locationstatus'];	
$locimage=$_FILES["locationimage"]["name"];

$sql="INSERT INTO `tbllocation` (`loc_id`, `loc_type`, `loc_name`, `loc_long`, `loc_lat`, `loc_price`, `loc_status`, `loc_image`) VALUES (NULL, '$loctype', '$locname', '$loclong', '$loclat', '$locprice', '$locstatus', '$locimage');";
move_uploaded_file($_FILES["locationimage"]["tmp_name"],"locationimages/".$_FILES["locationimage"]["name"]);
$query2 = mysqli_query($con, $sql);
// $query = $dbh->prepare($sql);
// $query->bindParam(':loctype',$loctype,PDO::PARAM_STR);
// $query->bindParam(':locname',$locname,PDO::PARAM_STR);
// $query->bindParam(':loclong',$loclong,PDO::PARAM_STR);
// $query->bindParam(':loclat',$loclat,PDO::PARAM_STR);
// $query->bindParam(':locprice',$locprice,PDO::PARAM_STR);
// $query->bindParam(':locstatus',$locstatus,PDO::PARAM_STR);
// $query->bindParam(':locimage',$locimage,PDO::PARAM_STR);
// $query->execute();
// $lastInsertId = $dbh->lastInsertId();
// if($lastInsertId)
// {
// $msg="Package Created Successfully";
// }
// else 
// {
// $error="Something went wrong. Please try again";
// }

}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>TANALA | Admin Package Creation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbSmW0o0udL-0Kkllfh2ntL72mIi6loC8&callback=initMap&libraries=&v=weekly" defer></script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
#map{
	width: 1000px;
	height: 60vh;
	margin-bottom: 10px;
}
		</style>

</head> 
<body>
<div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="mother-grid-inner">
              <!--header start here-->
<?php include('includes/header.php');?>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->

<!--mapscript-->
<script>
      function initMap() {
        const myLatlng = { lat: 13.00, lng: 122.00 };
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 6,
          center: myLatlng,
        });
        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
          content: "Click the map to get Lat/Lng!",
          position: myLatlng,
        });
        infoWindow.open(map);
        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
          // Close the current InfoWindow.
          infoWindow.close();
          // Create a new InfoWindow.
          infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
          });
          
          document.getElementById('locationlongitude').value = mapsMouseEvent.latLng.lat();
          document.getElementById('locationlatitude').value = mapsMouseEvent.latLng.lng();
          infoWindow.setContent(
            JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
          );
          infoWindow.open(map); 
        });
      }
	</script>
<!--//mapscript-->	

	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Update Package </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
	
<!---->
  <div class="grid-form1">
  	       <h3>Add Location</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         		<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="POST" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location Type</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="locationtype" id="locationtype" placeholder="Location Type" required>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="locationname" id="locationname" placeholder="Location Name" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location Longitude</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="locationlongitude" id="locationlongitude" placeholder="Location Longitude" required>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location Latitude</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="locationlatitude" id="locationlatitude" placeholder="Location Latitude" required>
									</div>
								</div>

								<div id="map"></div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="locationprice" id="locationprice" placeholder="Location Price" required>
									</div>
								</div>		

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location Status</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="5" cols="50" name="locationstatus" id="locationstatus" placeholder="Location Status" required></textarea> 
									</div>
								</div>		

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location Image</label>
									<div class="col-sm-8">
										<input type="file" name="locationimage" id="locationimage" required>
									</div>
								</div>	


								<div class="row">
									<div class="col-sm-8 col-sm-offset-2">
										<button type="submit" name="submit" class="btn-primary btn">Create</button>

										<button type="reset" class="btn-inverse btn">Reset</button>
									</div>
								</div>	
							</form>	
						</div>

					<div class="panel-footer">
						
					</div>
  				</div>
 			</div>
 	<!--//grid-->

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
					<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>
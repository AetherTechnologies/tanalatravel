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
$pname=$_POST['packagename'];
$ptype=$_POST['packagetype'];	
$plocation=$_POST['packagelocation'];
$pprice=$_POST['packageprice'];	
$pfeatures=$_POST['packagefeatures'];
$pdetails=$_POST['packagedetails'];	
$pimage=$_FILES["packageimage"]["name"];
move_uploaded_file($_FILES["packageimage"]["tmp_name"],"pacakgeimages/".$_FILES["packageimage"]["name"]);
$sql="INSERT INTO TblTourPackages(PackageName,PackageType,PackageLocation,PackagePrice,PackageFetures,PackageDetails,PackageImage) VALUES(:pname,:ptype,:plocation,:pprice,:pfeatures,:pdetails,:pimage)";
$query = $dbh->prepare($sql);
$query->bindParam(':pname',$pname,PDO::PARAM_STR);
$query->bindParam(':ptype',$ptype,PDO::PARAM_STR);
$query->bindParam(':plocation',$plocation,PDO::PARAM_STR);
$query->bindParam(':pprice',$pprice,PDO::PARAM_STR);
$query->bindParam(':pfeatures',$pfeatures,PDO::PARAM_STR);
$query->bindParam(':pdetails',$pdetails,PDO::PARAM_STR);
$query->bindParam(':pimage',$pimage,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Package Created Successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Update Package </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Create Package</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-12">
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
															<label for="focusedinput" class="control-label">Package Name</label>
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
											
											<div class="container-fluid">
												<div class="row justify-content-end">
													<div class="col-lg-10">
														<div class="card p-2">
															<div class="row">
																<div class="col-lg-12 py-2">
																	<input type="text" placeholder="Day" class="form-control">
																</div>
																<div class="col-lg-12 py-2">
																	<input type="text" placeholder="Title" class="form-control">
																</div>
																<div class="col-lg-12 py-2">
																	<textarea type="text" rows="10" placeholder="Description" class="form-control"></textarea>
																</div>
																<div class="col-lg-12 py-1">
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

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
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
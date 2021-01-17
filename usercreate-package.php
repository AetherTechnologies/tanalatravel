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
</html>

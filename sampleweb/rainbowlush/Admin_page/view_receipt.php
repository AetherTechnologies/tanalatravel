<?php 
if(isset($_POST['btnapprove']))
{
    include('bridge.php');

    $z1 = $_POST['id'];
    $z2 = $_POST['uid'];
    $z3 = $_POST['code'];
    $query = "UPDATE receipt SET status = '1' where receipt_id = '$z1' ";
    $result = mysql_query($query);

    $query2 = "UPDATE pending_order SET remarks = '1' where id = '$z2' ";
    $result2 = mysql_query($query2);

     $query3 = "UPDATE product SET product_status = 'Out of Stock' where product_code = '$z3' ";
    $result3 = mysql_query($query3);

    header('location: index.php');
}


?>

<title>Add Product | Admin</title>
<?php include('header.php'); ?>

        <style>
textarea {
    height: 100px;
    width: 300px;
    padding: 12px 10px;
    box-sizing: border-box;
    border-radius: 4px;
    font-size: 16px;
    resize: none;
}


    </style>
        <!-- Single pro tab review Start-->
    
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a>View Receipt</a></li>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">


                                                     <?php 
include('bridge.php');
$id = $_GET['p_id'];
$query2 = "SELECT * from receipt where order_no = '$id' ";
$result2 = mysql_query($query2);
$n2 = mysql_numrows($result2);
mysql_close();

$i2=0;
while($i2<$n2)
{
$pid = mysql_result($result2,$i2,"receipt_id");
$p1 = mysql_result($result2,$i2,"order_no");
$p2 = mysql_result($result2,$i2,"fname");
$p3 = mysql_result($result2,$i2,"lname");
$p4 = mysql_result($result2,$i2,"uname");
$p5 = mysql_result($result2,$i2,"total");
$p6 = mysql_result($result2,$i2,"date");
$p7 = mysql_result($result2,$i2,"img_path");
$p8 = mysql_result($result2,$i2,"product_code");


?>

                                                    <form class="dropzone dropzone-custom needsclick addlibrary" id="demo1-upload" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               <input type="hidden" name="id" value="<?php echo $pid; ?>">
                                                                <div class="form-group">
                                                                   <label>First Name</label>
                                                                    <input name="fname" type="text" class="form-control" value="<?php echo $p2; ?>" readonly>
                                                                </div>

                                                                 <div class="form-group">
                                                                   <label>Last Name</label>
                                                                    <input name="lname" type="text" class="form-control" value="<?php echo $p3; ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                   <label>Total Amount:</label>
                                                                    <input name="total" type="text" class="form-control" value="&#8369; <?php echo $p5; ?>" readonly>
                                                                </div>

                                                                <div class="form-group">
                                                                   <label>Date:</label>
                                                                    <input name="date" type="text" class="form-control" value="<?php echo $p6; ?>" readonly>
                                                                </div>
                                                               

                                                                 


                                                           


                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                 <div class="form-group">
                                                                    <center>
                                                                   <img src="../users/<?php echo $p7; ?>" width="200px;"></center>
                                                                </div>

                                                              
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="">
                                                                    <input type="hidden" name="uid" value="<?php echo $p1; ?>" >

                                                                    <input type="hidden" name="code" value="<?php echo $p8; ?>" >
                                                                    <button type="submit" class="btn btn-primary" name="btnapprove">Approve</button>
                                                                    <a href="../admin_page/" class="btn btn-danger">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

    <?php 
    $i2++; 
}
    
    ?>



<script>
    document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
                        </script>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control" placeholder="Phone">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control" placeholder="Confirm Password">
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
												<div class="row">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="devit-card-custom">
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Facebook URL">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Twitter URL">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Google Plus">
															</div>
															<div class="form-group">
																<input type="url" class="form-control" placeholder="Linkedin URL">
															</div>
															<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
														</div>
													</div>
												</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
							<p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- maskedinput JS
		============================================ -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/masking-active.js"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="js/datepicker/jquery-ui.min.js"></script>
    <script src="js/datepicker/datepicker-active.js"></script>
    <!-- form validate JS
		============================================ -->
    <script src="js/form-validation/jquery.form.min.js"></script>
    <script src="js/form-validation/jquery.validate.min.js"></script>
    <script src="js/form-validation/form-active.js"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
   
</body>

</html>
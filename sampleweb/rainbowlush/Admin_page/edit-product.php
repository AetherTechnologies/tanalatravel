<?php

if(isset($_POST['btnedit']))
    
{
include ('bridge.php');

$x1 = $_POST['id'];
$x2 = $_POST['product_code'];
$x3 = $_POST['product_name'];
$x4 = $_POST['product_type'];
$x5 = $_POST['product_size'];
$x6 = $_POST['product_description'];
$x7 = $_POST['product_status'];
$x8 = $_POST['product_price'];


$x6 = $_POST['product_description'];
$textToStore = nl2br(htmlentities($x6, ENT_QUOTES, 'UTF-8'));





      $queryCheck2="set foreign_key_checks=0";
      $resultCheck2=@mysql_query($queryCheck2);
      
      $queryProduct = "UPDATE product SET product_name = '$x3', product_type= '$x4', product_size='$x5', product_description='$x6', product_status='$x7', product_price='$x8' where product_id = '$x1' ";
      $resultProduct=@mysql_query($queryProduct);
      
      /*$querycat = "INSERT into category values ('$catid','$catype','Others')";
      $resultcat=@mysql_query($querycat);*/


echo "<script>alert('Updated Successfully')</script>";
          echo '<script type="text/javascript">' . "\n";
echo 'window.location="../admin_page/";';
echo '</script>';

      

    
}





?>

<title>Edit Product | Admin</title>
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
                                <li class="active"><a>Edit Product</a></li>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">

 <?php 
 $u1 = $_GET['p_id']; 
include('bridge.php');
$query2 = "SELECT * from product where product_id = '$u1' ";
$result2 = mysql_query($query2);
$n2 = mysql_numrows($result2);
mysql_close();

$i2=0;
while($i2<$n2)
{
$pid = mysql_result($result2,$i2,"product_id");
$p1 = mysql_result($result2,$i2,"product_code");
$p2 = mysql_result($result2,$i2,"image_path");
$p3 = mysql_result($result2,$i2,"product_name");
$p4 = mysql_result($result2,$i2,"product_status");
$p5 = mysql_result($result2,$i2,"product_price");
$p6 = mysql_result($result2,$i2,"product_type");
$p7 = mysql_result($result2,$i2,"product_description");
$p8 = mysql_result($result2,$i2,"product_size");
?>


                                                    

                                                    <form class="dropzone dropzone-custom needsclick addlibrary" id="demo1-upload" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id" value="<?php echo $pid; ?>">
                                                                    <input name="product_code" type="text" class="form-control" placeholder="Product Code" value="<?php echo $p1; ?>" readonly required>
                                                                </div>

                                                                 <div class="form-group">
                                                                    <input name="product_name" type="text" class="form-control" placeholder="Name" value="<?php echo $p3; ?>" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <select class="form-control" name="product_type" required>
                                                                         <option value="<?php echo $p6; ?>"><?php echo $p6; ?></option>
                                                                        <option value="Rash Guard">Rash Guard</option>
                                                                         <option value="Bikini">Bikini</option>
                                                                          <option value="One Piece">One Piece</option>
                                                                    </select>
                                                                </div>

                                                                 <div class="form-group" style="width:300px;">
                                                                    <select class="form-control" name="product_size" required>
                                                                         <option value="<?php echo $p8; ?>"><?php echo $p8; ?></option>
                                                                        <option value="XS">XS</option>
                                                                         <option value="S">S</option>
                                                                          <option value="M">M</option>
                                                                           <option value="L">L</option>
                                                                            <option value="XL">XL</option>
                                                                    </select>
                                                                </div>

                                                                 <div class="form-group" style="width:300px;">
                                                                    <select class="form-control" name="product_status" required>
                                                                         <option value="<?php echo $p4; ?>"><?php echo $p4; ?></option>
                                                                         <option value="Active">Active</option>
                                                                        <option value="Out of Stock">Out of Stock</option>
                                                                         <option value="Coming Soon">Coming Soon</option>
                                                                          
                                                                    </select>
                                                                </div>

                                                                 <div class="form-group" style="width:300px;">
                                                                    <input name="product_price" type="text" class="form-control" placeholder="Price" value="<?php echo $p5; ?>"required>
                                                                </div>

                                                              

                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                 <div class="form-group">
                                                                   <textarea placeholder="Description" rows="auto" cols="auto" name="product_description" required><?php echo $p7; ?></textarea>
                                                                </div>

                                                              
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-primary" name="btnedit">Save</button>
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
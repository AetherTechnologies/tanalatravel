<?php

if(isset($_POST['btnproduct']))
{

$target_dir = "products/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["btnproduct"])) {
      
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {

        $uploadOk = 1;
        
    } else {

        $uploadOk = 0;
    }
}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
} */

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
       
    } 
    else {
       
    }
}

}

?>



<?php 

if(isset($_POST['btnproduct']))
    
{

    $image = addslashes($_FILES['image']['tmp_name']);
    $name= addslashes($_FILES['image']['name']);
    $image= base64_encode($image);
        
    saveimage($name,$image);
}

function saveimage($name,$image)
{
    $filetmp= $_FILES["image"]["tmp_name"];
    $filetype= $_FILES["image"]["type"];
    $filepath = "products/" .$name;
include ('bridge.php');

$x1 = $_POST['id'];
$x2 = $_POST['product_code'];
$x3 = $_POST['product_name'];
$x4 = $_POST['product_type'];
$x9 = $_POST['product_for'];
$x5 = $_POST['product_size'];
$x6 = $_POST['product_description'];
$x7 = $_POST['product_status'];
$x8 = $_POST['product_price'];


$x6 = $_POST['product_description'];
$textToStore = nl2br(htmlentities($x6, ENT_QUOTES, 'UTF-8'));





      $queryCheck2="set foreign_key_checks=0";
      $resultCheck2=@mysql_query($queryCheck2);
      
      $queryProduct = "INSERT INTO product values ('$x1','$x2','$x3','$x4','$x9','$x5','$x8','$textToStore','$x7','$image','$filepath','$filetype')";
      $resultProduct=@mysql_query($queryProduct);
      
      /*$querycat = "INSERT into category values ('$catid','$catype','Others')";
      $resultcat=@mysql_query($querycat);*/


echo '<script language="javascript">';
echo 'alert("Posted Successfully")';
echo '</script>';

      

    
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
                                <li class="active"><a>Add Products</a></li>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                    
                                                    <form class="dropzone dropzone-custom needsclick addlibrary" id="demo1-upload" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id">
                                                                    <input name="product_code" type="text" class="form-control" placeholder="Product Code" required>
                                                                </div>

                                                                 <div class="form-group">
                                                                    <input name="product_name" type="text" class="form-control" placeholder="Name" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <select class="form-control" name="product_type" required>
                                                                         <option disabled selected>Swim Wear Type</option>
                                                                        <option value="RashGuard">Rash Guard</option>
                                                                         <option value="Bikini">Bikini</option>
                                                                          <option value="OnePiece">One Piece</option>
                                                                          <option value="TwoPiece">Two Piece</option><option value="TwoPiece">Tank Tops</option>
                                                                          <option value="TwoPiece">Shorts</option>
                                                                    </select>
                                                                </div>

                                                                  <div class="form-group">
                                                                    <select class="form-control" name="product_for" required>
                                                                         <option disabled selected>Gender</option>
                                                                         <option value="Both">Men & Women</option>
                                                                        <option value="Men">Men</option>
                                                                         <option value="Women">Women</option>
                                                                         
                                                                    </select>
                                                                </div>

                                                                 <div class="form-group" style="width:300px;">
                                                                    <select class="form-control" name="product_size" required>
                                                                         <option disabled selected>Product Size</option>
                                                                        <option value="Extra Small">XS</option>
                                                                         <option value="Small">S</option>
                                                                          <option value="Medium">M</option>
                                                                           <option value="Large">L</option>
                                                                            <option value="Extra Large">XL</option>
                                                                    </select>
                                                                </div>

                                                                 <div class="form-group" style="width:300px;">
                                                                    <select class="form-control" name="product_status" required>
                                                                         <option disabled selected>Status</option>
                                                                         <option value="Active">Active</option>
                                                                        <option value="Out of Stock">Out of Stock</option>
                                                                         <option value="Coming Soon">Coming Soon</option>
                                                                          
                                                                    </select>
                                                                </div>

                                                                 <div class="form-group">
                                                                    <input name="product_price" type="text" class="form-control" placeholder="Price" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <input type="file" name="image" id="files" required>
                                                                    <img id="image" width="200px; height:200px;" style="padding-top:10px;"/>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                 <div class="form-group">
                                                                   <textarea placeholder="Description" rows="auto" cols="auto" name="product_description" required></textarea>
                                                                </div>

                                                              
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="">
                                                                    <button type="submit" class="btn btn-primary" name="btnproduct">Post</button>
                                                                    <a href="../admin_page/" class="btn btn-danger">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

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
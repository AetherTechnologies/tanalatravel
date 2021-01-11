
<?php session_start(); ?>
<?php 
if(!isset($_SESSION['username']))
{
	header('location:../');
}
?>

<?php
    if(isset($_POST['btnreceipt']))
{

$target_dir = "receipt/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["btnreceipt"])) {
      
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
       
    } else {
       
    }
}

}

?>

<?php 

if(isset($_POST['btnreceipt']))
    
{

        $image = addslashes($_FILES['image']['tmp_name']);
        $name= addslashes($_FILES['image']['name']);
        $image= base64_encode($image);
        
        saveimage($name,$image);
    }

function saveimage($name,$image)
{
		$user = $_SESSION['username'];
        $filetmp= $_FILES["image"]["tmp_name"];
    $filetype= $_FILES["image"]["type"];
    $filepath = "/receipt/" .$name;
include ('bridge.php');

    
	$r1 = $_POST['id'];
	$r2 = $_POST['total'];
	$r3 = $_SESSION['username'];
	$r4 = $_SESSION['fname']; 
	$r5 = $_SESSION['lname'];
	$r6 = $_POST['code'];
      
     $queryr = "INSERT INTO receipt values ('','$r1','$r4','$r5','$r3','$r2',CURDATE(),'$filepath','$filetype','0','$r6')";
	$resultr = mysql_query($queryr);

	echo '<script>alert("Send Successfully!")</script>';
	
      

    
}





?>




<!DOCTYPE html>
<html lang="en">
<head>
<title>
Pending Order
</title>

<style>
	

.file-upload {
  background-color: #ffffff;
  width: 600px;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #1FB264;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #1FB264;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>

<!--===============================================================================================-->
	
	<!-- Header -->
	<?php include('header.php'); ?>
	<br>
		<br>
			<br>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="home-03.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				  Shopping Cart
			</span>
		</div>
	</div>
		
	
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">

							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">No.</th>
									<th class="column-2">Code</th>
									<th class="column-3">Name</th>
									<th class="column-4">Total</th>
									<th class="column-5">Action</th>								
								</tr>

<?php
include('bridge.php');
$uname= $_SESSION['username'];
$query2 = "SELECT * from pending_order where username= '$uname' and remarks = '0' ";
$result2 = mysql_query($query2);
$n2 = mysql_numrows($result2);
mysql_close();

$i2=0;
while($i2<$n2)
{

$p1 = mysql_result($result2,$i2,"id");
$p2 = mysql_result($result2,$i2,"total");
$p10 = mysql_result($result2,$i2,"product_code");
$p11 = mysql_result($result2,$i2,"product_name");

?>  

<input type="hidden" name="id" value="<?php echo $p1; ?>">
<input type="hidden" name="total" value="<?php echo $p2; ?>">
<div class="modal fade" id="myModal" role="dialog" style="margin-top:100px;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
       
          <h4 class="modal-title" style="float:left;">Total: &#8369;<?php echo $p2; ?>.00</h4>
          <h4 class="modal-title" style="float:right;">Order No.: #<?php echo $p1; ?></h4>
        </div>
        <div class="modal-body">


         <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="file-upload" style="width:100%;">
  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

  <div class="image-upload-wrap">
    <input class="file-upload-input" type="file" name="image" onchange="readURL(this);" accept="image/*" required/>
    <div class="drag-text">
      <h3>Drag and drop a file or select add Image</h3>
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" src="#" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
    </div>
  </div>
</div>

       <center><input type="submit" class="flex-c-m stext-101 cl2 size-119 bg3 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" style="color: #fff;" name="btnreceipt" value="Upload"></center>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>    
    </div>
  </div>

								<tr class="table_row">
									<td class="column-1">
										#<?php echo $p1; ?>
									</td>
									<td class="column-2">
										<?php echo $p11; ?>
									</td>

									<td class="column-3">
										<?php echo $p10; ?>
									</td>
									
									<td class="column-4">&#8369; <?php echo $p2; ?></td>
									
									<td class="column-5">
										<form method="post">
											<input type="hidden" name="code" value="<?php echo $p10; ?>">
											<button type="submit" class="btn btn-primary bor13 pointer" style="padding:10px;" data-toggle="modal" data-target="#myModal">
												<div><i class="zmdi zmdi-upload" style="size:20px;"></i> UPLOAD</div>
											</button>
											
										</form>
									</td>									
								</tr>

<?php 
	$i2++;	
	} 
?>								
							</table>



						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">			
							<!--<a href="product.php">
								<div class="flex-c-m stext-101 cl2 size-119 bg3 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" style="color: #fff;">
									Update Cart										
								</div>
							</a>-->
						</div>
					</div>
				</div>

				<?php 
				include('bridge.php'); 
				$query = "SELECT SUM(total) AS value_sum FROM cart where username = '$uname' ";
				$result = mysql_query($query); 
$row = mysql_fetch_assoc($result); 
$sum2 = $row['value_sum'];
$sum = $sum2 + 200;

				?>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Guidelines
						</h4>

					
						
								<p class="stext-111 cl6 p-t-2">
									
									<b>*Payment should be made within 24 hours from the time you received the order confirmation in your email. </b><br><br>

									<b>*Stricly NO return, NO exchange and NO cancellation of orders.</b><br><br>

									<b>*MOP: BPI | BDO | CEBUANA | LBC | PALAWAN</b><br><br>

									<b>*Shipping: Monday, Wednesday, Friday and Saturday</b>
								</p>
								
								
							</div>
						</div>

						
					
							
						
				
					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		

	<!-- Footer -->
	<?php include('footer.php');?>
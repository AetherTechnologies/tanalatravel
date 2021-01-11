<?php session_start(); ?>
<?php 
if(!isset($_SESSION['username'])) 
{
	header('location: ../');
}
?>

<?php 
$x1= $_GET['pid'];
$x2= $_GET['pname'];
$x3= $_GET['pprice'];
$x4= $_GET['ptype'];
$x5= $_GET['pfor'];
$x6= $_GET['pdesc'];
$x7= $_GET['ppath'];
$x8= $_GET['pcode'];
?>

<?php 
if(isset($_POST['btnaddcart']))
{
	include('bridge.php');
	$id = '';
	$a1 = $_POST['id'];
	$a2 = $_POST['name'];
	$a3 = $_POST['price'];
	$a4 = $_POST['code'];
	$a5 = $_POST['desc'];
	$a6 = $_POST['size'];
	$a7 = $_POST['quantity'];
	$a8 = $x7;
	$total = $a7 * $a3;

	$user = $_SESSION['username'];

	$query = "INSERT INTO cart values ('$id','$user','$a2','$a1','$a4','$a3','$a5','$a6','$a7','$total','$a8',NOW()) ";
	$result = mysql_query($query);

$message="Added to Cart Successfully";
echo "<script type='text/javascript'>alert('$message');</script>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>
Product Detail
</title>

<?php include('header.php'); ?>	
	<br>
		<br>
			<br>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.php" class="stext-109 cl8 hov-cl1 trans-04">
				Shop
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo $x2; ?>
			</span>
		</div>
	</div>
		
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="../Admin_page/<?php echo $x7; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="../Admin_page/<?php echo $x7; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="../Admin_page/<?php echo $x7; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>								
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $x2; ?>
						</h4>

						<span class="mtext-106 cl2">
							&#8369; <?php echo $x3; ?>
						</span>

						<p class="stext-102 cl3 p-t-23">
						<?php echo $x6; ?>
						</p>
						
						<?php 
$x1= $_GET['pid'];
$x2= $_GET['pname'];
$x3= $_GET['pprice'];
$x4= $_GET['ptype'];
$x5= $_GET['pfor'];
$x6= $_GET['pdesc'];
$x7= $_GET['ppath'];
$x8= $_GET['pcode'];
$x9= $_GET['psize'];


?>
					<form method="POST">
						<div class="p-t-33">
		
								<input type="hidden" name="id" value="<?php echo $x1; ?>">
								<input type="hidden" name="name" value="<?php echo $x2; ?>">
								<input type="hidden" name="price" value="<?php echo $x3; ?>">
								<input type="hidden" name="code" value="<?php echo $x8; ?>">
								<input type="hidden" name="desc" value="<?php echo $x6; ?>">

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6" style="font-weight: bold;">
									Size Available:
								</div>

								<div class="size-204 respon6-next">
									<input type="text" name="size" value="<?php echo $x9; ?>" style="padding-left: 10px;font-weight: bold;">
								</div>
							</div>							

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-20">
										
										<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="1" readonly>

									</div>

									<button type="submit" name="btnaddcart" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
									Add to Cart
								</button>
									
								</div>
							</div>							
						</div>
					</form>	
				</div>
			</div>
		</div>

	
		</div>

	</section>


	<!-- Footer -->
<?php include('footer.php'); ?>
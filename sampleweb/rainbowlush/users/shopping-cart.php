
<?php session_start(); ?>
<?php 
if(!isset($_SESSION['username']))
{
	header('location:../');
}
?>

<?php 
if(isset($_POST['btnorder']))
{

include('bridge.php');
$id= '';
$uname = $_SESSION['username'];
$s1 = $_POST['subtotal'];
$s2 = $_POST['total'];
$s3 = $_POST['street'];
$s4 = $_POST['cityprovince'];
$s5 = $_POST['zipcode'];
$s6 = $_POST['mop'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$s7 = $_POST['product_name'];
$s8 = $_POST['product_code'];

$query6 = "INSERT INTO pending_order values ('$id','$s8','$s7','$fname','$lname','$uname',CURDATE(),'$s3','$s4','$s5','$s1','$s2','$s6','0')";
$result6 = mysql_query($query6);

$query4 = "INSERT INTO archive_cart SELECT * from cart where username = '$uname' ";
$result4= mysql_query($query4);

$querydel = "DELETE from cart where username = '$uname' ";
$resultdel = mysql_query($querydel);


echo "<script>alert('Order Successfully')</script>";
header('location: pending_order.php');
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>
Shopping Cart
</title>
	
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
	<form class="bg0 p-t-75 p-b-85" method="POST" >
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">

							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								<?php
                  include('bridge.php');
$uname= $_SESSION['username'];
$query2 = "SELECT * from cart where username= '$uname' ";
$result2 = mysql_query($query2);
$n2 = mysql_numrows($result2);
mysql_close();

$i2=0;
while($i2<$n2)
{


$p1 = mysql_result($result2,$i2,"name");
$p2 = mysql_result($result2,$i2,"product_price");
$p3 = mysql_result($result2,$i2,"product_size");
$p4 = mysql_result($result2,$i2,"product_quantity");
$p5 = mysql_result($result2,$i2,"img");
$p6 = mysql_result($result2,$i2,"total");
$p7 = mysql_result($result2,$i2,"product_code");

$total = $p2 * $p4;

?>  

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="../Admin_page/<?php echo $p5; ?>" style="width:50px; height:70px; object-fit:cover;"alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $p1; ?></td>
									<td class="column-3">&#8369; <?php echo $p2; ?></td>
									<td class="column-4" >
										<!--<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>-->
										<center>x <?php echo $p4; ?></center>
											
											<!--<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>-->
									</td>
									<td class="column-5">&#8369; <?php echo $total; ?></td>
								</tr>

<?php 
	$i2++;	
	} 
?>								
							</table>
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
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									&#8369; <?php echo $sum2; ?>.00
								</span>
							</div>
						</div>
						
				<input type="hidden" name="subtotal" value="<?php echo $sum2; ?>">
					<input type="hidden" name="total" value="<?php echo $sum; ?>">
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Payment:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="mop" required>
											<option select disabled>Please Select</option>
											<option value="BPI">BPI</option>
											<option value="BDO">BDO</option>
											<option value="Cebuana">Cebuana</option>
											<option value="LBC">LBC</option>
											<option value="Palawan">Palawan Express</option>
										</select>
										<div class="dropDownSelect2"></div>
								</div>
								<p class="stext-111 cl6 p-t-2">
									BPI / BDO / Cebuana / LBC / Palawan Express<br>
									<br>
									<b>*Payment should be made within 24 hours from the time you received the order confirmation in your email. </b><br> 
								</p>
								
								<div class="p-t-15" >
									<span class="stext-112 cl8" style="font-weight: bold;">
										*Shipping Fee: &#8369; 200.00
									</span>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="street" placeholder="Street Address" required>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="cityprovince" placeholder="City / Province" required>
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="zipcode" placeholder="Postcode / Zip" required>
									</div>												
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									&#8369; <?php echo $sum; ?>.00
								</span>
							</div>
						</div>

<?php
include('bridge.php');
$uname= $_SESSION['username'];
$query3 = "SELECT * from cart where username= '$uname' ";
$result3 = mysql_query($query3);
$n3 = mysql_numrows($result3);
mysql_close();

$i3=0;
while($i3<$n3)
{


$f1 = mysql_result($result3,$i3,"name");

$f7 = mysql_result($result3,$i3,"product_code");


$total = $p2 * $p4;




?>  
<?php $i3++; }?>	
						<input type="hidden" name="product_name" value="<?php echo $f1; ?>">
						<input type="hidden" name="product_code" value="<?php echo $f7; ?>">

						<input type="submit" name="btnorder" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Place Order">
							
					
				
					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		

	<!-- Footer -->
	<?php include('footer.php'); ?>

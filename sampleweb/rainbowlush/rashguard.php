<!DOCTYPE html>
<html lang="en">
<head>
<title>Rash Guard</title>

	<!-- Header -->
	<?php include('headers.php'); ?>	
	<br>
		<br>
			<br>
	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<!--<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>-->

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".RashGuard">
						Rash Guard
					</button>					
				</div>		
			</div>

<style>
	.image_size {
		width:200px;
		height:300px;
		object-fit: cover;
				}
</style>

<div class="row isotope-grid">

<?php
include('bridge.php');
$query2 = "SELECT * from product where product_type = 'RashGuard' and product_status = 'Active'";
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
$p7 = mysql_result($result2,$i2,"product_for");

			?>

				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $p6; ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="Admin_page/<?php echo $p2; ?>" class="image_size" alt="IMG-PRODUCT">

							<a style="cursor:pointer;" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-addcart-no">
								Add to Cart
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a class="stext-104 cl4 hov-cl1 trans-04 js-name p-b-6">
									<?php echo $p3; ?>
								</a>

								<span class="stext-105 cl3">
									&#8369; <?php echo $p5; ?>
								</span>
							</div>
						</div>
					</div>
				</div>
				
<?php 
	$i2++; 
	}
?>
			</div>
			<!-- Load more 
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>-->
			</div>
		</div>
	</div>
		
	<!-- Footer -->
	<?php include('footer.php'); ?>
<div class="header-cart-content flex-w js-pscroll">
	<ul class="header-cart-wrapitem w-full">

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

?>  

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="../Admin_page/<?php echo $p5; ?>" style="width:50px; height:70px; object-fit:cover;"  alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $p1;  ?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $p4; ?> x &#8369; <?php echo $p2; ?>
							</span>
						</div>
					</li>

<?php 
	$i2++; 
	}
?>
					
				</ul>
				
				<div class="w-full">
					<div class="header-cart-buttons flex-w w-full">
						<a href="shopping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Check Out
						</a>					
					</div>
				</div>
			</div>
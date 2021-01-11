<?php session_start(); ?>
<?php 

//Register
if(isset($_POST['btnupdate']))
{
	include('bridge.php');
	$firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
	$username = $_SESSION['username'];
	$password = $_POST['password'];
	$contact_no = $_POST['contact'];
	$address = $_POST['address'];
	$email = $_POST['email'];


	$query = "UPDATE accounts SET 
	First_name = '$firstname',
	Last_name = '$lastname',
	Password = '$password',
	Contact_No = '$contact_no',
	Address = '$address',
	Email_Add = '$email' where username = '$username'";
	$result=@mysql_query($query);

			header("location: /rainbowlush/users");
		}

		else {

		}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>
Edit profile
</title>
<?php include("header.php")	?>
	<!-- Sidebar -->
	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>

		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>

					<li class="p-b-13">
						<a href="login.php" class="stext-102 cl2 hov-cl1 trans-04">
							Login
						</a>
					</li>

					<li class="p-b-13">
						<a href="signup.php" class="stext-102 cl2 hov-cl1 trans-04">
							Sign Up
						</a>
					</li>
				</ul>

				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@rainbowlush.ph
					</span>

					<div class="flex-w flex-sb p-t-36 gallery-lb">
						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-01.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-01.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-02.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-02.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-03.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-03.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-04.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-04.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-05.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-05.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-06.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-06.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-07.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-07.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-08.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-08.jpg');"></a>
						</div>

						<!-- item gallery sidebar -->
						<div class="wrap-item-gallery m-b-10">
							<a class="item-gallery bg-img1" href="images/gallery-09.jpg" data-lightbox="gallery" 
							style="background-image: url('images/gallery-09.jpg');"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</aside>

<style>
.signup {
	margin-top:100px;
}
</style>

<form method="POST">
		<section class="signup bg0 p-t-23 p-b-130">
			<div class="container">
				<div class="p-b-10">
					<h3 class="ltext-103 cl5">
					Edit Profile
					</h3>		
				<br>
<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">

<?php
include('bridge.php');
$uname = $_SESSION['username'];
$query2 = "SELECT * from accounts where username = '$uname' ";
$result2 = mysql_query($query2);
$n2 = mysql_numrows($result2);
mysql_close();

$i2=0;
while($i2<$n2)
{
$pid = mysql_result($result2,$i2,"AccountID");
$p1 = mysql_result($result2,$i2,"First_name");
$p2 = mysql_result($result2,$i2,"Last_name");
$p3 = mysql_result($result2,$i2,"Username");
$p4 = mysql_result($result2,$i2,"Password");
$p5 = mysql_result($result2,$i2,"Contact_No");
$p6 = mysql_result($result2,$i2,"Address");
$p7 = mysql_result($result2,$i2,"Email_Add");


			?>

						<form method="POST">
						<!-- First name & Last name -->
							<div class="row p-b-16">							
								<div class="col-sm-6 p-b-4">													
									<input class="size-111 bor8 cl2 plh3 size-116 p-l-62 p-r-30" id="" type="text" name="first_name" placeholder="First name"  maxlength = "30" required value="<?php echo $p1; ?>">
								</div>
											
								<div class="col-sm-6 p-b-4">													
									<input class="size-111 bor8 cl2 plh3 size-116 p-l-62 p-r-30" id="" type="text" name="last_name" placeholder="Last name" maxlength = "30" value="<?php echo $p2; ?>" required>
								</div>
							</div>						
						<!-- Username -->								
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Username" maxlength = "30" value="<?php echo $p3; ?>" readonly>						
							</div>														
						<!-- Password -->	
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password" maxlength = "30" value="<?php echo $p4; ?>" required>
							</div>	

						<!-- Contact -->											
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="contact" placeholder="Contact No." maxlength = "11" value="<?php echo $p5; ?>" required>
							</div>
							
						<!-- Address -->
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address" placeholder="Address" maxlength = "" value="<?php echo $p6; ?>" required>
							</div>
							
						<!-- Email -->	
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address" value="<?php echo $p7; ?>" required>
								<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
							</div>

							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name="btnupdate" >
								Update
							</button>
						<br>
							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							<a href ="index.php" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
								Cancel
							</a>
							</button>
						</form>
<?php
	$i2++;
	}
?>
					</div>
				</div>			
			</div>
		</section>
	</form>
<?php include("footer.php") ?>
<?php session_start();
if(isset($_POST['login_account'])){
	require 'connect.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$result2= mysqli_query($con, 'select * from accounts where Username ="'.$username. '" and Password="'.$password.'" ');

	
	
	 if (mysqli_num_rows($result2)==1 ){
	
		$user2 = $result2->fetch_array();
	
		$_SESSION['username'] = $user2['Username'];
		$_SESSION['Account_type'] = $user2['Account_type'];
		$_SESSION['fname'] = $user2['First_name'];
		$_SESSION['lname'] = $user2['Last_name'];
			
			if ($_SESSION['Account_type']== "User")
			{
			header("location: users/");
			}
			
			else if ($_SESSION['Account_type']== "Admin")
			{
			header("location: admin_page/");
			}
		}
}
	else{
		
	}

?>

<?php include('headers.php'); ?>
<style>
.login {
	margin-top: 100px;
}
</style>
<center>
		<section class="login bg0 p-t-23 p-b-130">
			<div class="container">
				<div class="p-b-10">
					<h3 class="ltext-103 cl5">
						Login
					</h3>
				<br>
					<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
						<form method="POST">
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Username" maxlength = "30" required>							
							</div>
							
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password" maxlength = "30" required>							
							</div>
							
							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name="login_account">
									Login
							</button>	
						<br>
							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">	
								<a href ="?page=0" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
									Cancel 
								</a>
							</button>
						<br>
							 or create an account here,
							<a href ="signup.php">Sign up</a>
						</form>															
					</div>				
				</div>			
			</div>
		</section>
	</center>

<?php include("footer.php") ?>
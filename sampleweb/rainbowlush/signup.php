f
<?php 
//Register
if(isset($_POST['add_account'])){
	include('bridge.php');
	$firstname = $_POST['first_name'];
	$lastname = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$gender = $_POST['gender'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	$birthday = $year."-".$day."-".$month;
	$contact_no = $_POST['contact'];
	$address = $_POST['address'];
	$email = $_POST['email'];

$userValid = mysql_query("select * from accounts where username = '". $username ."'");
$userResult = mysql_num_rows($userValid);

		if($userResult == 1){

			header("location: signup.php");
		}

		else{
			$query = "INSERT INTO accounts(First_name, Last_name, Username, Password, Gender, Birthdate, Contact_No, Address, Email_Add, Account_type) VALUES ('$firstname','$lastname','$username','$password','$gender','$birthday','$contact_no','$address','$email','User')";
			$result=@mysql_query($query);
			header("location: /rainbowlush");
		}
	
}

else {

}

?>
<?php include('headers.php'); ?>
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
					Sign up
					</h3>		
				<br>
					<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
						<form>
						<!-- First name & Last name -->
							<div class="row p-b-16">							
								<div class="col-sm-6 p-b-4">													
									<input class="size-111 bor8 cl2 plh3 size-116 p-l-62 p-r-30" id="" type="text" name="first_name" placeholder="First name"  maxlength = "30" required >
								</div>
											
								<div class="col-sm-6 p-b-4">													
									<input class="size-111 bor8 cl2 plh3 size-116 p-l-62 p-r-30" id="" type="text" name="last_name" placeholder="Last name" maxlength = "30" required>
								</div>
							</div>						
						<!-- Username -->								
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Username" maxlength = "30" required>						
							</div>														
						<!-- Password -->	
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password" maxlength = "30" required>
							</div>	
						<!-- Gender -->	
							<div class="size-219 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="gender" required>
											<option>Male</option>
											<option>Female</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>										
								</div>	
							<br>	
							
						<!-- Birthdate -->	
							<div class="row p-b-24">
								<div class="col-md-4">
								   <div class="size-205 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="month" required>											
												<option value="01">January</option>
												<option value="02">February</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06">June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>	
								
								<div class="col-md-3">
									<div class="size-203 respon6-next">
										<div class="rs1-select2 bor8 bg0">											
												<select class="js-select2" id="days" name="day" required></select>																						
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>
								
								<div class="col-md-4">
									<div class="size-205 respon6-next">
										<div class="rs1-select2 bor8 bg0">
												<select class="js-select2" id="year" name="year" required></select>	
											<div class="dropDownSelect2"></div>												
										</div>
									</div>
								</div>
							</div>		
							
						<!-- Contact No. -->																				
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="contact" placeholder="Contact No." maxlength = "11" required>
							</div>
							
						<!-- Address -->
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="address" placeholder="Address" maxlength = "" required>
							</div>
							
						<!-- Email -->	
							<div class="bor8 m-b-20 how-pos4-parent">
								<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address" required>
								<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
							</div>

							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name="add_account">
								Submit
							</button>
						<br>
							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							<a href ="home-03.html" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
								Cancel
							</a>
							</button>
						</form>
					</div>
				</div>			
			</div>
		</section>
	</form>
<?php include("footer.php") ?>
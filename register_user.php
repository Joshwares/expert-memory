<?php
	require("db/connection.php");
	include("includes/header.php");

	$usrName = $usrAddress = $usrState = $usrCity = $usrStatus = $usrGender = $usrEmail = $usrTelNumber = $usrPassword = $usrcPassword = $password = "";

	$pError = $error = $checkError = "";

	if (isset($_POST['register'])) {

		$usrName = mysqli_escape_string($conn,$_POST['fullName']);
		$usrAddress = mysqli_escape_string($conn,$_POST['address']);
		$usrState = mysqli_escape_string($conn,$_POST['state']);
		$usrCity = mysqli_escape_string($conn,$_POST['city']);
		$usrStatus = mysqli_escape_string($conn,$_POST['status']);
		$usrGender = mysqli_escape_string($conn,$_POST['gender']);
		$usrEmail = mysqli_escape_string($conn,$_POST['email']);
		$usrTelNumber = mysqli_escape_string($conn,$_POST['tel-number']);
		$usrPassword = mysqli_escape_string($conn,$_POST['password']);
		$usrcPassword = mysqli_escape_string($conn,$_POST['c-password']);	

		$password = md5($usrPassword);

		if ($usrPassword != $usrcPassword) {
			$pError = "The two passwords are not the same!";
		}

		$check = "SELECT * FROM users WHERE email = '$usrEmail' ";
		$result = $conn->query($check);
		if ($result->num_rows > 0) {
			$checkError = "Sorry! you have Already registered with this email: '$usrEmail',<br>kindly go back to login page to log into your account, reset your password if forgotten.";
		}
		else{
			$insert = "INSERT INTO users(
			fullName,
			address,
			state,
			city,
			status,
			gender,
			email,
			telNumber,
			password)
			VALUES(
			'$usrName',
			'$usrAddress',
			'$usrState',
			'$usrCity',
			'$usrStatus',
			'$usrGender',
			'$usrEmail',
			'$usrTelNumber',
			'$password'
			)";
			$run = $conn->query($insert);
			if ($run) {
				?>
					<script>
						window.alert("You successfully created an account with PPMS!\n The system will take to login page, so that you can log into your account");
						window.location.href = "user_login.php";
					</script>
				<?php
			}
			else{
				$error = "Something's wrong! <br>".$conn->error;
			}
		}
	}
	$conn->close();
?>

<title>PPMS | Register Party</title>

	<div class="row">
		<div class="user-profile col-sm-6 col-sm-offset-3">
			<div class="logo margin-top-30">
			<a href="register_user.php"><h2> PPMS | Party Registration Form</h2></a>
			</div>

			<div class="box-register">
				<form class="form-register" method="post">
					<fieldset>
						<legend>
							Log into your account
						</legend>
						<p>
							Please enter your Personal Details.<br />
							<center><i>	
								<span style="color:red;">
									<?php
										if ($pError != "") {
											echo $pError;
										}
										elseif ($error != "") {
											echo $error;
										}
										elseif ($checkError != "") {
											echo $checkError;
										}
									?>
								</span>			
							</i></center>
						</p>
						<div class="form-group">
							<input type="text" class="form-control" name="fullName" placeholder="Full Name" required>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="address" placeholder="Address" required>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="state" placeholder="State" required>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="city" placeholder="City" required>
						</div>
						<div class="form-group">
							<label class="block">
								Status/Rank
							</label>
							<div class="clip-checkbox checkbox-primary">
								<input type="checkbox" id="rg-chaiman" name="status" value="Party Chairman" required>
								<label for="rg-chaiman">
									Party Chairman
								</label>
							</div>
						</div>
						<div class="form-group">
							<label class="block">
								Gender
							</label>
							<div class="clip-radio radio-primary">
								<input type="radio" id="rg-female" name="gender" value="female" >
								<label for="rg-female">
									Female
								</label>
								<input type="radio" id="rg-male" name="gender" value="male">
								<label for="rg-male">
									Male
								</label>
							</div>
						</div>
						<p>
							Enter your account details below:
						</p>
						<div class="form-group form-actions">
							<input type="email" class="form-control" name="email" placeholder="Email" required>
						</div>
						<div class="form-group form-actions">
							<input type="tel" class="form-control" name="tel-number" placeholder="Mobile Number" required>
						</div>
						<div class="form-group form-actions">
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>
						<div class="form-group form-actions">
							<input type="password" class="form-control" name="c-password" placeholder=" Confirm Password" required>
						</div>
						<br>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary pull-right" name="register">
								Register <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							Already have an account?
							<a href="user_login.php">
								Log into your account
							</a>
						</div>
					</fieldset>
				</form>

				<div class="copyright">
					&copy; <?php echo date("Y");?><span class="text-bold text-uppercase"> ppms</span>. <span>All rights reserved</span>
				</div>
		
			</div>

		</div>
	</div>
	<style type="text/css">
		.user-profile{
			margin-bottom: 10vh;
		}
		.box-register{
		    border: 1px solid grey;
		    border-radius: 6px;
		    padding: 20px;
		}
		.copyright{
			text-align: center;
		}
	</style>

</body>
</html>
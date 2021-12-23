<?php
	require("db/connection.php");
	include("includes/log_header.php");

	$iD = $_SESSION['usrId'];

	$usrName = $usrAddress = $usrState = $usrCity = $usrStatus = $usrGender = $usrEmail = $usrTelNumber = "";

	$pError = $error = $checkError = "";

	$select = "SELECT * FROM users WHERE usrId = '$iD'";
	$result = $conn->query($select);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_array()) {
			$usrName = $row['fullName'];
			$usrAddress = $row['address'];
			$usrState = $row['state'];
			$usrCity = $row['city'];
			$usrStatus = $row['status'];
			$usrGender = $row['gender'];
			$usrEmail = $row['email'];
			$usrNumber = $row['telNumber'];
		}		
	}

	if (isset($_POST['update'])) {

		$usrName = mysqli_escape_string($conn,$_POST['fullname']);
		$usrAddress = mysqli_escape_string($conn,$_POST['address']);
		$usrState = mysqli_escape_string($conn,$_POST['state']);
		$usrCity = mysqli_escape_string($conn,$_POST['city']);
		$usrStatus = mysqli_escape_string($conn,$_POST['status']);
		$usrGender = mysqli_escape_string($conn,$_POST['gender']);
		$usrEmail = mysqli_escape_string($conn,$_POST['email']);
		$usrTelNumber = mysqli_escape_string($conn,$_POST['tel-number']);
		
		$update = "UPDATE users SET
			fullName = '$usrName',
			address = '$usrAddress',
			state = '$usrState',
			city = '$usrCity',
			status = '$usrStatus',
			gender = '$usrGender',
			email = '$usrEmail',
			telNumber = '$usrTelNumber'
			WHERE usrId = '$iD'";
		$run = $conn->query($update);
		if ($run) {
			?>
				<script>
					window.alert("Your Profile was updated successfully");
							window.location.href = "user_profile.php";
				</script>
			<?php
		}
		else{
			echo "Something's wrong! <br>".$conn->error;
		}
	}
?>
<title>PPMS | User Update Profile</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>USER | PROFILE</p>
		</div>
	</div>

	<div class="row">
		<div class="main-register col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-3">
			<div class="logo margin-top-30">
			<a href="update_profile.php"><h2> PPMS | User Profile Updation Form</h2></a>
			</div>

			<div class="box-register col-sm-12">
				<form class="form-register" method="post">
					<fieldset>
						<legend>
							Profile update
						</legend>
						<p>
							Please enter your Personal Details.<br />
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
						</p>
						<div class="form-group">
							<label class="control-lable">Full Name</label>
							<input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo $usrName ; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Address</label>
							<input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $usrAddress; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">State</label>
							<input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $usrState; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">City</label>
							<input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $usrCity; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Rank/Status</label>
							<input type="text" class="form-control" name="status" placeholder="Rank/Status" value="<?php echo $usrStatus; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Gender</label>
							<input type="text" class="form-control" name="gender" placeholder="Gender" value="<?php echo $usrGender; ?>" required>
						</div>
						<p>
							Enter your account details below:
						</p>
						<div class="form-group form-actions">
							<label class="control-lable">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $usrEmail; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Mobile Number</label>
							<input type="tel" class="form-control" name="tel-number" placeholder="Mobile Number" value="<?php echo $usrNumber; ?>" required>
						</div>
						<br>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary pull-right" name="update">
								Update <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							Back to profile?
							<a href="user_profile.php">
								View Profile
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
		.main-register{
			margin-bottom:;
		}
		.box-register{
			width: 150%;
		    border: 1px solid grey;
		    border-radius: 6px;
		    padding: 20px;
		}
		.copyright{
			text-align: center;
		}
	</style>

<<?php include("includes/footer.php"); ?>
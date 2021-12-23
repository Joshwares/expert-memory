<?php
	require("db/connection.php");
	include("includes/log_header.php");

	$iD = $_SESSION['admId'];

	$admName = $admAddress = $admState = $admCity = $admStatus = $admGender = $admEmail = $admNumber = "";

	$pError = $error = $checkError = "";

	$select = "SELECT * FROM admins WHERE admId = '$iD'";
	$result = $conn->query($select);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_array()) {
			$admName = $row['admFullName'];
			$admAddress = $row['admAddress'];
			$admState = $row['admState'];
			$admCity = $row['admCity'];
			$admStatus = $row['admStatus'];
			$admGender = $row['admGender'];
			$admEmail = $row['admEmail'];
			$admNumber = $row['admTelNumber'];
		}		
	}

	if (isset($_POST['update'])) {

		$admName = mysqli_escape_string($conn,$_POST['fullname']);
		$admAddress = mysqli_escape_string($conn,$_POST['address']);
		$admState = mysqli_escape_string($conn,$_POST['state']);
		$admCity = mysqli_escape_string($conn,$_POST['city']);
		$admStatus = mysqli_escape_string($conn,$_POST['acc_status']);
		$admGender = mysqli_escape_string($conn,$_POST['gender']);
		$admEmail = mysqli_escape_string($conn,$_POST['email']);
		$admNumber = mysqli_escape_string($conn,$_POST['tel-number']);
		
		$update = "UPDATE admins SET
			admFullName = '$admName',
			admAddress = '$admAddress',
			admState = '$admState',
			admCity = '$admCity',
			admStatus = '$admStatus',
			admGender = '$admGender',
			admEmail = '$admEmail',
			admTelNumber = '$admNumber'
			WHERE admId = '$iD'";
		$run = $conn->query($update);
		if ($run) {
			?>
				<script>
					window.alert("Your Profile was updated successfully");
							window.location.href = "admin_profile.php";
				</script>
			<?php
		}
		else{
			echo "Something's wrong! <br>".$conn->error;
		}
	}
?>
<title>PPMS | admin Profile Updation</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>admIN | PROFILE UPDATE</p>
		</div>
	</div>

	<div class="row">
		<div class="main-register col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-3">
			<div class="logo margin-top-30">
			<a href="update_profile.php"><h2> PPMS | admin Profile Updation Form</h2></a>
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
							<input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo $admName; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Address</label>
							<input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $admAddress; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">State</label>
							<input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $admState; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">City</label>
							<input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $admCity; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Gender</label>
							<input type="text" class="form-control" name="gender" placeholder="Gender" value="<?php echo $admGender; ?>" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Account Status</label>
							<input type="text" class="form-control" name="acc_status" placeholder="Account Status" value="<?php echo $admStatus; ?>" required readonly>
						</div>
						<p>
							Enter your account details below:
						</p>
						<div class="form-group form-actions">
							<label class="control-lable">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $admEmail; ?>" required readonly>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Mobile Number</label>
							<input type="tel" class="form-control" name="tel-number" placeholder="Mobile Number" value="<?php echo $admNumber; ?>" required>
						</div>
						<br>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary pull-right" name="update">
								Update <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							Back to profile?
							<a href="admin_profile.php">
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

<?php include("includes/footer.php"); ?>
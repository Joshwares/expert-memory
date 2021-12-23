<?php
	require("db/connection.php");
	include("includes/log_header.php");

	$iD = $_GET['stfId'];

	$stfName = $stfAddress = $stfState = $stfCity = $stfStatus = $stfGender = $stfEmail = $stfNumber = "";

	$pError = $error = $checkError = "";

	$select = "SELECT * FROM staffs WHERE stfId = '$iD'";
	$result = $conn->query($select);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_array()) {
			$stfId = $row['stfId'];
			$stfName = $row['stfFullName'];
			$stfAddress = $row['stfAddress'];
			$stfState = $row['stfState'];
			$stfCity = $row['stfCity'];
			$stfGender = $row['stfGender'];
			$stfEmail = $row['stfEmail'];
			$stfNumber = $row['stfTelNumber'];
		}		
	}

	if (isset($_POST['update'])) {

		$stfName = mysqli_escape_string($conn,$_POST['fullname']);
		$stfAddress = mysqli_escape_string($conn,$_POST['address']);
		$stfState = mysqli_escape_string($conn,$_POST['state']);
		$stfCity = mysqli_escape_string($conn,$_POST['city']);
		$stfGender = mysqli_escape_string($conn,$_POST['gender']);
		$stfEmail = mysqli_escape_string($conn,$_POST['email']);
		$stfNumber = mysqli_escape_string($conn,$_POST['tel-number']);
		
		$update = "UPDATE staffs SET
			stfFullName = '$stfName',
			stfAddress = '$stfAddress',
			stfState = '$stfState',
			stfCity = '$stfCity',
			stfGender = '$stfGender',
			stfEmail = '$stfEmail',
			stfTelNumber = '$stfNumber'
			WHERE stfId = '$iD'";
		$run = $conn->query($update);
		if ($run) {
			?>
				<script>
					window.alert("Your Profile was updated successfully");
					window.location.href = "staff_info.php?stfId=<?php echo $iD; ?>";
				</script>
			<?php
		}
		else{
			echo "Something's wrong! <br>".$conn->error;
		}
	}
?>
<title>PPMS | Staff Profile Updation</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>ADMIN | STAFF PROFILE UPDATE</p>
		</div>
	</div>

	<div class="row">
		<div class="main-register col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-3">
			<div class="logo margin-top-30">
			<a href="update_profile.php"><h2> PPMS | Staff Profile Updation Form</h2></a>
			</div>

			<div class="box-register col-sm-12">
				<form class="form-register" method="post">
					<fieldset>
						<legend>
							Update staff's Profile
						</legend>
						<p>
							Please re-enter staff's Details.<br />
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
						</p>
						<div class="form-group">
							<label class="control-lable">Full Name</label>
							<input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo $stfName; ?>">
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Address</label>
							<input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $stfAddress; ?>">
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">State</label>
							<input type="text" class="form-control" name="state" placeholder="State" value="<?php echo $stfState; ?>">
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">City</label>
							<input type="text" class="form-control" name="city" placeholder="City" value="<?php echo $stfCity; ?>">
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Gender</label>
							<input type="text" class="form-control" name="gender" placeholder="Gender" value="<?php echo $stfGender; ?>">
						</div>
						<p>
							Enter your account details below:
						</p>
						<div class="form-group form-actions">
							<label class="control-lable">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $stfEmail; ?>" required readonly>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Mobile Number</label>
							<input type="tel" class="form-control" name="tel-number" placeholder="Mobile Number" value="<?php echo $stfNumber; ?>">
							<br>
							<p>
								Back to profile?
								<a href="staff_info.php?stfId=<?php echo $iD; ?>">
									View Profile
								</a>
							</p>
						</div>
						
						<div class="form-actions">
							<button type="submit" class="btn btn-primary pull-right" name="update">
								Update <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
							<a href="delete_user.php?stfId=<?php echo $stfId; ?>">
								<p class="btn btn-danger pull-left">
									Delete Acoount <i class="glyphicon glyphicon-remove-sign" style="color: #fff"></i>
								</p>
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
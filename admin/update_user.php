<?php
	include("includes/log_header.php");
	require_once("db/connection.php");

	$ptyId = $ptyCode = $ptyName = $ptyAddress = $ptyState = $ptyCity = $ptyMems = $ptyChairman = $ptyEmail = $ptyNumber = $createDate = $updateDate = "";
	$chkError = "";
	$id = 0;
	$id = $_GET['usrId'];

	//RETREAVING/FETCHING PARTY DETAILS FROM DB.
	$select = "SELECT * FROM users WHERE usrId = '$id'";
	$run = $conn->query($select);

	if ($run->num_rows > 0) {
		while ($row = $run->fetch_array()) {
			$usrId = $row['usrId'];
			$usrName = $row['fullName'];
			$usrAddress = $row['address'];
			$usrState = $row['state'];
			$usrCity = $row['city'];
			$usrStatus = $row['status'];
			$usrGender = $row['gender'];
			$usrEmail = $row['email'];
			$usrNumber = $row['telNumber'];
			$createDate = $row['createDate'];
			$updateDate = $row['updateDate'];
		}
	}
	else{
		echo "Something's wrong!<br>".$conn->error;
	}

	//APPROVAL QUERY
	if (isset($_POST['update'])) {
		$usrName = $_POST['userName'];
		$usrAddress = $_POST['userAddress'];
		$usrState = $_POST['userState'];
		$usrCity = $_POST['userCity'];
		$usrStatus = $_POST['userStatus'];
		$usrGender = $_POST['userGender'];
		$usrEmail = $_POST['userEmail'];
		$usrNumber = $_POST['userNumber'];

		$update = "UPDATE users SET
					fullName = '$usrName',
					address = '$usrAddress',
					state = '$usrState',
					city = '$usrCity',
					status = '$usrStatus',
					gender = '$usrGender',
					email = '$usrEmail',
					telNumber = '$usrNumber'
					WHERE usrId = '$id'";

		$runUpd = $conn->query($update);
		if ($runUpd) {
			?>
				<script>
					window.alert("The profile was updated successfully...");
					window.location.href = "user_info.php?usrId=<?php echo $id; ?>"
				</script>
			<?php
		}
		else{
			echo "Something's wrong!<br>".$conn->error;
		}
	}
?>
<title>PPMS | User Profile update</title>
	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>ADMIN | USER PROFILE UPDATE</p>
		</div>
	</div>

	<div class="row">
		<div class="user-profile col-sm-6 col-sm-offset-3">
			<div class="logo margin-top-30">
			<a href="party.php"><h2> PPMS | User frofile updation form</h2></a>
			</div>

			<div class="box-register">
				<form class="form-register" method="post">
					<fieldset>
						<legend>
							Update user's Profile
						</legend>
						<p>
							Please re-ender user's Details.<br />
							<center>
							<i>
								<span style="color:red;">
									<?php
										if ($chkError != "") {
											echo $chkError;
										}
									?>
									
								</span>
							</i>
						</center>
						</p>
						<div class="form-group">
							<input type="text" class="form-control" name="userName" placeholder="User's Name" value = "<?php echo $usrName; ?>" required>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="userAddress" placeholder="user's Address" value = "<?php echo $usrAddress; ?>" required>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="userState" placeholder="user State" value = "<?php echo $usrState; ?>" required>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="userCity" placeholder="user City" value = "<?php echo $usrCity; ?>" required>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="userStatus" placeholder="Account Status" min="" value = "<?php echo $usrStatus; ?>" required>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="userGender" placeholder="User Chairman" value = "<?php echo $usrGender; ?>" required>
						</div>
						<p>
							Enter account details below:
						</p>
						<div class="form-group form-actions">
							<input type="email" class="form-control" name="userEmail" placeholder="User Email" value = "<?php echo $usrEmail; ?>" required>
						</div>
						<div class="form-group form-actions">
							<input type="tel" class="form-control" name="userNumber" placeholder="Headquater Mobile Number" value = "<?php echo $usrNumber; ?>" required>
							<br>
							<p>
								Cancel Update?
								<a href="user_info.php?usrId=<?php echo $id; ?>">Click here</a>
							</p>
						</div>
						<br>
						<div class="form-actions">
							<button type="submit" class="btn btn-success pull-right" name="update">
								Update <i class="glyphicon glyphicon-arrow-right" style="color: #fff"></i>
							</button>
							<a href="delete_user.php?usrId=<?php echo $id; ?>">
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

<?php include("includes/footer.php"); ?>

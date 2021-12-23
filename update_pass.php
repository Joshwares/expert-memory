<?php
	require_once("db/connection.php");
	include("includes/log_header.php");

	$oldPass = $newPass = $cPass = "";
	$pError = $conError = $error = $chkError = $chkError2 = "";
	$iD = $_SESSION['usrId'];

	if (isset($_POST['change'])) {
		$oldPass = $_POST['old_password'];
		$newPass = $_POST['new_password'];
		$conPass = $_POST['con_password'];
		$oPass = md5($oldPass);
		$nPass = md5($newPass);

		//VERIFY OLD PASSWORD FROM DB
		$check = "SELECT * FROM users WHERE password = '$oPass' ";
		$result = $conn->query($check);

		if ($result->num_rows > 0) {
			if ($newPass != $conPass) {
				$pError = "The new passwords are not the same!";
			}
			else{
				//VERIFY THAT NEW PASSWORD IS NOT THE SAME WITH OLD PASSWORD
				$check2 = "SELECT * FROM users WHERE password = '$nPass' ";
				$result2 = $conn->query($check2);

				if ($result2->num_rows > 0) {
					$chkError2 = "Sorry! You cannot use old password!";
				}
				else{
					$update = "UPDATE users set password = '$nPass' WHERE usrId = '$iD'";
					$run = $conn->query($update);
					if ($run) {
						?>
						<script>
							window.alert("The Password was updated successfully");
							window.location.href = "dashboard.php";
						</script>
					<?php
					}
					else{
						$error = "Something's wrong!<br>".$conn->error;
					}
				}	
			}		
		}
		else{
			$conError = "The old Password is incorrect!";
		}
	}
?>
<title>PPMS | Update Password</title>

	<div class="container-fluid" style="margin-top: 5vh;">
		<div class="dash jumbotron" style="height: 100px;">
			<p>USER | PASSWORD UPDATION</p>
		</div>
	</div>

	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
			<a href="recovery_pass.php"><h2> PPMS | Password Updation</h2></a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Change Login Password
						</legend>
						<p>
							Please Enter your Old Password.<br />
							<center>
								<i>
									<span style="color:red;">
										<?php
											if ($pError != "") {
												echo $pError;
											}
											elseif ($conError != "") {
												echo $conError;
											}
											elseif ($chkError != "") {
												echo $chkError;
											}
											elseif ($chkError2 != "") {
												echo $chkError2;
											}
										?>
										
									</span>
								</i>
							</center>
						</p>
						<div class="form-group">
							<input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="new_password" placeholder="New Password" required>
						</div>
						<div class="form-group form-actions">
							<input type="password" class="form-control" name="con_password" placeholder="Confirm Password" required>
						</div>
						<div class="form-actions">
							
							<button type="submit" class="btn btn-primary pull-right" name="change">
								Create <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							Back to Dashboard?
							<a href="dashboard.php">
								Click Here
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
		.box-login{
		    border: 1px solid grey;
		    border-radius: 6px;
		    padding: 20px;
		}
		.copyright{
			text-align: center;
		}
	</style>

<?php include("includes/footer.php"); ?>
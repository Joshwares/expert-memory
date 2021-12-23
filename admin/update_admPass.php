<?php
	require_once("db/connection.php");
	include("includes/log_header.php");

	//RESTTRICTIN SECONDARY ADMIN FROM GETTING ACCESS TO ADMIN MANAGEMENT
	$accStatus = "Gen. Admin";
	if ($_SESSION['admStatus'] == $accStatus) {

			$admEmail = $newPass = $email = "";
			$pError = $conError = $error = $chkError = $chkError2 = "";
			$iD = $_GET['admId'];

			//RETRIEVING AN ADMIN EMAIL
			$select = "SELECT * FROM admins WHERE admId = '$iD'";
			$result = $conn->query($select);
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_array()) {
					$adEmail = $row['admEmail'];
				}
			}

			
			if (isset($_POST['change'])) {
				$email = $_POST['email'];
				$newPass = $_POST['password'];

				$nPass = md5($newPass);
				
				$update = "UPDATE admins set admPassword = '$nPass' WHERE admEmail = '$email'";
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
			$conn->close();
			include("includes/pass_generator.php");
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
									<input type="email" class="form-control" name="email" placeholder="Admin Email" value="<?php echo $adEmail; ?>" required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="password" placeholder="New Password" value="<?php echo strtoupper($gen_pass); ?>" required>
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
			<?php
			}
			else{
				?>
				<script>
					window.location.href = "dashboard.php";
				</script>
				<?php
			}

?>

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
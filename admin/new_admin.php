<?php
	require_once("../db/connection.php");
	include("includes/log_header.php");

	//RESTTRICTIN SECONDARY ADMIN FROM GETTING ACCESS TO ADMIN MANAGEMENT
	if ($_SESSION['admStatus'] != 'Gen. Admin') {
		header("location:dashboard.php");
	}

	$adEmail = $adStatus = $adPass = "";

	$error = $chkError = "";
	if (isset($_POST['create'])) {
		$adEmail = $_POST['email'];
		$adStatus = $_POST['status'];
		$adPass = $_POST['password'];

		$pass = md5($adPass);

		$check = "SELECT * FROM admins WHERE admEmail = '$adEmail'";
		$result = $conn->query($check);
		if ($result->num_rows > 0) {
			$chkError = "The email is already used!";
		}
		else{
			$insert = "INSERT INTO admins(admFullName,
											admAddress,
											admState,
											admCity,
											admStatus,
											admGender,
											admEmail,
											admTelNumber,
											admPassword)
									VALUES('',
											'',
											'',
											'',
											'$adStatus',
											'',
											'$adEmail',
											'',
											'$pass')";
			
			$run = $conn->query($insert);
			if ($run) {
				?>
					<script>
						window.alert("You have successfully create a new admin account.");
						window.location.href = "admin_list.php";
					</script>
				<?php
			}
			else{
				$error = "Something's wrong!".$conn->error;
			}
		}
	}
	$conn->close();	
?>
<title>PPMS | New Admin</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>ADMIN | CREATE NEW ADMIN</p>
		</div>
	</div>

	<?php include("includes/pass_generator.php"); ?>
	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
			<a href="new_admin.php"><h2> PPMS | New Admin</h2></a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Create New Admin Account
						</legend>
						<p>
							Please Enter Admin's Email.<br />
							<center>
								<i>
									<span style="color:red;">
										<?php
											if ($chkError != "") {
												echo $chkError;
											}
											elseif ($error != "") {
												echo $error;
											}
										?>
										
									</span>
								</i>
							</center>
						</p>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Admin Valid Email" required>
						</div>
						<div class="form-group">
							<select class="form-control" name="status">
								<option>Account Status</option>
								<option value="Gen. Admin">Gen. Admin</option>
								<option value="Sec. Admin">Sec. Admin</option>
							</select>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="password" placeholder="Confirm Password" required readonly value="<?php echo strtoupper($gen_pass) ?>">
						</div>
						<div class="form-actions">
							
							<button type="submit" class="btn btn-primary pull-right" name="create">
								Create <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							Back to Amin Management?
							<a href="ppms_admins.php">
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
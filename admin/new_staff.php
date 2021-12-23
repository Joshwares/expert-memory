<?php
	require_once("../db/connection.php");
	include("includes/log_header.php");

	$sffEmail = $sffStatus = $sffPass = "";

	$error = $chkError = "";
	if (isset($_POST['create'])) {
		$sffEmail = $_POST['email'];
		$sffPass = $_POST['password'];

		$pass = md5($sffPass);

		$check = "SELECT * FROM staffs WHERE stfEmail = '$sffEmail'";
		$result = $conn->query($check);
		if ($result->num_rows > 0) {
			$chkError = "The email is already used!";
		}
		else{
			$insert = "INSERT INTO staffs(stfFullName,
											stfAddress,
											stfState,
											stfCity,
											stfGender,
											stfEmail,
											stfTelNumber,
											stfPassword)
									VALUES('',
											'',
											'',
											'',
											'',
											'$sffEmail',
											'',
											'$pass')";
			
			$run = $conn->query($insert);
			if ($run) {
				?>
					<script>
						window.alert("You have successfully create a new staff account.");
						window.location.href = "staffs_list.php";
					</script>
				<?php
			}
			else{
				$error = "Something's wrong!".$conn->error;
			}
		}
	}
	$conn->close();	
?><title>PPMS | New Staff</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>ADMIN | CREATE NEW STAFF</p>
		</div>
	</div>

	<?php include("includes/pass_generator.php"); ?>
	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
			<a href="new_staff.php"><h2> PPMS | New Staff</h2></a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Create New Staff Account
						</legend>
						<p>
							Please Enter Staff's Email.<br />
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
						</p>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Staff Valid Email" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="password" placeholder="New Password" required readonly value="<?php echo strtoupper($gen_pass) ?>">
						</div>
						<div class="form-actions">
							
							<button type="submit" class="btn btn-primary pull-right" name="create">
								Create <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							Back to Staffs Management?
							<a href="ppms_staffs.php">
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
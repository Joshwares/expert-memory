<?php
	require_once("db/connection.php");
	include("includes/header.php");
	session_start();
	if (isset($_SESSION['stfEmail'])) {
		header("location:dashboard.php");
	}

	$newPass =  $conPass = "";
	$logError = $error = "";

	$id = $_GET['stfId'];

	if (isset($_POST['create'])) {
		$newPass = $_POST['new_password'];
		$conPass = $_POST['con_password'];

		$pass = md5($newPass);
		

		$update = "UPDATE staffs SET stfPassword = '$pass' WHERE stfId = '$id' ";
		$run = $conn->query($update);

		if ($run) {
			?>
				<script>
					window.alert("You have succefully reset your login password! \n Kindly use it to log into your account...");
					window.location.href = "staff_login.php";
				</script>
			<?php
		}
		else{
			$logError = "Invalid Name or Email";
		}
	}
	$conn->close();
?>
 <title>PPMS | New Password</title>

	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
			<a href="recovery_pass.php"><h2> PPMS | Staff Password Recovery</h2></a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Create New Password
						</legend>
						<p>
							Please create new Password.<br />
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
						</p>
						<div class="form-group">
							<input type="password" class="form-control" name="new_password" placeholder="New Password" required>
						</div>
						<div class="form-group form-actions">
							<input type="password" class="form-control" name="con_password" placeholder="Confirm Password" required>
						</div>
						<div class="form-actions">
							
							<button type="submit" class="btn btn-primary pull-right" name="create">
								Create <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							Back to login page?
							<a href="staff_login.php">
								Log in
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

</body>
</html>
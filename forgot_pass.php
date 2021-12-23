<?php
	require_once("db/connection.php");
	include("includes/header.php");

	$usrEmail =  $usrName = "";
	$logError = $error = "";

	if (isset($_POST['verify'])) {
		$usrName = $_POST['fullname'];
		$usrEmail = $_POST['email'];
		

		$select = "SELECT * FROM users WHERE fullName = '$usrName' AND email = '$usrEmail' ";
		$run = $conn->query($select);

		if ($run->num_rows > 0) {
			while ($row = $run->fetch_array()) {
				$uId = $row['usrId'];
			}
			?>
				<script>
					window.alert("Your Details are validated! \n You can reset your Password now...");
					window.location.href = "recovery_pass.php?usrId=<?php echo $uId; ?>";
				</script>
			<?php
		}
		else{
			$logError = "Invalid Name or Email";
		}
	}
	$conn->close();
?>
<title>PPMS | Password Recovery</title>

	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
			<a href="forgot_pass.php"><h2> PPMS | Party Password Recovery</h2></a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Password Recovery
						</legend>
						<p>
							Please enter your Full Name and Email to recover your Password.<br />
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
						</p>
						<div class="form-group">
							<input type="text" class="form-control" name="fullname" placeholder="Registered Full Name" required>
						</div>
						<div class="form-group form-actions">
							<input type="email" class="form-control" name="email" placeholder="Registered Email" required>
						</div>
						<div class="form-actions">
							
							<button type="submit" class="btn btn-primary pull-right" name="verify">
								Recover <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							Don't have an account yet?
							<a href="register_party.php">
								Create an account
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
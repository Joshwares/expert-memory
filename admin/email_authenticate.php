<?php
	require_once("../db/connection.php");
	include("includes/header.php");
	session_start();
	if (isset($_SESSION['admEmail'])) {
		header("location:dashboard.php");
	}

	$logEmail = "";
	$mailError = $error = "";

	if (isset($_POST['recover'])) {
		$logEmail = $_POST['email'];

		$check = "SELECT * FROM admins WHERE admEmail = '$logEmail'";
		$run = $conn->query($check);

		if ($run->num_rows > 0) {
			?>
				<script>
					window.location.href = "forgot_pass.php";
				</script>
			<?php
		}
		else{
			$mailError = "Invalid Email!";
		}
	}
	$conn->close();
?>
<title>PPMS | Email Verifying</title>

	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
			<a href="forgot_pass.php"><h2> PPMS | Admin Email Verifying</h2></a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Emaial Authentication
						</legend>
						<p>
							Please enter the Valid Gen. Admin Email to reset the Password.<br />
							<center>
								<i>
									<span style="color:red;">
										<?php
											if ($mailError != "") {
												echo $mailError;
											}
											elseif ($error != "") {
												echo $error;
											}
										?>
										
									</span>
								</i>
							</center>
						</p>
						<div class="form-group form-actions">
							<input type="email" class="form-control" name="email" placeholder="Registered Email" required>
						</div>
						<div class="form-actions">	
							<button type="submit" class="btn btn-primary pull-right" name="recover">
								Recover <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							<a href="index.php">
								Back to Login ?
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
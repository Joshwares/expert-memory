<?php
	require_once("db/connection.php");
	include("includes/header.php");
	session_start();
	if (isset($_SESSION['admEmail'])) {
		header("location:dashboard.php");
	}

	$usrEmail =  $usrPass = $password = "";
	$logError = $error = "";

	if (isset($_POST['login'])) {
		$lgnEmail = $_POST['email'];
		$lgnPass = $_POST['password'];

		$password = md5($lgnPass);

		$select = "SELECT * FROM admins WHERE admEmail = '$lgnEmail' AND admPassword = '$password' ";
		$run = $conn->query($select);

		if ($run->num_rows > 0) {
			while ($row = $run->fetch_array()) {
				$_SESSION['admId'] = $uId = $row['admId'];
				$_SESSION['admEmail'] = $uEmail = $row['admEmail'];
				$_SESSION['admStatus'] = $uStatus = $row['admStatus'];
			}
			?>
				<script>
					window.alert("You have loged in successfully! \n Welcome back Mr/Mrs Admin...");
					window.location.href = "dashboard.php";
				</script>
			<?php
			//header("location: dashboard.php");
		}
		else{
			$logError = "Invalid Email or Password";
		}

	}
	$conn->close();
?>
<title>PPMS | Admin Login</title>

	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
			<a href="parties_login.php"><h2> PPMS | Admin Login</h2></a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Log-in
						</legend>
						<p>
							Please enter your Email and Password to log in.<br />
							<center>
								<i>
									<span style="color:red;">
										<?php
											if ($logError != "") {
												echo $logError;
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
							<input type="email" class="form-control" name="email" placeholder="Email" required>
						</div>
						<div class="form-group form-actions">
							<input type="password" class="form-control password" name="password" placeholder="Password" required>
							<br>
							<a href="email_authenticate.php">
								Forgot Password ?
							</a>
						</div>
						<div class="form-actions">
							
							<button type="submit" class="btn btn-primary pull-right" name="login">
								Login <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
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
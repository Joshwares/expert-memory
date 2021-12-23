<?php
	require_once("../db/connection.php");
	include("includes/header.php");
	session_start();
	if (isset($_SESSION['admEmail'])) {
		header("location:dashboard.php");
	}

?>
<title>PPMS | Password Resetting</title>

	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
			<a href="forgot_pass.php"><h2> PPMS | Admin Password Resetting</h2></a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post" action="">
					<fieldset>
						<legend>
							Reset Default Password
						</legend>
						<p>
							Are you sure you want to reset <b>Admin</b> login details?<br />
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
						</p>
						<div class="form-group note">
							Once you reset the admin details, the changed <b>email</b> and <b>password</b> are going to be reseted, which you will not be able to login again if you don't have the <b>"Admin default login Details"</b>
						</div>
						<div class="form-group">
							<a href="recover_pass.php"><p class="btn btn-danger btn-md pull-right">Reset</p></a>
						</div>
						<div class="new-account" style="font-size: 17px">
							Don't want to rest Password?
							<a href="index.php">
								Cancel
							</a>
						</div>
					</fieldset>
				</form>
				<br>

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
		.note,p{
			font-size: 18px;
			text-align: justify;
		}
		.copyright{
			text-align: center;
		}
	</style>

</body>
</html>
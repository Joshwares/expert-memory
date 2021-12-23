<?php include("includes/log_header.php"); ?>
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
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
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
							
							<button type="submit" class="btn btn-primary pull-right" name="create">
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
<?php include("includes/log_header.php"); ?>
<title>PPMS | Staff Profile Updation</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>STAFF | PROFILE UPDATE</p>
		</div>
	</div>

	<div class="row">
		<div class="main-register col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-3">
			<div class="logo margin-top-30">
			<a href="update_profile.php"><h2> PPMS | Staff Profile Updation Form</h2></a>
			</div>

			<div class="box-register col-sm-12">
				<form class="form-register" method="post">
					<fieldset>
						<legend>
							Profile update
						</legend>
						<p>
							Please enter your Personal Details.<br />
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
						</p>
						<div class="form-group">
							<label class="control-lable">Full Name</label>
							<input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Address</label>
							<input type="text" class="form-control" name="address" placeholder="Address" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">State</label>
							<input type="text" class="form-control" name="state" placeholder="State" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">City</label>
							<input type="text" class="form-control" name="city" placeholder="City" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Gender</label>
							<input type="text" class="form-control" name="city" placeholder="Gender" required>
						</div>
						<p>
							Enter your account details below:
						</p>
						<div class="form-group form-actions">
							<label class="control-lable">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" required>
						</div>
						<div class="form-group form-actions">
							<label class="control-lable">Mobile Number</label>
							<input type="tel" class="form-control" name="tel-number" placeholder="Mobile Number" required>
						</div>
						<br>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary pull-right" name="update">
								Update <i class="glyphicon glyphicon-circle-arrow-right"></i>
							</button>
						</div>
						<div class="new-account">
							Back to profile?
							<a href="staff_profile.php">
								View Profile
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
		.main-register{
			margin-bottom:;
		}
		.box-register{
			width: 150%;
		    border: 1px solid grey;
		    border-radius: 6px;
		    padding: 20px;
		}
		.copyright{
			text-align: center;
		}
	</style>

<?php include("includes/footer.php"); ?>
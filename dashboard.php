<?php include("includes/log_header.php"); ?>
<link rel="stylesheet" type="text/css" href="includes/css/dashboard.css">
<title>PPMS | User Dashboard</title>
	<div class="container-fluid" style="margin-top: 6vh;">
		<div class="dash jumbotron" style="height: 100px;">
			<p>USER | DASHBOARD</p>
		</div>
	</div>

	<div class="container col-sm-offset-2">
		
		<div class="row " style="margin-top: 20vh; margin-bottom: 10vh;">
			<div class="profile col-sm-5">
				<span class="dash glyphicon glyphicon-user"></span>&nbsp; 
				<p>My Profile</p>
				<a href="user_profile.php">Update Profile</a>
			</div>

			<div class="col-sm-1"></div>

			<div class="party col-sm-5">
				<span class="dash glyphicon glyphicon-tasks"></span>&nbsp; 
				<p>Manage Party</p>
				<a href="register_party.php">View Party</a>
			</div>
		</div>	

	</div>



<?php include("includes/footer.php"); ?>
<?php include("includes/log_header.php"); ?>
<link rel="stylesheet" type="text/css" href="includes/css/dashboard.css">
<title>PPMS | Staff Dashboard</title>
	<div class="container-fluid" style="margin-top: 6vh;">
		<div class="dash jumbotron" style="height: 100px;">
			<p>STAFF | DASHBOARD</p>
		</div>
	</div>

	<div class="container col-sm-offset-2">
		
		<div class="row " style="margin-top: 20vh; margin-bottom: 10vh;">
			<div class="profile col-sm-3">
				<span class="dash glyphicon glyphicon-user"></span>&nbsp; 
				<p>My Profile</p>
				<a href="staff_profile.php">Update Profile</a>
			</div>

			<div class="party col-sm-3">
				<span class="dash glyphicon glyphicon-question-sign"></span>&nbsp; 
				<p>Endorse Parties</p>
				<a href="endorse_parties.php">Check Parties</a>
			</div>

			<div class="party col-sm-3">
				<span class="dash glyphicon glyphicon-ok-sign"></span>&nbsp; 
				<p>Approved Parties</p>
				<a href="approved_parties.php">View Parties</a>
			</div>

			<div class="party col-sm-3">
				<span class="dash glyphicon glyphicon-remove-sign"></span>&nbsp; 
				<p>Rejected Parties</p>
				<a href="rejected_parties.php">View Parties</a>
			</div>
		</div>	

	</div>



<?php include("includes/footer.php"); ?>
<?php include("includes/log_header.php"); ?>
<link rel="stylesheet" type="text/css" href="includes/css/dashboard.css">
<title>PPMS | PPMS Staffs</title>
	<div class="container-fluid" style="margin-top: 6vh;">
		<div class="dash jumbotron" style="height: 100px;">
			<p>USER | SYSTEM STAFFS</p>
		</div>
	</div>

	<div class="container col-sm-offset-2">
		
		<div class="row " style="margin-top: 20vh; margin-bottom: 10vh;">
			<div class="profile col-sm-5">
				<span class="dash glyphicon glyphicon-user"></span>&nbsp; 
				<p>PPMS Staffs</p>
				<a href="staffs_list.php">View Staffs</a>
			</div>

			<div class="col-sm-1"></div>

			<div class="party col-sm-5">
				<span class="dash glyphicon glyphicon-user"></span>&nbsp;
				<span class="dash glyphicon glyphicon-plus"></span>&nbsp;
				<p>Add New Staff</p>
				<a href="new_staff.php">Create Staff</a>
			</div>
		</div>	

	</div>



<?php include("includes/footer.php"); ?>
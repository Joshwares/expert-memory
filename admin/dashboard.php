<?php
	include("includes/log_header.php");

	$accStatus = "Gen. Admin";
	$adEmail = $_SESSION['admEmail'];
?>
<link rel="stylesheet" type="text/css" href="includes/css/dashboard.css">
<title>PPMS | Admin Dashboard</title>
	<div class="container-fluid" style="margin-top: 6vh;">
		<div class="dash jumbotron" style="height: 100px;">
			<p>ADMIN | DASHBOARD</p>
		</div>
	</div>

	<div class="container-fluid col-sm-offset-1">
		
		<div class="row " style="margin-top: 20vh; margin-bottom: 10vh;">
			<div class="profile col-sm-2" style="width:">
				<span class="dash glyphicon glyphicon-user"></span>&nbsp; 
				<p>My Profile</p>
				<a href="admin_profile.php">Update Profile</a>
			</div>

			<div class="col-sm-1"></div>

			<div class="party col-sm-2" style="width: ">
				<span class="dash glyphicon glyphicon-question-sign"></span>&nbsp; 
				<p>Endorse Parties</p>
				<a href="endorse_parties.php">Check Parties</a>
			</div>

			<div class="col-sm-1"></div>

			<div class="party col-sm-2" style="width: ">
				<span class="dash glyphicon glyphicon-ok-sign"></span>&nbsp; 
				<p>Approved Parties</p>
				<a href="approved_parties.php">View Parties</a>
			</div>

			<div class="col-sm-1"></div>

			<div class="party col-sm-2" style="width: ">
				<span class="dash glyphicon glyphicon-remove-sign"></span>&nbsp; 
				<p>Rejected Parties</p>
				<a href="rejected_parties.php">View Parties</a>
			</div>
		</div>	

	</div>

	<div class="container col-sm-offset-2">

		<?php 

			if ($_SESSION['admStatus'] == $accStatus) {
				?>
				<div class="row " style="margin-bottom: 10vh;">
					<div class="profile col-sm-3">
						<span class="dash glyphicon glyphicon-user"></span>&nbsp; 
						<p>Regitered Users</p>
						<a href="users_list.php">View Users</a>
					</div>

					<div class="col-sm-1"></div>
				
					<div class="profile col-sm-3">
						<span class="dash glyphicon glyphicon-user"></span>&nbsp;
						<span class="dash glyphicon glyphicon-plus"></span>&nbsp;
						<p>New Admin</p>
						<a href="ppms_admins.php">Manage Admins</a>
					</div>

					<div class="col-sm-1"></div>

					<div class="party col-sm-3">
						<span class="dash glyphicon glyphicon-user"></span>&nbsp; 
						<span class="dash glyphicon glyphicon-plus"></span>&nbsp; 
						<p>New Staff</p>
						<a href="ppms_staffs.php">Manage Staffs</a>
					</div>
				</div>
				<?php
			}
			else{
				?>
				<div class="row " style="margin-bottom: 10vh;">
					<div class="profile col-sm-5">
						<span class="dash glyphicon glyphicon-user"></span>&nbsp; 
						<p>Regitered Users</p>
						<a href="users_list.php">View Users</a>
					</div>

					<div class="col-sm-1"></div>

					<div class="party col-sm-5">
						<span class="dash glyphicon glyphicon-user"></span>&nbsp; 
						<span class="dash glyphicon glyphicon-plus"></span>&nbsp; 
						<p>New Staff</p>
						<a href="ppms_staffs.php">Manage Staffs</a>
					</div>
				</div>
				<?php
			}

		?>


	</div>



<?php include("includes/footer.php"); ?>
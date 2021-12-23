<?php
	include("includes/log_header.php");
	require_once("db/connection.php");

	//RESTTRICTIN SECONDARY ADMIN FROM GETTING ACCESS TO ADMIN MANAGEMENT
	$accStatus = "Gen. Admin";
	if ($_SESSION['admStatus'] == $accStatus) {
		?>
		<link rel="stylesheet" type="text/css" href="includes/css/dashboard.css">
		<title>PPMS | PPMS Admins</title>
			<div class="container-fluid" style="margin-top: 6vh;">
				<div class="dash jumbotron" style="height: 100px;">
					<p>ADMIN | SYSTEM ADMINS</p>
				</div>
			</div>

			<div class="container col-sm-offset-2">
				
				<div class="row " style="margin-top: 20vh; margin-bottom: 10vh;">
					<div class="profile col-sm-5">
						<span class="dash glyphicon glyphicon-user"></span>&nbsp; 
						<p>PPMS Admins</p>
						<a href="admin_list.php">View Admins</a>
					</div>

					<div class="col-sm-1"></div>

					<div class="party col-sm-5">
						<span class="dash glyphicon glyphicon-user"></span>&nbsp;
						<span class="dash glyphicon glyphicon-plus"></span>&nbsp;
						<p>Add New Admin</p>
						<a href="new_admin.php">Create Admin</a>
					</div>
				</div>	

			</div>
			<?php
	}
	else{
		?>
		<script>
			window.location.href = "dashboard.php";
		</script>
		<?php
	}

?>
		



<?php include("includes/footer.php"); ?>
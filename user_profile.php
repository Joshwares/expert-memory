<?php
	require_once("db/connection.php");
	include("includes/log_header.php");

	$iD = $_SESSION['usrId'];

	$select = "SELECT * FROM users WHERE usrId = '$iD'";
	$run = $conn->query($select);

	if ($run->num_rows > 0) {
		while ($row = $run->fetch_array()) {
			$usrName = $row['fullName'];
			$usrAddress = $row['address'];
			$usrState = $row['state'];
			$usrCity = $row['city'];
			$usrStatus = $row['status'];
			$usrGender = $row['gender'];
			$usrEmail = $row['email'];
			$usrNumber = $row['telNumber'];
			$createDate = $row['createDate'];
			$updateDate = $row['updateDate'];
		}
	}
?>
<title>PPMS | User Profile</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>USER | PROFILE</p>
		</div>
	</div>

	<div class="container" style="margin-top: 5vh;">
		<div class="user-profile col-sm-8 col-sm-offset-2">
			<p>Profile Display</p>
			<address>
				Username's Profile <br>
				<b>Account Reg. Date:</b> <?php echo $createDate; ?> <br>
				<b>Account Last Update. Date:</b> <?php echo $updateDate; ?> <br>
			</address>
			<table class="table table-responsive col-sm-12">
				<tr>
					<td><b>FULL NAME:</b></td>
					<td><?php echo $usrName; ?></td>
				</tr>
				<tr>
					<td><b>ADDRESS:</b></td>
					<td><?php echo $usrAddress; ?></td>
				</tr>
				<tr>
					<td><b>STATE:</b></td>
					<td><?php echo $usrState; ?></td>
				</tr>
				<tr>
					<td><b>CITY:</b></td>
					<td><?php echo $usrCity; ?></td>
				</tr>
				<tr>
					<td><b>RANK/STATUS:</b></td>
					<td><?php echo $usrStatus; ?></td>
				</tr>
				<tr>
					<td><b>GENDER:</b></td>
					<td><?php echo $usrGender; ?></td>
				</tr>
				<tr>
					<td><b>EMAIL</b></td>
					<td><?php echo $usrEmail; ?></td>
				</tr>
				<tr>
					<td><b>PHONE NUMBER</b></td>
					<td><?php echo $usrNumber; ?></td>
				</tr>
			</table>
			<a href="update_profile.php"><button class="btn pull-right btn-md btn-info">Update Profile</button></a>
		</div>
	</div>
	<style type="text/css">
		.user-profile{
		    padding: 10px;
		    border: 1px solid grey;
		    border-radius: 6px;
		    background-color: whitesmoke;
		}
	</style>

<?php include("includes/footer.php"); ?>
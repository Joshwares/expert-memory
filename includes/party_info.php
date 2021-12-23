<?php
	//include("includes/log_header.php");
	//require_once("db/connection.php");

	$approve = "";
	

	$select = "SELECT * FROM approvedParties WHERE usrId = '$iD'";
	$run = $conn->query($select);

	if ($run->num_rows > 0) {
		while ($row = $run->fetch_array()) {
			$ptyId = $row['partId'];
			$ptyCode = $row['partCode'];
			$ptyName = $row['partName'];
			$ptyAddress = $row['partAddress'];
			$ptyState = $row['partState'];
			$ptyCity = $row['partCity'];
			$ptyMems = $row['partMembers'];
			$ptyChairman = $row['partChairman'];
			$ptyEmail = $row['partEmail'];
			$ptyNumber = $row['partTelNumber'];
			$createDate = $row['createDate'];
			$updateDate = $row['updateDate'];
		}
	}
	else{
		echo "Something's wrong!<br>".$conn->error;
	}

	$checkApprove = "SELECT * FROM approvedParties WHERE partId = '$ptyId'";
	$popApprove = $conn->query($checkApprove);

	if ($popApprove) {
		$approve = "Approved";
	}

?>

	<p>Profile Info</p>
	<address>
		Party's Profile <br>
		<b>Account Reg. Date:</b><?php echo $createDate; ?><br>
		<b>Account Last Update. Date:</b> <?php echo $updateDate; ?> <br>
	</address>
	<table class="table table-responsive col-sm-12">
		<tr>
			<td><b>ACCOUNT STATUS:</b></td>
			<td class="text text-success"><b><?php echo $approve; ?> </b></td>
		</tr>
		<tr>
			<td><b>PARTY CODE:</b></td>
			<td><?php echo $ptyCode; ?></td>
		</tr>
		<tr>
			<td><b>PARTY NAME:</b></td>
			<td><?php echo $ptyName; ?></td>
		</tr>
		<tr>
			<td><b>ADDRESS:</b></td>
			<td><?php echo $ptyAddress; ?></td>
		</tr>
		<tr>
			<td><b>STATE:</b></td>
			<td><?php echo $ptyState; ?></td>
		</tr>
		<tr>
			<td><b>CITY:</b></td>
			<td><?php echo $ptyCity; ?></td>
		</tr>
		<tr>
			<td><b>TOTOAL MEMBERS:</b></td>
			<td><?php echo $ptyMems; ?></td>
		</tr>
		<tr>
			<td><b>CHAIRMAN:</b></td>
			<td><?php echo $ptyChairman; ?></td>
		</tr>
		<tr>
			<td><b>EMAIL</b></td>
			<td><?php echo $ptyEmail; ?></td>
		</tr>
		<tr>
			<td><b>PHONE NUMBER</b></td>
			<td><?php echo $ptyNumber; ?></td>
		</tr>
	</table>
			<a href="includes/update_party.php?usrId=<?php echo $iD; ?>"><button class="btn pull-right btn-md btn-info">Edit Profile</button></a>
	<style type="text/css">
		.user-profile{
		    padding: 10px;
		    border: 1px solid grey;
		    border-radius: 6px;
		    background-color: whitesmoke;
		}
	</style>


<?php
	include("includes/log_header.php");
	require_once("db/connection.php");
	$id = 0;
	$id = $_GET['partId'];

	$select1 = "SELECT * FROM endorseParties WHERE partId = '$id'";
	$select2 = "SELECT * FROM approvedParties WHERE partId = '$id'";
	$select3 = "SELECT * FROM rejectedParties WHERE partId = '$id'";
	$run1 = $conn->query($select1);
	$run2 = $conn->query($select2);
	$run3 = $conn->query($select3);

	if (($run1)->num_rows > 0) {
		while ($row = ($run1.$run2.$run3)->fetch_array()) {
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


	$checkEndorse = "SELECT * FROM endorseParties WHERE partId = '$ptyId'";
	$popEndorse = $conn->query($checkEndorse);

	$checkApprove = "SELECT * FROM approvedParties WHERE partId = '$ptyId'";
	$popApprove = $conn->query($checkApprove);

	$checkReject = "SELECT * FROM rejectedParties WHERE partId = '$ptyId'";
	$popReject = $conn->query($checkReject);


?>
<title>PPMS | Party Info</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>ADMIN | PARTY INFORMATION</p>
		</div>
	</div>

	<div class="container" style="margin-top: 5vh;">
		<div class="user-profile col-sm-8 col-sm-offset-2">
			<p>Profile Info</p>
			<address>
				Party's Profile <br>
				<b>Account Reg. Date:</b> 29/04/2021 15:10 <br>
				<b>Account Last Update. Date:</b> 00/00/0000 00:00 <br>
			</address>
			<table class="table table-responsive col-sm-12">
				<tr>
					<td><b>ACCOUNT STATUS:</b></td>
					<td class=""><b>
						<?php
							if ($popEndorse->num_rows > 0) {
								 echo "<span class = 'text text-info'>Pending</span>";
							}
							elseif ($popApprove->num_rows > 0) {
								echo "<span class = 'text text-success'>Approved</span>";
							}
							elseif ($popReject->num_rows > 0) {
								echo "<span class = 'text text-danger'>Rejected</span>";
							}
						?>	
					</b></td>
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
			<a href="party.php?partId=<?php echo $ptyId; ?>"><button class="btn pull-right btn-md btn-info">Action</button></a>
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
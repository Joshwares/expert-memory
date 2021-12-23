<?php
	include("includes/log_header.php");
	require_once("db/connection.php");

	$ptyId = $ptyCode = $ptyName = $ptyAddress = $ptyState = $ptyCity = $ptyMems = $ptyChairman = $ptyEmail = $ptyNumber = $createDate = $updateDate = "";
	$sn = 0;

	$select = "SELECT * FROM approvedParties ORDER BY usrId ASC";
	$run = $conn->query($select);

?>
<title>PPMS | Approved Parties</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh; overflow">
			<p>STAFF | APPROVED PARTIES</p>
		</div>
	</div>

	<div class="container col-sm-12">
		<h2>List of Approved Parties</h2>
		<div class="table-list col-sm-10 col-sm-offset-1">

			<table class="table table-striped table-responsive table-hover" style="margin-bottom: 0;">
				<thead>
					<th>S/N</th>
					<th>Party Code</th>
					<th>Party Name</th>
					<th>Party Address</th>
					<th>Party State</th>
					<th>Party City</th>
					<th>Party Members</th>
					<th>Party Chairman</th>
					<th>Party Email</th>
					<th>Party Mobile No.</th>
					<th>Action</th>
				</thead>
			<?php
				if ($run->num_rows > 0) {
					while ($row = $run->fetch_array()) {
						$sn = $sn + 1;
						$ptyId = $row['partId'];
						?>
							<tbody>
								<tr>
									<td><?php echo $sn; ?></td>
									<td><?php echo $row['partCode']; ?></td>
									<td><?php echo $row['partName']; ?></td>
									<td><?php echo $row['partAddress']; ?></td>
									<td><?php echo $row['partState']; ?></td>
									<td><?php echo $row['partCity']; ?></td>
									<td><?php echo $row['partMembers']; ?></td>
									<td><?php echo $row['partChairman']; ?></td>
									<td><?php echo $row['partEmail']; ?></td>
									<td><?php echo $row['partTelNumber']; ?></td>
									<td><a href="appParty_info.php?partId=<?php echo $ptyId; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
								</tr>
							</tbody>
						<?php
					}
				}
				else{
					echo "<h4 class = 'text text-center'>The Table is Empty</h4>";
				}
			?>
		</table>
		</div>
	</div>

	<style type="text/css">
		h2{
			text-align: center;
			text-decoration: underline;
		}
		.table-heading{
			margin-top: 20px;
		}
		.table-list{
			padding: 10px;
		    border: 1px solid grey;
		    border-radius: 6px;
		    height: 600px;
		    overflow-y: scroll;
		}
		.table-list{
		    
		}
	</style>

<<?php include("includes/footer.php") ?>
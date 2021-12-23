<?php
	include("includes/log_header.php");
	require_once("db/connection.php");

	$ptyId = $ptyCode = $ptyName = $ptyAddress = $ptyState = $ptyCity = $ptyMems = $ptyChairman = $ptyEmail = $ptyNumber = $createDate = $updateDate = "";
	$sn = 0;

	$select = "SELECT * FROM endorseParties ORDER BY usrId ASC";
	$run = $conn->query($select);
?>
<title>PPMS | Endorse Parties</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh; overflow">
			<p>STAFF | PARTIES TO APPROVE</p>
		</div>
	</div>

	<div class="container col-sm-12">
		<h2>List of Endorse Parties</h2>
		<div class="table-list col-sm-10 col-sm-offset-1">

			<table class="table table-striped table-responsive table-hover" style="margin-bottom: 0;">
				<thead>
					<th class="col-sm-1">S/N</th>
					<th class="col-sm-2">Party Code</th>
					<th class="col-sm-3">Party Name</th>
					<th class="col-sm-3">Party Chairman</th>
					<th class="col-sm-2">Party Members</th>
					<th class="col-sm-1">Action</th>
				</thead>			
				<?php
				if ($run->num_rows > 0) {
					while ($row = $run->fetch_array()) {
						$ptyId = $row['partId'];
						$sn = (int)$sn + 1;
						?>
							<tbody>
								<tr>
									<td class="col-sm-1"><?php echo $sn; ?></td>
									<td class="col-sm-2"><?php echo $row['partCode']; ?></td>
									<td class="col-sm-3"><?php echo $row['partName']; ?></td>
									<td class="col-sm-3"><?php echo $row['partChairman']; ?></td>
									<td class="col-sm-2"><?php echo $row['partMembers']; ?></td>
									<td class="col-sm-1"><a href="endParty_info.php?partId=<?php echo $ptyId; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
								</tr>
							</tbody>
						<?php
					}
				}
				else{
					//echo "<h4 class = 'text text-center'>The Table is Empty</h4>";
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

<<?php include("includes/footer.php"); ?>
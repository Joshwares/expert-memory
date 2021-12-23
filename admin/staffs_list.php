<?php
	include("includes/log_header.php");
	require_once("db/connection.php");

	$adId = $adName = $adAddress = $adState = $adCity = $adStatus = $adGender = $adEmail = $adNumber = $createDate = $updateDate = "";
	$sn = 0;

	$select = "SELECT * FROM staffs ORDER BY stfId ASC";
	$run = $conn->query($select);

?>
<title>PPMS | PPMS Staffs List</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh; overflow">
			<p>ADMIN | STAFFS LIST</p>
		</div>
	</div>

	<div class="container col-sm-12">
		<div class="row col-sm-10 col-sm-offset-1">

			<h2>List of All Staffs</h2>

			<table class="table table-striped table-responsive table-hover" style="margin-bottom: 0;">
				<thead class="table-heading">
					<tr>
						<th>S/N</th>
						<th>Staff Full Name</th>
						<th>Staff Address</th>
						<th>Staff State</th>
						<th>Staff City</th>
						<th>Staff Gender</th>
						<th>Staff Email</th>
						<th>Staff Mobile No.</th>
						<th>Action</th>
					</tr>		
				</thead>
				<?php
					if ($run->num_rows > 0) {
						while ($row = $run->fetch_array()) {
							$sn = $sn + 1;
							$sffId = $row['stfId'];
							?>
							<tbody>
								<tr>
									<td><?php echo $sn; ?></td>
									<td><?php echo $row['stfFullName']; ?></td>
									<td><?php echo $row['stfAddress']; ?></td>
									<td><?php echo $row['stfState']; ?></td>
									<td><?php echo $row['stfCity']; ?></td>
									<td><?php echo $row['stfGender']; ?></td>
									<td><?php echo $row['stfEmail']; ?></td>
									<td><?php echo $row['stfTelNumber']; ?></td>
									<td><a href="staff_info.php?stfId=<?php echo $sffId; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
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
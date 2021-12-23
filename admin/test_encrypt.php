<?php
	include("includes/header.php");
	require_once("db/connection.php");

	$adId = $adName = $adAddress = $adState = $adCity = $adStatus = $adGender = $adEmail = $adNumber = $createDate = $updateDate = "";
	$sn = 0;

	$select = "SELECT * FROM admins  ORDER BY admId ASC";
	$run = $conn->query($select);

?>
<title>PPMS | PPMS Admins</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh; overflow">
			<p>ADMIN | ADMINS</p>
		</div>
	</div>

	<div class="container col-sm-12">
		

			<h2>List of All Admins</h2>
	<div class="table-list col-sm-10 col-sm-offset-1">
			<table class="table" style="margin-bottom: 0;">
				<thead class="table-heading">
					<th>S/N</th>
					<th>Admin Full Name</th>
					<th>Admin Address</th>
					<th>Admin State</th>
					<th>Admin City</th>
					<th>Acount Status</th>
					<th>Admin Gender</th>
					<th>Admin Email</th>
					<th>Admin Mobile No.</th>
					<th>Action</th>
				</thead>
			<?php
				if ($run->num_rows > 0) {
					while ($row = $run->fetch_array()) {
						$sn = $sn + 1;
						$adId = $row['admId'];
						?>
						<div class="table-">
							<tbody class="">
								<tr>
									<td><?php echo $sn; ?></td>
									<td><?php echo $row['admFullName']; ?></td>
									<td><?php echo $row['admAddress']; ?></td>
									<td><?php echo $row['admState']; ?></td>
									<td><?php echo $row['admCity']; ?></td>
									<td><?php echo $row['admStatus']; ?></td>
									<td><?php echo $row['admGender']; ?></td>
									<td><?php echo $row['admEmail']; ?></td>
									<td><?php echo $row['admTelNumber']; ?></td>
									<td><a href="admin_info.php?admId=<?php echo $adId; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
								</tr>
							</tbody>
						</div>	
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
		    height: 100px;
		    overflow-y: scroll;
		}
		.table-list{
		    
		}
	</style>

<<?php include("includes/footer.php") ?>
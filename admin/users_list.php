<?php
	include("includes/log_header.php");
	require_once("db/connection.php");

	$ptyId = $ptyCode = $ptyName = $ptyAddress = $ptyState = $ptyCity = $ptyMems = $ptyChairman = $ptyEmail = $ptyNumber = $createDate = $updateDate = "";
	$sn = 0;

	$select = "SELECT approvedParties.*, users.* FROM users 
	INNER JOIN approvedParties ON 
	users.usrId = approvedParties.usrId
	ORDER BY users.usrId ASC ";
	$run = $conn->query($select);

?>
<title>PPMS | PPMS Users List</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh; overflow">
			<p>ADMIN | USERS LIST</p>
		</div>
	</div>

	<div class="container col-sm-12">
		<h2>List of All Users</h2>
		<div class="table-list col-sm-10 col-sm-offset-1">

			<table class="table table-striped table-responsive table-hover" style="margin-bottom: 0;">
				<thead>
					<th>S/N</th>
					<th>User Full Name</th>
					<th class="col-sm-1">User Address</th>
					<th>User State</th>
					<th>User City</th>
					<th>Acount Status</th>
					<th>Party</th>
					<th>User Gender</th>
					<th>User Email</th>
					<th>User Mobile No.</th>
					<th>Action</th>
				</thead>
			<?php
				if ($run->num_rows > 0) {
					while ($row = $run->fetch_array()) {
						$sn = $sn + 1;
						$usrId = $row['usrId'];
						?>
							<tbody class="table">
								<tr>
									<td><?php echo $sn; ?></td>
									<td><?php echo $row['fullName']; ?></td>
									<td class="col-sm-1"><?php echo $row['address']; ?></td>
									<td><?php echo $row['state']; ?></td>
									<td><?php echo $row['city']; ?></td>
									<td><?php echo $row['status']; ?></td>
									<td><a href="appParty_info.php?partId=<?php echo $ptyId; ?>"><?php echo $row['partName']; ?></a></td>
									<td><?php echo $row['gender']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['telNumber']; ?></td>
									<td><a href="user_info.php?usrId=<?php echo $usrId; ?>"><span class="glyphicon glyphicon-eye-open"></span></a></td>
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
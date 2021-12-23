<?php
	include("includes/log_header.php");
	require_once("db/connection.php");

	//RESTTRICTIN SECONDARY ADMIN FROM GETTING ACCESS TO ADMIN MANAGEMENT
	$accStatus = "Gen. Admin";
	if ($_SESSION['admStatus'] == $accStatus) {

			$approve = "";
			$id = 0;
			$id = $_GET['admId'];

			$select = "SELECT * FROM admins WHERE admId = '$id'";
			$run = $conn->query($select);

			if ($run->num_rows > 0) {
				while ($row = $run->fetch_array()) {
					$admId = $row['admId'];
					$name = $row['admFullName'];
					$address = $row['admAddress'];
					$state = $row['admState'];
					$city = $row['admCity'];
					$status = $row['admStatus'];
					$gender = $row['admGender'];
					$email = $row['admEmail'];
					$number = $row['admTelNumber'];
					$createDate = $row['createDate'];
					$updateDate = $row['updateDate'];
				}
			}
			else{
				echo "Something's wrong!<br>".$conn->error;
			}
		?>
		<title>PPMS | Admin Info</title>

			<div class="container-fluid" style="">
				<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
					<p>ADMIN | ADMIN INFORMATION</p>
				</div>
			</div>

			<div class="container" style="margin-top: 5vh;">
				<div class="user-profile col-sm-8 col-sm-offset-2">
					<p>Profile Info</p>
					<address>
						Admin's Profile <br>
						<b>Account Reg. Date:</b> <?php echo $createDate; ?> <br>
						<b>Account Last Update. Date:</b> <?php echo $updateDate; ?> <br>
					</address>
					<table class="table table-responsive col-sm-12">
						<tr>
							<td><b>FULL NAME:</b></td>
							<td><?php echo $name; ?></td>
						</tr>
						<tr>
							<td><b>ADDRESS:</b></td>
							<td><?php echo $address; ?></td>
						</tr>
						<tr>
							<td><b>STATE:</b></td>
							<td><?php echo $state; ?></td>
						</tr>
						<tr>
							<td><b>CITY:</b></td>
							<td><?php echo $city; ?></td>
						</tr>
						<tr>
							<td><b>RANK/STATUS:</b></td>
							<td><?php echo $status; ?></td>
						</tr>
						<tr>
							<td><b>GENDER:</b></td>
							<td><?php echo $gender; ?></td>
						</tr>
						<tr>
							<td><b>EMAIL</b></td>
							<td><?php echo $email; ?></td>
						</tr>
						<tr>
							<td><b>PHONE NUMBER</b></td>
							<td><?php echo $number; ?></td>
						</tr>
					</table>
					<a href="update_admin.php?admId=<?php echo $admId; ?>"><button class="btn pull-right btn-md btn-info">Edit Profile</button></a>
					<a href="update_admPass.php?admId=<?php echo $admId; ?>"><button class="btn pull-left btn-md btn-info">Edit Password</button></a>
				</div><br>
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

	<style type="text/css">
		.user-profile{
		    padding: 10px;
		    border: 1px solid grey;
		    border-radius: 6px;
		    background-color: whitesmoke;
		}
	</style>

<?php include("includes/footer.php"); ?>
<?php include("includes/log_header.php"); ?>
<title>PPMS | Staff Profile</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>STAFF | PROFILE</p>
		</div>
	</div>

	<div class="container" style="margin-top: 5vh;">
		<div class="user-profile col-sm-8 col-sm-offset-2">
			<p>Profile Display</p>
			<address>
				Username's Profile <br>
				<b>Account Reg. Date:</b> 29/04/2021 15:10 <br>
				<b>Account Last Update. Date:</b> 00/00/0000 00:00 <br>
			</address>
			<table class="table table-responsive col-sm-12">
				<tr>
					<td><b>FULL NAME:</b></td>
					<td>Ibrahim Faruk Yahuza</td>
				</tr>
				<tr>
					<td><b>ADDRESS:</b></td>
					<td>Staff Address</td>
				</tr>
				<tr>
					<td><b>STATE:</b></td>
					<td>Staff State</td>
				</tr>
				<tr>
					<td><b>CITY:</b></td>
					<td>Staff City</td>
				</tr>
				<tr>
					<td><b>GENDER:</b></td>
					<td>MALE</td>
				</tr>
				<tr>
					<td><b>EMAIL</b></td>
					<td>Staffemail@mail.com</td>
				</tr>
				<tr>
					<td><b>PHONE NUMBER</b></td>
					<td>+234 123 123 123</td>
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
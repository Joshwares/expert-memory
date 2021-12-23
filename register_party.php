<?php
	require("db/connection.php");
	include("includes/log_header.php");

	$iD = $_SESSION['usrId'];

	$ptyCode = $ptyName = $ptyAddress = $ptyState = $ptyCity = $ptyMems = $ptyChairman = $ptyEmail = $ptyTelNumber = "";

	$error = $checkError = "";

	$prtChairman = mysqli_fetch_array($conn->query("SELECT * FROM users WHERE usrId = '$iD'"))["fullName"];

	if (isset($_POST['register'])) {

		$ptyCode = mysqli_escape_string($conn,$_POST['partyCode']);
		$ptyName = mysqli_escape_string($conn,$_POST['partyName']);
		$ptyAddress = mysqli_escape_string($conn,$_POST['partyAddress']);
		$ptyState = mysqli_escape_string($conn,$_POST['partyState']);
		$ptyCity = mysqli_escape_string($conn,$_POST['partyCity']);
		$ptyMems = mysqli_escape_string($conn,$_POST['partyMembers']);
		$ptyChairman = mysqli_escape_string($conn,$_POST['partyChairman']);
		$ptyEmail = mysqli_escape_string($conn,$_POST['partyEmail']);
		$ptyTelNumber = mysqli_escape_string($conn,$_POST['partyNumber']);

		$check = "SELECT * FROM endorseParties WHERE partEmail = '$ptyEmail' ";
		$result = $conn->query($check);

		if ($result->num_rows > 0) {
			$checkError = "Sorry! the email you have provided, has already used by someone.<br> Try another one.";
		}
		else{
			$insert = "INSERT INTO endorseParties(
				partCode,
				partName,
				partAddress,
				partState,
				partCity,
				partMembers,
				partChairman,
				partEmail,
				partTelNumber,
				usrId)
				VALUES(
				'$ptyCode',
				'$ptyName',
				'$ptyAddress',
				'$ptyState',
				'$ptyCity',
				'$ptyMems',
				'$ptyChairman',
				'$ptyEmail',
				'$ptyTelNumber',
				'$iD')";

			$run = $conn->query($insert);
			if ($run) {
				?>
					<script>
						window.alert("You have successfully registered your party with PPMS.\n Kindly wait for the approval, by checking your profile time-to-time. Thank You!");
						window.location.href = "dashboard.php";
					</script>
				<?php
			}
			else{
				$error = "Something's wrong! <br>".$conn->error;
			}
		}	
	}
?>

<title>PPMS | Register Party</title>

	<div class="container-fluid" style="">
		<div class="dash jumbotron" style="height: 100px; padding: 35px; margin-top: -4vh;">
			<p>USER | Party Management</p>
		</div>
	</div>

	<div class="row">
		<div class="user-profile col-sm-6 col-sm-offset-3">
<?php

	$chkEndorse = "SELECT * FROM endorseParties WHERE usrId = '$iD'";
	$popEndorse = $conn->query($chkEndorse);

	$chkApprove = "SELECT * FROM approvedParties WHERE usrId = '$iD'";
	$popApprove = $conn->query($chkApprove);

	$chkReject = "SELECT * FROM rejectedParties WHERE usrId = '$iD'";
	$popReject = $conn->query($chkReject);

	if ($popEndorse->num_rows > 0) {
		?>
			<div class="form-group note">
				Dear Valuable user! You have submited your party details successfully, and will be reviewed shortly. Kindy wait for the system approval. <br><span class="text text-success">Thank You.!</span>
			</div>
		<?php
	}
	elseif ($popApprove->num_rows > 0) {
		?>
			<div class="form-group party">
				<?php include("includes/party_info.php"); ?>
			</div>
		<?php
	}
	elseif ($popReject->num_rows > 0) {
		?>
			<div class="form-group note text text-warning">
				Dear valuable user! We are sadly to imform you that, Your party couldn't reach the minimum requirement that's needed, and that leads to rejection of your party offer.
				<br>Thank you for your maximum cooperation.
			</div>
		<?php
	}
	else{
		
		?>
		<div class="logo margin-top-30">
			<a href="register_party.php"><h2> PPMS | Party Registration Form</h2></a>
			</div>
		<div class="box-register">
			<form class="form-register" method="post">
				<fieldset>
					<legend>
						Register your party
					</legend>
					<p>
						Please enter party's Personal Details.<br />
						<center>
							<i>
								<span style="color:red;">
									<?php
										if ($checkError != "") {
											echo $checkError;
										}
										elseif ($error != "") {
											echo $error;
										}
									?>
									
								</span>
							</i>
						</center>
					</p>
					<div class="form-group">
						<input type="text" class="form-control" name="partyCode" placeholder="Party Code" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="partyName" placeholder="Party Name" required>
					</div>
					<div class="form-group form-actions">
						<input type="text" class="form-control" name="partyAddress" placeholder="Party Headquarter's Address" required>
					</div>
					<div class="form-group form-actions">
						<input type="text" class="form-control" name="partyState" placeholder="Headquarter State" required>
					</div>
					<div class="form-group form-actions">
						<input type="text" class="form-control" name="partyCity" placeholder="Headquarter City" required>
					</div>
					<div class="form-group form-actions">
						<input type="number" class="form-control" name="partyMembers" placeholder="Number of party's members. (not less that 15,000 members)" min="" required>
					</div>
					<div class="form-group form-actions">
						<input type="text" class="form-control" name="partyChairman" placeholder="Party Chairman" value="<?php echo $prtChairman; ?>" required readonly>
					</div>
					<p>
						Enter account details below:
					</p>
					<div class="form-group form-actions">
						<input type="email" class="form-control" name="partyEmail" placeholder="Party Email" required>
					</div>
					<div class="form-group form-actions">
						<input type="tel" class="form-control" name="partyNumber" placeholder="Headquater Mobile Number" required>
					</div>
					<br>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary pull-right" name="register">
							Register <i class="glyphicon glyphicon-circle-arrow-right"></i>
						</button>
					</div>
				</fieldset>
			</form>
			<div class="copyright">
				&copy; <?php echo date("Y");?><span class="text-bold text-uppercase"> ppms</span>. <span>All rights reserved</span>
			</div>
		</div>	
		<?php

	}
	?>
	</div>
		</div>
		<style type="text/css">
			.main-register{
				margin-bottom: 10vh;
			}
			.box-register{
			    border: 1px solid grey;
			    border-radius: 6px;
			    padding: 20px;
			}
			.note{
			    margin-top: 15vh;
			    padding: 20px;
			    border: 1px solid grey;
			    border-radius: 6px;
			    box-shadow: grey 4px 4px;
			    font-size: 2.75em;
			    text-align: justify;
			}
			
			.copyright{
				text-align: center;
			}
		</style>
<?php include("includes/footer.php"); ?>

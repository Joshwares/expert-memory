<?php
	include("includes/log_header.php");
	require_once("db/connection.php");

	$ptyId = $ptyCode = $ptyName = $ptyAddress = $ptyState = $ptyCity = $ptyMems = $ptyChairman = $ptyEmail = $ptyNumber = $createDate = $updateDate = "";
	$chkError = $chkError2 = "";
	$id = 0;
	$id = $_GET['partId'];

	//RETREAVING/FETCHING PARTY DETAILS FROM DB.
	$select = "SELECT * FROM endorseParties WHERE partId = '$id'";
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
			$usrId = $row['usrId'];
			$createDate = $row['createDate'];
			$updateDate = $row['updateDate'];
		}
	}
	else{
		echo "Something's wrong!<br>".$conn->error;
	}

	//APPROVAL QUERY
	if (isset($_POST['approve'])) {
		$ptyCode = $_POST['partyCode'];
		$ptyName = $_POST['partyName'];
		$ptyAddress = $_POST['partyAddress'];
		$ptyState = $_POST['partyState'];
		$ptyCity = $_POST['partyCity'];
		$ptyMems = $_POST['partyMembers'];
		$ptyChairman = $_POST['partyChairman'];
		$ptyEmail = $_POST['partyEmail'];
		$ptyNumber = $_POST['partyNumber'];

		//VERIFYING AND EMAIL/PARTY BEFORE APPROVAL TO AVOID DUPLICATE ACCOUNT
		$check = "SELECT * FROM approvedParties WHERE partEmail = 'ptyEmail'";
		$chkResult = $conn->query($check);

		if ($chkResult->num_rows > 0) {
			$chkError = "The party with this email '$ptyEmail', has already approved";
		}
		else{
			$insert = "INSERT INTO approvedParties(
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
						'$ptyNumber',
						'$usrId'
						)";
			$runIns = $conn->query($insert);
			if ($runIns) {
				$delete = "DELETE FROM endorseParties WHERE partId = '$id'";
				$runDel = $conn->query($delete);
				if ($runDel) {
					?>
						<script>
							window.alert("The party has approved successfully\n and the record has deleted from database.");
							window.location.href = "endorse_party.php"
						</script>
					<?php
				}
			}
			else{
				echo "Something's wrong!<br>".$conn->error;
			}
		}
	}

	//REJECT QUERY
	if (isset($_POST['reject'])) {
		$ptyCode = $_POST['partyCode'];
		$ptyName = $_POST['partyName'];
		$ptyAddress = $_POST['partyAddress'];
		$ptyState = $_POST['partyState'];
		$ptyCity = $_POST['partyCity'];
		$ptyMems = $_POST['partyMembers'];
		$ptyChairman = $_POST['partyChairman'];
		$ptyEmail = $_POST['partyEmail'];
		$ptyNumber = $_POST['partyNumber'];

		//VERIFYING AND EMAIL/PARTY BEFORE APPROVAL TO AVOID DUPLICATE ACCOUNT
		$checkRej = "SELECT * FROM rejectedParties WHERE partEmail = 'ptyEmail'";
		$rejResult = $conn->query($checkRej);

		if ($rejResult->num_rows > 0) {
			$chkError2 = "The party with this email '$ptyEmail', has already approved";
		}
		else{
			$insRej = "INSERT INTO rejectedParties(
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
						'$ptyNumber',
						'$usrId'
						)";
			$runIns = $conn->query($insRej);
			if ($runIns) {
				$delete = "DELETE FROM endorseParties WHERE partId = '$id'";
				$runDel = $conn->query($delete);
				if ($runDel) {
					?>
						<script>
							window.alert("The party has rejected successfully\n and the record has deleted from database.");
							window.location.href = "endorse_party.php"
						</script>
					<?php
				}
			}
			else{
				echo "Something's wrong!<br>".$conn->error;
			}
		}
	}
?>
<title>PPMS | Register Party</title>

	<div class="row">
		<div class="user-profile col-sm-6 col-sm-offset-3">
			<div class="logo margin-top-30">
			<a href="party.php"><h2> PPMS | Party Registration Form</h2></a>
			</div>

			<div class="box-register">
				<form class="form-register" method="post">
					<fieldset>
						<legend>
							Register your party
						</legend>
						<p>
							Please enter party's Details.<br />
							<center>
							<i>
								<span style="color:red;">
									<?php
										if ($chkError != "") {
											echo $chkError;
										}
										elseif ($chkError2 != "") {
											echo $chkError2;
										}
									?>
									
								</span>
							</i>
						</center>
						</p>
						<div class="form-group">
							<input type="text" class="form-control" name="partyCode" placeholder="Party Code" value = "<?php echo $ptyCode; ?>" required readonly>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="partyName" placeholder="Party Name" value = "<?php echo $ptyName; ?>" required readonly>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="partyAddress" placeholder="Party Headquarter's Address" value = "<?php echo $ptyAddress; ?>" required readonly>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="partyState" placeholder="Headquarter State" value = "<?php echo $ptyState; ?>" required readonly>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="partyCity" placeholder="Headquarter City" value = "<?php echo $ptyCity; ?>" required readonly>
						</div>
						<div class="form-group form-actions">
							<input type="number" class="form-control" name="partyMembers" placeholder="Number of party's members. (not less that 15,000 members)" min="" value = "<?php echo $ptyMems; ?>" required readonly>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="partyChairman" placeholder="Party Chairman" value = "<?php echo $ptyChairman; ?>" required readonly>
						</div>
						<p>
							Enter account details below:
						</p>
						<div class="form-group form-actions">
							<input type="email" class="form-control" name="partyEmail" placeholder="Party Email" value = "<?php echo $ptyEmail; ?>" required readonly>
						</div>
						<div class="form-group form-actions">
							<input type="tel" class="form-control" name="partyNumber" placeholder="Headquater Mobile Number" value = "<?php echo $ptyNumber; ?>" required readonly>
						</div>
						<br>
						<div class="form-actions">
							<button type="submit" class="btn btn-success pull-right" name="approve">
								Approve <i class="glyphicon glyphicon-ok-sign" style="color: #fff"></i>
							</button>
							<button type="submit" class="btn btn-danger pull-left" name="reject">
								Reject <i class="glyphicon glyphicon-remove-sign" style="color: #fff"></i>
							</button>
						</div>
					</fieldset>
				</form>

				<div class="copyright">
					&copy; <?php echo date("Y");?><span class="text-bold text-uppercase"> ppms</span>. <span>All rights reserved</span>
				</div>
		
			</div>

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
		.copyright{
			text-align: center;
		}
	</style>

<?php include("includes/footer.php"); ?>

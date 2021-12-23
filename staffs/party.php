<?php include("includes/log_header.php"); ?>
<title>PPMS | Register Party</title>

	<div class="row">
		<div class="user-profile col-sm-6 col-sm-offset-3">
			<div class="logo margin-top-30">
			<a href="party.php"><h2> STAFF | Party Registration Form</h2></a>
			</div>

			<div class="box-register">
				<form class="form-register" method="post">
					<fieldset>
						<legend>
							Register your party
						</legend>
						<p>
							Please enter party's Personal Details.<br />
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
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
							<input type="number" class="form-control" name="membersNo" placeholder="Number of party's members. (not less that 15,000 members)" min="15000" required>
						</div>
						<div class="form-group form-actions">
							<input type="text" class="form-control" name="partyChairman" placeholder="Party Chairman" required>
						</div>
						<p>
							Enter account details below:
						</p>
						<div class="form-group form-actions">
							<input type="email" class="form-control" name="partyEmail" placeholder="Party Email" required readonly>
						</div>
						<div class="form-group form-actions">
							<input type="tel" class="form-control" name="partyNumber" placeholder="Headquater Mobile Number" required>
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

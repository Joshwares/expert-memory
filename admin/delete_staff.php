<script>
	window.alert('Are you sure, you want to delete this account?\n If yes Click Ok');
</script>
<?php
	require_once("../db/connection.php");
	include("includes/log_header.php");

	$stfId = 0;

	$stfId = $_GET['stfId'];
	 
	
?>
<title>PPMS | Account Deletion</title>

	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
			<a href="delete_user.php"><h2> PPMS | Deleting user's account</h2></a>
			</div>

			<div class="box-login">
				<form class="form-login" method="post" action="">
					<fieldset>
						<legend>
							Delete user account
						</legend>
						<p>
							Are you sure, you want to delete this <b>Account</b>?<br />
							<!--span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span-->
						</p>
						<div class="form-group note">
							<b class="text text-danger">Note!</b> Once you deleted this account, it will be no longer in database (it will be pertmanently deleted.)
						</div>
						<div class="form-group">
							<a href="delete_staffAcc.php?stfId=<?php echo $stfId; ?>"><p class="btn btn-danger btn-md pull-right">Reset</p></a>
						</div>
						<div class="new-account" style="font-size: 17px">
							Don't want to rest Delete the account?<br>
							<a href="staffs_list.php">
								Cancel
							</a>
						</div>
					</fieldset>
				</form>
				<br>

				<div class="copyright">
					&copy; <?php echo date("Y");?><span class="text-bold text-uppercase"> ppms</span>. <span>All rights reserved</span>
				</div>
		
			</div>

		</div>
	</div>
	<style type="text/css">
		.box-login{
		    border: 1px solid grey;
		    border-radius: 6px;
		    padding: 20px;
		}
		.note,p{
			font-size: 18px;
			text-align: justify;
		}
		.copyright{
			text-align: center;
		}
	</style>

</body>
</html>
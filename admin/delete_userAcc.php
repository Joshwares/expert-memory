<?php
	require_once("../db/connection.php");
	//include("includes/log_header.php");

	$usrId = 0;
	$usrId = $_GET['usrId'];

	$delete = "DELETE FROM users WHERE usrId = '$usrId' ";
	$run = $conn->query($delete);

	if ($run) {
		?>
			<script>
				window.alert("The account was deleted successully");
				window.location.href = "staffs_list.php";
			</script>
		<?php
	}
		
?>
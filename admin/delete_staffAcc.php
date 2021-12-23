<?php
	require_once("../db/connection.php");
	//include("includes/log_header.php");

	$stfId = 0;
	$stfId = $_GET['stfId'];

	$delete = "DELETE FROM staffs WHERE stfId = '$stfId' ";
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
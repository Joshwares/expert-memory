<?php
	require_once("../db/connection.php");

	//RESTTRICTIN SECONDARY ADMIN FROM GETTING ACCESS TO ADMIN MANAGEMENT
	$accStatus = "Gen. Admin";
	if ($_SESSION['admStatus'] == $accStatus) {

		$admId = 0;
		$admId = $_GET['admId'];

		$delete = "DELETE FROM admins WHERE admId = '$admId' ";
		$run = $conn->query($delete);

		if ($run) {
			?>
				<script>
					window.alert("The account was deleted successully");
					window.location.href = "staffs_list.php";
				</script>
			<?php
		}
	}
	else{
		?>
		<script>
			window.location.href = "dashboard.php";
		</script>
		<?php
	}

?>
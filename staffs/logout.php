<?php
	session_start();
	unset($_SESSION['stfId']);
	unset($_SESSION['stfEmail']);
	unset($_SESSION['stfFullName']);
	session_destroy();
	?>
		<script>
			window.alert("You have loged out successfully! \n GoodBye...");
			window.location.href = "../index.php";
		</script>
	<?php
?>
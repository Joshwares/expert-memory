<?php
	session_start();
	unset($_SESSION['usrId']);
	unset($_SESSION['email']);
	unset($_SESSION['fullName']);
	unset($_SESSION['status']);
	session_destroy();
	?>
		<script>
			window.alert("You have loged out successfully! \n GoodBye...");
			window.location.href = "index.php";
		</script>
	<?php
?>
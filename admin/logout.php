<?php
	session_start();
	unset($_SESSION['admId']);
	unset($_SESSION['admEmail']);
	unset($_SESSION['admStatus']);
	session_destroy();
	?>
		<script>
			window.alert("You have loged out successfully! \n GoodBye...");
			window.location.href = "../index.php";
		</script>
	<?php
?>
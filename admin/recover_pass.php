<?php
	require_once("../db/connection.php");
	//include("includes/header.php");
	
	$fullName = '';
	$address = '';
	$state = '';
	$city = '';
	$gender = '';
	$email = 'admin@gmail.com';
	$telNumber = '';
	$password = '1234@admin';

	$pass = md5($password);

	$logError = $error = "";

	$update = "UPDATE admins SET 
				admFullName = '$fullName',
				admAddress = '$address',
				admState = '$state',
				admCity = '$city',
				admGender = '$gender',
				admEmail = '$email',
				admTelNumber = '$telNumber',
				admPassword = '$pass'
				WHERE admStatus = 'Gen. Admin'";
	$run = $conn->query($update);
	if ($run) {
		?>
		<script>
			window.alert("You have successfully reset admin account! \n Kindly, use your default admin details to login into your account...");
			window.location.href = "index.php";
		</script>
	<?php
	}
	else{
		echo "Something's wrong!".$conn->error;
	}
$conn->close();
?>
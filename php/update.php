<?php 
	include("connection.php");

	$name = htmlentities($_POST["name"]);
	$surname = htmlentities($_POST["surname"]);
	$username = htmlentities($_POST["username"]);
	$email = htmlentities($_POST["email"]);
	$phone = htmlentities($_POST["phone"]);
	$cellphone = htmlentities($_POST["cellphone"]);
	$bio = htmlentities($_POST["bio"]);

	$update = "
		UPDATE hanabiUser
		SET
			userName = '$name',
			userSurname ='$surname',
			userUsername ='$username',
			userEmail = '$email',
			userPhone = '$phone',
			userCellphone = '$cellphone',
			userBio = '$bio',
			userUpdatetime = NOW()
		WHERE
			userUsername = '$username'
	";
	$query=mysqli_query($con, $update);

	mysqli_close($con);

	echo
	"<script type='text/javascript'>
		window.history.back();
	</script>";
?>
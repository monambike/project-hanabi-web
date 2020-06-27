<?php
	include("connection.php");

	$login = htmlentities($_POST["login"]);
	$password = htmlentities($_POST["password"]);

	$getuser = "
		SELECT
			*
		FROM hanabiUser
		WHERE
			(userEmail = '$login' OR userUsername = '$login')
			AND userPassword = '$password'
	";
	$result = mysqli_query($con, $getuser);
	$rows = mysqli_num_rows($result);

	if($rows > 0){
		session_name('userHanabi_online');
		session_start();

		$query = "
			SELECT
				userId,
				userEmail
			FROM hanabiUser
			WHERE
				(userEmail = '$login' OR userUsername = '$login')
		";
		$result = mysqli_query($con,$query);

		while ($data = mysqli_fetch_array($result)) {
			$_SESSION['id'] = $data['userId'];
			$_SESSION['email'] = $data['userEmail'];
		}
		$_SESSION['password'] = $password;

		echo '<script> window.history.back(); </script>';
	}else{
		echo
		"<script type='text/javascript'>
			alert('Usuário e/ou Senha incorretos.');
			window.history.back();
		</script>";
	}

	mysqli_close($con);
?>
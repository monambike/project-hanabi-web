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

		$search = "
		    SELECT
		    	settingsColor1,
		    	settingsColor2,
		    	settingsColor3,
		    	settingsColor4,
		    	settingsColor5,
		    	settingsColor6,
		    	settingsColor7,
		    	settingsColor8
		    FROM hanabiSettings
			WHERE
				userId='".$_SESSION['id']."'
		";
		$query = mysqli_query($con, $search);

		while ($data = mysqli_fetch_array($query)) {
			//Garante que ao logar receba as cores certas
			echo
			"<script type='text/javascript'>
				localStorage.setItem('color1', '".$data["settingsColor1"]."');
				localStorage.setItem('color2', '".$data["settingsColor2"]."');
				localStorage.setItem('color3', '".$data["settingsColor3"]."');
				localStorage.setItem('color4', '".$data["settingsColor4"]."');
				localStorage.setItem('color5', '".$data["settingsColor5"]."');
				localStorage.setItem('color6', '".$data["settingsColor6"]."');
				localStorage.setItem('color7', '".$data["settingsColor7"]."');
				localStorage.setItem('color8', '".$data["settingsColor8"]."');
			</script>";
		}

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
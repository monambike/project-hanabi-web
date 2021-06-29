<?php
	// LOGIN DE USUÁRIO
	// -------------------------------------------------------------
	// Descrição:
	// Efetua o login do usuário.
	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<



	// Estabelece a conexão com o banco
	include("connection.php");

	// Recebe o usuário
	$login = htmlentities($_POST["login"]);
	// Recebe a senha
	$password = htmlentities($_POST["password"]);

	// Tenta achar no banco
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

	// Se houver no banco, faz o login do usuário
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

		// Procura as cores definidas pelo usuário com base no id dele
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

		// Executa a Query
		$query = mysqli_query($con, $search);

		// Passa os valores que estão no banco para as variáveis locais,
		// para garantir que ao logar o usuário receba na hora as  cores
		// corretas
		while ($data = mysqli_fetch_array($query)) {
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

		// Volta para a página anterior
		echo '<script> window.history.back(); </script>';
	}
	// Se não for possível fazer o login
	else{
		// Exibe uma mensagem de erro e volta para a página anterior
		echo
		"<script type='text/javascript'>
			alert('Usuário e/ou Senha incorretos.');
			window.history.back();
		</script>";
	}

	// Para a chamada do SQL
	mysqli_close($con);



	// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	// -------------------------------------------------------------
?>
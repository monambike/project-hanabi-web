<?php
	include("connection.php");

	$name = htmlentities($_POST["name"]);
	$surname = htmlentities($_POST["surname"]);
	$username = htmlentities($_POST["username"]);
	$email = htmlentities($_POST["email"]);
	$password = htmlentities($_POST["password"]);
	$country = htmlentities($_POST["country"]);
	$gender = htmlentities($_POST["gender"]);

	$getuser = "
		SELECT
			*
		FROM hanabiUser
		WHERE
			userUsername = '$username' OR userEmail = '$email'
	";
	$result = mysqli_query($con, $getuser);
	$rows = mysqli_num_rows($result);

	if($rows > 0){
		echo
		"<script>
			alert('Já possui uma conta com esse E-mail e/ou Usuário.');
			window.history.back();
		</script>";
	}else{
		echo
		"<script>
			alert('Seja bem-vindo(a) " . htmlentities($name) . " ao Projeto Hanabi!');
		</script>";

	    $insert = "
		    INSERT INTO hanabiUser (
			    userName,
			    userSurname,
			    userUsername,
			    userEmail,
			    userPassword,
			    userCountry,
			    userGender,
			    userRegistertime
		    )
		    VALUES (
			    '$name',
			    '$surname',
			    '$username',
			    '$email',
			    '$password',
			    '$country',
			    '$gender',
			    NOW()
		    );
		";
		$query = mysqli_query($con, $insert);
		//Insere na tabela de configurações o Id
		$insert = "
			INSERT INTO hanabiSettings (
		    	userId
	    	)
			SELECT
				userId
			FROM hanabiUser
			WHERE
				userUsername = '$username';
		";
		$query = mysqli_query($con, $insert);

		//Direciona para a página correta
		echo
		'<script>
			window.open("../lang/" + localStorage.getItem("language") + "/home.php", "_self");
		</script>';
	}

	mysqli_close($con);
?>